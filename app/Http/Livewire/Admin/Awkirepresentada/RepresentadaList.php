<?php

namespace App\Http\Livewire\Admin\Awkirepresentada;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Awkirepresentada;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RepresentadaList extends Component
{
    use AuthorizesRequests;//se pone esto con jetstream livewire
    use WithPagination;
    public $awkirepresentada;
    public $search, $razonsocial, $ruc, $direccion, $telefono, $contacto, $state;
    public $sort='id';
    public $direction='desc';
    public $cant='10';
    public $open_edit = false;
    public $readyToLoad = false;//para cntrolar el preloader
    Public $flag;


    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant'=>['except'=>'10'],
        'sort'=>['except'=>'id'],
        'direction'=>['except'=>'desc'],
        'search'=>['except'=>''],
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function loadRepresentadas(){
        $this->readyToLoad = true;
    }


    public function render()
    {

        $this->authorize('view', new Awkirepresentada);
        if ($this->readyToLoad) {
            $representadas = Awkirepresentada::where('razonsocial', 'like', '%' .$this->search. '%')
                ->when($this->state, function($query){
                    return $query->where('state',1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }
         else{
            $representadas =[];
        }

        return view('livewire.admin.awkirepresentada.representada-list', compact('representadas'));

    }

    public function order($sort){
        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }

    public function activar(Awkirepresentada $awkirepresentada){
        $this->awkirepresentada = $awkirepresentada;

        $this->awkirepresentada->update([
            'state' => 1
        ]);
    }

    public function desactivar(Awkirepresentada $awkirepresentada){
        $this->awkirepresentada = $awkirepresentada;

        $this->awkirepresentada->update([
            'state' => 0
        ]);
    }

    public function delete(Awkirepresentada $awkirepresentada){
        $awkirepresentada->delete();
    }


     protected $rules = [
        'awkirepresentada.razonsocial' => 'required|unique:awkirepresentadas,razonsocial',
        'awkirepresentada.ruc'=> 'required',
        'awkirepresentada.address'=> '',
        'awkirepresentada.phone'=> '',
        'awkirepresentada.movil'=> '',
        'awkirepresentada.nota1'=> '',
        'awkirepresentada.nota2'=> '',
        'awkirepresentada.state'=> '',
    ];



    public function edit(Awkirepresentada $representadaa){
        //dd($representadaa);

        $this->resetValidation();
        $this->awkirepresentada = $representadaa;
        //dd($this->awkirepresentada);
        $this->open_edit = true;

    }

    public function update(){
        //dd($this->awkirepresentada);
       // $this->validate();
       $modelId = $this->awkirepresentada->id;
          $this->validate([
            //'awkirepresentada.razonsocial' => 'required|unique:awkirepresentadas,razonsocial',
            //'awkirepresentada.razonsocial' => 'required|unique:awkirepresentadas,razonsocial,'.$this->awkirepresentada->id,
            'awkirepresentada.razonsocial' => [
                'required',
                Rule::unique('awkirepresentadas', 'razonsocial')->ignore($modelId),
            ],
            'awkirepresentada.ruc' => 'required',
            'awkirepresentada.address'=> '',
            'awkirepresentada.phone'=> '',
            'awkirepresentada.movil'=> '',
            'awkirepresentada.nota1'=> '',
            'awkirepresentada.nota2'=> '',
            'awkirepresentada.state'=> '',
        ]);

       $this->awkirepresentada->save();
       $this->reset('open_edit');

       //$this->emitTo('show-posts', 'render');
       $this->emit('alert','El Cliente se modifico correctamente');

   }



}
