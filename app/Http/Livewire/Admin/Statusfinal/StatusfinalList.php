<?php

namespace App\Http\Livewire\Admin\Statusfinal;

use App\Models\Statusfinal;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class StatusfinalList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $statusfinal;
    public $search, $name, $state;
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


    public function edit(Statusfinal $statusfinal){

        $this->statusfinal = $statusfinal;
        //$this->authorize('update', $statusfinal);
        $this->open_edit = true;
    }

    public function delete(Statusfinal $statusfinal){
        $statusfinal->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $rules = [
        'statusfinal.nombre' => 'required',
    ];

    public function loadStatusfinal()
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
        //$this->authorize('update', $this->statusfinal);
        $this->validate();

        $this->statusfinal->save();
        $this->reset('open_edit');

        $this->emit('alert','El Status se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }

    public function render()
    {

        if ($this->readyToLoad) {
            $statusfinals = Statusfinal::where('nombre', 'like', '%' .$this->search. '%')
                ->when($this->state, function($query){
                    return $query->where('state',1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $statusfinals =[];
        }

        return view('livewire.admin.statusfinal.statusfinal-list', compact('statusfinals'));
    }
}
