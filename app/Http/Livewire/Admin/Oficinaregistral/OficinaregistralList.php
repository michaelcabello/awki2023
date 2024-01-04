<?php

namespace App\Http\Livewire\Admin\Oficinaregistral;

use Livewire\Component;
use App\Models\Oficinaregistral;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OficinaregistralList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $oficinaregistral;
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


    public function edit(Oficinaregistral $oficinaregistral){
        $this->authorize('update', $oficinaregistral);
        $this->oficinaregistral = $oficinaregistral;
        $this->open_edit = true;
    }

    public function delete(Oficinaregistral $oficinaregistral){
        $oficinaregistral->delete();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingCant(){
        $this->resetPage();
    }




    protected $rules = [
        'oficinaregistral.nombre' => 'required',
        'oficinaregistral.state' => '',

    ];

    public function loadOficinaregistral()
    {
        $this->readyToLoad = true;
    }

    public function activar(Oficinaregistral $oficinaregistral){
        $this->oficinaregistral = $oficinaregistral;

        $this->oficinaregistral->update([
            'state' => 1
        ]);
    }

    public function desactivar(Oficinaregistral $oficinaregistral){
        $this->oficinaregistral = $oficinaregistral;

        $this->oficinaregistral->update([
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
        $this->authorize('update', $this->oficinaregistral);
        $this->validate();

        $this->oficinaregistral->save();
        $this->reset('open_edit');

        $this->emit('alert','La oficina Registral se modificó correctamente');

    }

    public function cancelar(){
        $this->reset('open_edit');
        //$this->open_edit = false;
    }

    public function render()
    {

        $this->authorize('view', new Oficinaregistral);

        if ($this->readyToLoad) {
            $oficinaregistrals = Oficinaregistral::where('nombre', 'like', '%' .$this->search. '%')
                ->when($this->state, function($query){
                    return $query->where('state',1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $oficinaregistrals =[];
        }

        return view('livewire.admin.oficinaregistral.oficinaregistral-list', compact('oficinaregistrals'));
    }
}
