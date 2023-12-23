<?php

namespace App\Http\Livewire\Admin\Categoria;

use Livewire\Component;
use App\Models\Categoria;

use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoriaList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $categoria;
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


    public function edit(Categoria $categoria){
        $this->authorize('update', $categoria);
        $this->categoria = $categoria;
        $this->open_edit = true;
    }

    public function delete(Categoria $categoria){
        $categoria->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $rules = [
        'categoria.nombre' => 'required',
    ];

    public function loadCategoria()
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
        $this->authorize('update', $this->categoria);
        $this->validate();

        $this->categoria->save();
        $this->reset('open_edit');

        $this->emit('alert','La categoria se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }



    public function render()
    {


        $this->authorize('view', new Categoria);

        if ($this->readyToLoad) {
            $categorias = Categoria::where('nombre', 'like', '%' .$this->search. '%')

                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $categorias =[];
        }

        return view('livewire.admin.categoria.categoria-list', compact('categorias'));
    }
}
