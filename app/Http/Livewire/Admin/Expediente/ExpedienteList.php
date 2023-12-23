<?php

namespace App\Http\Livewire\Admin\Expediente;

use App\Models\Expediente;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ExpedienteList extends Component
{

    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $expediente;
    public $search, $numdocumento, $titulo, $numerodeplaca, $apellidomaterno, $state, $awkitienda_id;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader
    public $awkitiendas;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadExpedientes()
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




    public function render()
    {
        //$this->authorize('view', new Awkicliente);

        $user = Auth::user();


        if ($this->readyToLoad) {
            if ($user->hasRole('Admin')) {
                $expedientes = Expediente::select('expedientes.*', 'users.name as gestor_name', 'awkitiendas.name as tienda_name', 'awkiclientes.dni as cliente_dni', 'awkiclientes.nombres as cliente_name', 'awkiclientes.apellidopaterno as cliente_apaterno', 'awkiclientes.apellidomaterno as cliente_amaterno')
                    ->join('awkitiendas', 'expedientes.awkitienda_id', '=', 'awkitiendas.id')
                    ->join('awkiclientes', 'expedientes.awkicliente_id', '=', 'awkiclientes.id')
                    ->join('users', 'expedientes.user_id', '=', 'users.id')
                    ->where(function ($query) {
                        $query->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                            ->orWhere('awkiclientes.dni', 'like', '%' . $this->search . '%')
                            ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%')
                            ->orWhere('users.name', 'like', '%' . $this->search . '%')
                            ->orWhere('expedientes.numerodeplaca', 'like', '%' . $this->search . '%');
                    })
                    /* ->when($this->state, function ($query) {
                        return $query->where('awkiclientes.state', 1);
                    }) */
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } else {
                $expedientes = Expediente::select('expedientes.*', 'awkitiendas.name as tienda_name', 'awkiclientes.nombres as cliente_name')
                    ->join('awkitiendas', 'expedientes.awkitienda_id', '=', 'awkitiendas.id')
                    ->join('awkiclientes', 'expedientes.awkicliente_id', '=', 'awkiclientes.id')
                    ->whereIn('awkitiendas.id', $user->tiendas->pluck('id')) // Filtrar por tiendas del usuario
                    ->where(function ($query) {
                        $query->where('awkiclientes.nombres', 'like', '%' . $this->search . '%')
                            ->orWhere('awkiclientes.dni', 'like', '%' . $this->search . '%')
                            ->orWhere('awkitiendas.name', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            }
        } else {
            $expedientes = [];
        }



        return view('livewire.admin.expediente.expediente-list', compact('expedientes'));
    }
}
