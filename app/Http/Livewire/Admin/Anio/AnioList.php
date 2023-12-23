<?php

namespace App\Http\Livewire\Admin\Anio;

use Livewire\Component;

use App\Models\Anio;

use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnioList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $anio;
    public $search, $nombre;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader
    //public $awkirepresentadas;
    //public $awkirepresentada_id;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        //$this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
    }


    public function edit(Anio $anio){
        $this->authorize('update', $anio);
        $this->anio = $anio;
        $this->open_edit = true;
    }

    public function delete(Anio $anio){
        $anio->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $rules = [
        'anio.nombre' => 'required',
    ];

    public function loadAnio()
    {
        $this->readyToLoad = true;
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


    public function update(){
        $this->authorize('update', $this->anio);
        $this->validate();

        $this->anio->save();
        $this->reset('open_edit');

        $this->emit('alert','El Año se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }



    public function render()
    {

        $this->authorize('view', new Anio);

        if ($this->readyToLoad) {
            $anios = Anio::where('nombre', 'like', '%' .$this->search. '%')

                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $anios =[];
        }

        return view('livewire.admin.anio.anio-list', compact('anios'));
    }
}
