<?php

namespace App\Http\Livewire\Admin\Awkitienda;

use App\Models\User;
use Livewire\Component;
use App\Models\Awkizona;
use App\Models\Awkitienda;
use Livewire\WithPagination;
use App\Models\Awkirepresentada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TiendaList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $awkitienda;
    public $search, $name, $address, $description, $serief, $serieb, $email, $state, $user_id;
    public $sort = 'awkitiendas.id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para controlar el preloader
    public $awkizonas;
    public $users;
    public $awkizonas_id;
    public $awkirepresentadas;
    public $awkirepresentada_id;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'awkitiendas.id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function mount()
    {

        //$this->awkizonas = Awkizona::pluck('name', 'id');
        //$this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkirepresentadas = [];
        $this->awkizonas = [];

        $this->users = User::pluck('name', 'id');
    }




    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadTiendas()
    {
        $this->readyToLoad = true;
    }



    public function render()
    {

        $this->authorize('view', new Awkitienda);
        $user = Auth::user();
        $cuenta = $user->awkirepresentada;

        if ($this->readyToLoad) {
            if ($user->hasRole('Admin')) {
            $tiendas = Awkitienda::select('awkitiendas.id as tienda_id', 'awkitiendas.name as tienda_name', 'awkitiendas.address', 'awkitiendas.state', 'awkizonas.name as zona_name', 'awkirepresentadas.razonsocial as razonsocial', 'users.name as user_name')
                ->leftJoin('awkizonas', 'awkitiendas.awkizona_id', '=', 'awkizonas.id')
                ->leftJoin('awkirepresentadas', 'awkitiendas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                ->leftJoin('users', 'awkitiendas.user_id', '=', 'users.id')
                ->where('awkitiendas.name', 'like', '%' . $this->search . '%')
                ->orWhere('awkizonas.name', 'like', '%' . $this->search . '%')
                ->when($this->state, function ($query) {
                    return $query->where('awkitiendas.state', 1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
            } elseif ($cuenta) {

                $tiendas = Awkitienda::select('awkitiendas.id as tienda_id', 'awkitiendas.name as tienda_name', 'awkitiendas.address', 'awkitiendas.state', 'awkizonas.name as zona_name', 'awkirepresentadas.razonsocial as razonsocial', 'users.name as user_name')
                ->leftJoin('awkizonas', 'awkitiendas.awkizona_id', '=', 'awkizonas.id')
                ->leftJoin('awkirepresentadas', 'awkitiendas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                ->leftJoin('users', 'awkitiendas.user_id', '=', 'users.id')
                ->where('awkitiendas.awkirepresentada_id', $cuenta->id)
                ->where(function ($query) {
                    $query->where('awkitiendas.name', 'like', '%' . $this->search . '%')
                        ->orWhere('awkizonas.name', 'like', '%' . $this->search . '%');
                })
                ->when($this->state, function ($query) {
                    return $query->where('awkitiendas.state', 1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

            } else {


                $tiendas = Awkitienda::select('awkitiendas.id as tienda_id', 'awkitiendas.name as tienda_name', 'awkitiendas.address', 'awkitiendas.state', 'awkizonas.name as zona_name', 'awkirepresentadas.razonsocial as razonsocial', 'users.name as user_name')
                ->leftJoin('awkizonas', 'awkitiendas.awkizona_id', '=', 'awkizonas.id')
                ->leftJoin('awkirepresentadas', 'awkitiendas.awkirepresentada_id', '=', 'awkirepresentadas.id')
                ->leftJoin('users', 'awkitiendas.user_id', '=', 'users.id')
                //->where('awkitiendas.awkirepresentada_id', $cuenta->id)
                ->where(function ($query) {
                    $query->where('awkitiendas.name', 'like', '%' . $this->search . '%')
                        ->orWhere('awkizonas.name', 'like', '%' . $this->search . '%');
                })
                ->when($this->state, function ($query) {
                    return $query->where('awkitiendas.state', 1);
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
            }
        } else {
            $tiendas = [];
        }



        return view('livewire.admin.awkitienda.tienda-list', compact('tiendas'));
    }


    public function activar(Awkitienda $awkitienda){
        $this->awkitienda = $awkitienda;

        $this->awkitienda->update([
            'state' => 1
        ]);
    }

    public function desactivar(Awkitienda $awkitienda){
        $this->awkitienda = $awkitienda;

        $this->awkitienda->update([
            'state' => 0
        ]);
    }


    public function delete(Awkitienda $awkitienda){
        $awkitienda->delete();
    }


    protected $rules = [
        'awkitienda.name' => 'required|unique:awkitiendas,name',
        //'awkitienda.name' => 'required|unique:awkitiendas,name,' . $awkitienda->id,
        'awkitienda.description'=> 'required',
        'awkitienda.address'=> '',
        'awkitienda.serief'=> '',
        'awkitienda.serieb'=> '',
        'awkitienda.email'=> '',
        'awkitienda.state'=> '',
        'awkitienda.user_id'=> '',
        'awkitienda.awkizona_id'=> '',
        'awkitienda.awkirepresentada_id'=> '',

    ];


/*     public function updatedAwkirepresentadaId($value){
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();
        $this->reset(['awkitienda.awkizona_id']);
    } */


    public function updatedAwkitiendaAwkirepresentadaId($value)
    {
        $this->awkitienda['awkizona_id'] = '';
        //$this->awkicliente['awkitienda_id'] = '';
        $this->awkizonas = [];
        //$this->awkitiendas = [];
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();
        //$this->awkizonas = Awkizona::pluck('name', 'id');

        //$this->reset(['awkicliente.awkizona_id', 'awkicliente.awkitienda_id']);

    }


    public function edit(Awkitienda $awkitienda){
        //dd($tienda);
        $this->awkitienda = $awkitienda;
        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $awkitienda->awkirepresentada_id)->get();
        //$this->resetValidation();
        //$this->awkitienda = $tienda;
        //dd($this->awkirepresentada);
        $this->open_edit = true;

    }


    public function update()
    {

        //es otra forma de actualizar
        //'awkitienda.name' => 'required|unique:awkitiendas,name,' . $awkitienda->id;
        //if ($this->user->hasRole('Admin')) {
            $this->validate();

            //$awkicliente['awkitiendau_id']='';
            //$this->awkitienda['awkitienda_id'] = $this->awkitiendau_id;

            //dd($this->awkicliente);
            //$this->awkitienda_id = $this->awkitiendau_id;
            //$this->validate();
       // }

        $this->awkitienda->save();


        $this->reset('open_edit');
        //$this->emitTo('show-brands', 'render');
        $this->emit('alert', 'La tienda se actualiizó correctamente');
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




}
