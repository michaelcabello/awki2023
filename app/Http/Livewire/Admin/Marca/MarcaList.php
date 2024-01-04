<?php

namespace App\Http\Livewire\Admin\Marca;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MarcaList extends Component
{
    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $marca;
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


    public function edit(Marca $marca){
        $this->authorize('update', $marca);
        $this->marca = $marca;
        $this->open_edit = true;
    }

    public function delete(Marca $marca){
        $marca->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingCant(){
        $this->resetPage();
    }



    protected $rules = [
        'marca.nombre' => 'required',
        'marca.state' => '',

    ];

    public function loadMarca()
    {
        $this->readyToLoad = true;
    }

    public function activar(Marca $marca){
        $this->marca = $marca;

        $this->marca->update([
            'state' => 1
        ]);
    }

    public function desactivar(Marca $marca){
        $this->marca = $marca;

        $this->marca->update([
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
        $this->authorize('update', $this->marca);
        $this->validate();

        $this->marca->save();
        $this->reset('open_edit');

        $this->emit('alert','El Status se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }


    public function render()
    {

        $this->authorize('view', new Marca);

        if ($this->readyToLoad) {
            $marcas = Marca::where('nombre', 'like', '%' .$this->search. '%')
                ->when($this->state, function($query){
                    return $query->where('state',1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $marcas =[];
        }

        return view('livewire.admin.marca.marca-list', compact('marcas'));
    }
}
