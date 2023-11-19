<?php

namespace App\Http\Livewire\Admin\Awkizona;

use Livewire\Component;
use App\Models\Awkizona;
use Livewire\WithPagination;
use App\Models\Awkirepresentada;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ZonaList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $awkizona;
    public $search, $name, $description, $state;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader
    public $awkirepresentadas;
    public $awkirepresentada_id;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function mount()
    {

        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadZonas()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {

        //$this->authorize('view', new Awkizona);
        $user = Auth::user();
        $cuenta = $user->awkirepresentada;
        if ($this->readyToLoad) {
            if ($user->hasRole('Admin')) {
                $zonas = Awkizona::select('awkizonas.*', 'awkirepresentadas.razonsocial')
                    ->leftJoin('awkirepresentadas', 'awkizonas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                    ->where('awkizonas.name', 'like', '%' . $this->search . '%')
                    ->orwhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%')
                    ->when($this->state, function ($query) {
                        return $query->where('awkizonas.state', 1);
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } elseif ($cuenta) {
                $zonas = Awkizona::select('awkizonas.*', 'awkirepresentadas.razonsocial')
                    ->leftJoin('awkirepresentadas', 'awkizonas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                    ->where('awkizonas.awkirepresentada_id', $cuenta->id)
                    ->where(function ($query) {
                        $query->where('awkizonas.name', 'like', '%' . $this->search . '%')
                            ->orWhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%');
                    })
                    //->where('awkizonas.awkirepresentada_id', '=', $cuenta->id )//esta parte no funciona
                    //->orWhere('awkizonas.name', 'like', '%' . $this->search . '%')
                    //->orWhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%')
                    ->when($this->state, function ($query) {
                        return $query->where('awkizonas.state', 1);
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } else {
                $zonas = Awkizona::select('awkizonas.*', 'awkirepresentadas.razonsocial')
                    ->leftJoin('awkirepresentadas', 'awkizonas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                    //->where('awkizonas.awkirepresentada_id', $cuenta->id)
                    /* ->where(function ($query) {
                        $query->where('awkizonas.name', 'like', '%' . $this->search . '%')
                            ->orWhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%');
                    }) */
                    //->where('awkizonas.awkirepresentada_id', '=', $cuenta->id )//esta parte no funciona
                    ->orWhere('awkizonas.name', 'like', '%' . $this->search . '%')
                    ->orWhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%')
                    ->when($this->state, function ($query) {
                        return $query->where('awkizonas.state', 1);
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            }
        } else {
            $zonas = [];
        }

        return view('livewire.admin.awkizona.zona-list', compact('zonas'));
    }


    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }


    public function activar(Awkizona $awkizona)
    {
        $this->awkizona = $awkizona;

        $this->awkizona->update([
            'state' => 1
        ]);
    }

    public function desactivar(Awkizona $awkizona)
    {
        $this->awkizona = $awkizona;

        $this->awkizona->update([
            'state' => 0
        ]);
    }

    public function delete(Awkizona $awkizona)
    {
        $awkizona->delete();
    }


    protected $rules = [
        'awkizona.name' => 'required',
        'awkizona.description' => '',
        'awkizona.state' => '',
        'awkizona.awkirepresentada_id' => '',
    ];

    public function edit(Awkizona $zonaa)
    {
        //dd($representadaa);
        $this->awkirepresentada_id = $zonaa->awkirepresentada_id;
        $this->resetValidation();
        $this->awkizona = $zonaa;
        //dd($this->awkirepresentada);
        $this->open_edit = true;
    }


    public function update()
    {
        //dd($this->awkirepresentada);
        // $this->validate();
        //  $modelId = $this->awkirepresentada->id;
        $this->validate([
            'awkizona.name' => 'required',
            'awkizona.description' => '',
            'awkizona.state' => '',
            'awkizona.awkirepresentada_id' => '',
        ]);

        $this->awkizona->save();
        $this->reset('open_edit');

        //$this->emitTo('show-posts', 'render');
        $this->emit('alert', 'La Zona se modifico correctamente');
    }
}
