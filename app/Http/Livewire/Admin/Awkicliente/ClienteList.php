<?php

namespace App\Http\Livewire\Admin\Awkicliente;

use App\Models\User;
use Livewire\Component;
use App\Models\Awkitienda;
use App\Models\Awkicliente;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\Paginator;

class ClienteList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $awkicliente;
    public $search, $dni, $numdocumento, $numerodeplaca, $apellidopaterno, $apellidomaterno, $state, $awkitienda_id;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader
    public $awkitiendas;


    protected $listeners = ['render', 'delete'];


    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function mount()
    {

        $this->awkitiendas = Awkitienda::pluck('name', 'id');
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



        /*
        public function render()
        {
            $user = Auth::user();

            if ($this->readyToLoad) {
                if ($user->hasRole('Admin')) {
                    $clientes = Awkicliente::select('awkiclientes.*', 'awkitiendas.name as tienda_name', 'awkirepresentadas.razonsocial')
                        ->join('awkitiendas', 'awkiclientes.awkitienda_id', '=', 'awkitiendas.id')
                        ->join('awkirepresentadas', 'awkiclientes.awkirepresentada_id', '=', 'awkirepresentadas.id')
                        ->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                        ->where('awkiclientes.dni', 'like', '%' . $this->search . '%')
                        ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%')
                        ->when($this->state, function ($query) {
                            return $query->where('awkiclientes.state', 1);
                        })
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
                } else {
                    $searchTerm = '%' . $this->search . '%';

                    $clientes = Awkicliente::select('awkiclientes.*', 'awkitiendas.name as tienda_name', 'awkirepresentadas.razonsocial')
                        ->join('awkitiendas', 'awkiclientes.awkitienda_id', '=', 'awkitiendas.id')
                        ->join('awkirepresentadas', 'awkiclientes.awkirepresentada_id', '=', 'awkirepresentadas.id')
                        ->whereIn('awkitiendas.id', $user->tiendas->pluck('id'))
                        ->where(function ($query) use ($searchTerm) {
                            $query->where('awkiclientes.nombres', 'like', $searchTerm)
                                ->orWhere('awkiclientes.dni', 'like', $searchTerm)
                                ->orWhere('awkitiendas.name', 'like', $searchTerm)
                                ->orWhere('awkirepresentadas.razonsocial', 'like', $searchTerm);
                        })
                        ->when($this->state, function ($query) {
                            return $query->where('awkiclientes.state', 1);
                        })
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
                }
            } else {
                $clientes = [];
            }

            return view('livewire.admin.awkicliente.cliente-list', compact('clientes'));
        } */











        //dd($clientes);

        return view('livewire.admin.awkicliente.cliente-list', compact('clientes'));
    }
}
