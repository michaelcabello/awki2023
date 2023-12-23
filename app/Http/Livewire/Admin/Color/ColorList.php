<?php

namespace App\Http\Livewire\Admin\Color;

use Livewire\Component;

use App\Models\Color;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ColorList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $color;
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


    public function edit(Color $color){
        $this->authorize('update', $color);
        $this->color = $color;
        $this->open_edit = true;
    }

    public function delete(Color $color){
        $color->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $rules = [
        'color.nombre' => 'required',
    ];

    public function loadColor()
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
        $this->authorize('update', $this->color);
        $this->validate();

        $this->color->save();
        $this->reset('open_edit');

        $this->emit('alert','El Año se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }


    public function render()
    {
        $this->authorize('view', new Color);

        if ($this->readyToLoad) {
            $colors = Color::where('nombre', 'like', '%' .$this->search. '%')

                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $colors =[];
        }

        return view('livewire.admin.color.color-list', compact('colors'));
    }
}
