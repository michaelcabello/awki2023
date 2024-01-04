<?php

namespace App\Http\Livewire\Admin\Modello;

use Livewire\Component;

use App\Models\Modello;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModelloList extends Component
{
    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $modello;
    public $search, $nombre, $state;
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


    public function edit(Modello $modello){
        $this->authorize('update', $modello);
        $this->modello = $modello;
        $this->open_edit = true;
    }

    public function delete(Modello $modello){
        $modello->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingCant(){
        $this->resetPage();
    }



    protected $rules = [
        'modello.nombre' => 'required',
        'modello.state' => '',

    ];

    public function loadModello()
    {
        $this->readyToLoad = true;
    }

    public function activar(Modello $modello){
        $this->modello = $modello;

        $this->modello->update([
            'state' => 1
        ]);
    }

    public function desactivar(Modello $modello){
        $this->modello = $modello;

        $this->modello->update([
            'state' => 0
        ]);
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
        $this->authorize('update', $this->modello);
        $this->validate();

        $this->modello->save();
        $this->reset('open_edit');

        $this->emit('alert','El Status se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }


    public function render()
    {

        $this->authorize('view', new Modello);

        if ($this->readyToLoad) {
            $modellos = Modello::where('nombre', 'like', '%' .$this->search. '%')
                ->when($this->state, function($query){
                    return $query->where('state',1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $modellos =[];
        }

        //return view('livewire.admin.marca.marca-list', compact('marcas'));

        return view('livewire.admin.modello.modello-list', compact('modellos'));
    }


}



