<?php

namespace App\Http\Livewire\Admin\Statussunarp;

use Livewire\Component;
use App\Models\Statussunarp;

use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatussunarpList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $statussunarp;
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


    public function edit(Statussunarp $statussunarp){
        $this->authorize('update', $statussunarp);
        $this->statussunarp = $statussunarp;
        $this->open_edit = true;
    }

    public function delete(Statussunarp $statussunarp){
        $statussunarp->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $rules = [
        'statussunarp.nombre' => 'required',
    ];

    public function loadStatussunarp()
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
        $this->authorize('update', $this->statussunarp);
        $this->validate();

        $this->statussunarp->save();
        $this->reset('open_edit');

        $this->emit('alert','El Status se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }


    public function render()
    {

        $this->authorize('view', new Statussunarp);

        if ($this->readyToLoad) {
            $statussunarps = Statussunarp::where('nombre', 'like', '%' .$this->search. '%')

                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $statussunarps =[];
        }

        return view('livewire.admin.statussunarp.statussunarp-list', compact('statussunarps'));
    }
}
