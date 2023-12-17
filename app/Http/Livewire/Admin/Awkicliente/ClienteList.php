<?php

namespace App\Http\Livewire\Admin\Awkicliente;

use App\Models\User;
use Livewire\Component;
use App\Models\Awkizona;
use App\Models\Awkitienda;
use App\Models\Awkicliente;
use Livewire\WithPagination;
use App\Models\Awkirepresentada;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClienteList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $awkicliente;
    public $search, $dni, $numdocumento, $numerodeplaca, $apellidopaterno, $apellidomaterno, $state, $awkitiendau_id;
    public $user;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader
    public $awkitiendas, $awkizonas, $awkirepresentadas;
    public $awkirepresentada_id, $awkizona_id, $awkitienda_id;


    protected $listeners = ['render', 'delete'];


    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];



    public function mount()
    {
        $this->user = Auth::user();

        //$this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkirepresentadas = [];
        $this->awkizonas = [];
        $this->awkitiendas = [];
        //$this->awkizonas = Awkizona::where('awkirepresentada_id', $awkicliente->awkirepresentada_id);
        //$this->awkitiendas = Awkitienda::where('awkizona_id', $awkicliente->awkizona_id);


        //s$this->awkitiendas = Awkitienda::pluck('name', 'id');
        //$this->awkitiendas = Awkitienda::all();
        //$this->awkizonas = Awkizona::pluck('name', 'id');
       // $this->awkizonas = Awkizona::all();

        //$this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkicliente = new Awkicliente();
        //$this->users = User::pluck('name', 'id');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadClientes()
    {
        $this->readyToLoad = true;
    }

    public function activar(Awkicliente $awkicliente)
    {
        $this->awkicliente = $awkicliente;

        $this->awkicliente->update([
            'state' => 1
        ]);
    }

    public function desactivar(Awkicliente $awkicliente)
    {
        $this->awkicliente = $awkicliente;

        $this->awkicliente->update([
            'state' => 0
        ]);
    }



    public function render()
    {

        $this->authorize('view', new Awkicliente);

        $user = Auth::user();

        //$usuario = User::find(2);
        $cuenta = $user->awkirepresentada;
        if ($this->readyToLoad) {
            if ($user->hasRole('Admin')) {

                $clientes = Awkicliente::select('awkiclientes.*', 'awkitiendas.name as tienda_name', 'awkirepresentadas.razonsocial')
                    ->join('awkitiendas', 'awkiclientes.awkitienda_id', '=', 'awkitiendas.id')
                    ->join('awkirepresentadas', 'awkiclientes.awkirepresentada_id', '=', 'awkirepresentadas.id')

                    ->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                    ->orWhere('awkiclientes.dni', 'like', '%' . $this->search . '%')
                    ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%')
                    ->when($this->state, function ($query) {
                        return $query->where('awkiclientes.state', 1);
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } elseif ($cuenta) {

                $clientes = Awkicliente::query()
                    ->select('awkiclientes.*', 'awkitiendas.name as tienda_name', 'awkirepresentadas.razonsocial')
                    ->join('awkitiendas', 'awkiclientes.awkitienda_id', '=', 'awkitiendas.id')
                    ->join('awkirepresentadas', 'awkiclientes.awkirepresentada_id', '=', 'awkirepresentadas.id')
                    //->join('awkiclientes', 'awkirepresentadas.id', '=', 'awkiclientes.awkirepresentada_id ')
                    ->where('awkiclientes.awkirepresentada_id', '=', $cuenta->id)
                    //->whereIn('awkitiendas.id', $user->tiendas->pluck('id')) // Filtrar por tiendas del usuario
                    //->whereIn('awkirepresentadas.user_id', $cuenta->id)
                    ->where(function ($query) {
                        $query->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                            ->orWhere('awkiclientes.dni', 'like', '%' . $this->search . '%')
                            ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%')
                            ->orWhere('awkirepresentadas.razonsocial', 'like', '%' . $this->search . '%');
                    })
                    ->when($this->state, function ($query) {
                        return $query->where('awkiclientes.state', 1);
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } else {

                $clientes = Awkicliente::select('awkiclientes.*', 'awkitiendas.name as tienda_name', 'awkirepresentadas.razonsocial')
                    ->join('awkitiendas', 'awkiclientes.awkitienda_id', '=', 'awkitiendas.id')
                    ->join('awkirepresentadas', 'awkiclientes.awkirepresentada_id', '=', 'awkirepresentadas.id')
                    ->where(function ($query) {
                        $query->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                            ->orWhere('awkiclientes.dni', 'like', '%' . $this->search . '%')
                            ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%');
                    })
                    ->when($this->state, function ($query) {
                        return $query->where('awkiclientes.state', 1);
                    })
                    ->whereHas('awkitienda', function ($query) {
                        $query->where('user_id', auth()->id());
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            }
        } else {
            $clientes = [];
        }



        return view('livewire.admin.awkicliente.cliente-list', compact('clientes'));
    }

    protected $rules = [
        'awkicliente.dni' => 'required',
        'awkicliente.nombres' => 'required',
        'awkicliente.apellidopaterno' => '',
        'awkicliente.apellidomaterno' => '',
        'awkicliente.state' => '',
        'awkicliente.awkirepresentada_id' => '',
        'awkicliente.awkizona_id' => '',
        'awkicliente.awkitienda_id' => '',
        //'awkicliente.awkitiendau_id' => '',
    ];

    public function updatedAwkiclienteAwkirepresentadaId($value)
    {
        $this->awkicliente['awkizona_id'] = '';
        $this->awkicliente['awkitienda_id'] = '';
        $this->awkizonas = [];
        $this->awkitiendas = [];
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();
        //$this->awkizonas = Awkizona::pluck('name', 'id');

        //$this->reset(['awkicliente.awkizona_id', 'awkicliente.awkitienda_id']);

    }


    public function updatedAwkiclienteAwkizonaId($value)
    {
        $this->awkitiendas = Awkitienda::where('awkizona_id', $value)->get();
        //$this->reset(['awkicliente.awkitienda_id']);
        $awkicliente['awkitienda_id'] = '';
    }



    public function edit(Awkicliente $awkicliente)
    {
        //dd($tienda);
        $this->awkicliente = $awkicliente;
        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $awkicliente->awkirepresentada_id)->get();
        //dd($this->awkizonas);

        $this->awkitiendas = Awkitienda::where('awkizona_id', $awkicliente->awkizona_id)->get();

        //$this->resetValidation();
        if (!$this->user->hasRole('Admin')) {
           // $this->awkicliente['awkirepresentada_id'] = $awkicliente->awkirepresentada_id;
            //$this->awkicliente['awkizona_id'] = $awkicliente->awkizona_id;
            $this->awkitiendau_id = $awkicliente->awkitienda_id;
        }

        //dd($awkicliente['awkitiendau_id']);

        //$this->awkicliente = $awkicliente;
        //dd($this->awkirepresentada);
        $this->open_edit = true;
    }

    public function cancel()
    {
        $this->open_edit = false;
    }


    public function save()
    {

        //es otra forma de actualizar

        if ($this->user->hasRole('Admin')) {
            $this->validate();
        } else {
            //$awkicliente['awkitiendau_id']='';
            $this->awkicliente['awkitienda_id'] = $this->awkitiendau_id;

            //dd($this->awkicliente);
            //$this->awkitienda_id = $this->awkitiendau_id;
            $this->validate();
        }

        $this->awkicliente->save();


        $this->reset('open_edit');
        //$this->emitTo('show-brands', 'render');
        $this->emit('alert', 'El Cliente se actualiizó correctamente');
    }
}
