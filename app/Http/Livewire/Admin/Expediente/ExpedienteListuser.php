<?php

namespace App\Http\Livewire\Admin\Expediente;

use Livewire\Component;
use App\Models\Expediente;
use App\Models\Awkicliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class ExpedienteListuser extends Component
{

    public $cliente;
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


    public function mount(Awkicliente $cliente)
    {
        $this->cliente = $cliente;
        //$this->awkitiendasu = Awkitienda::pluck('name', 'id');
       // $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        //$this->awkitiendas = Awkitienda::pluck('name', 'id');
    }


    public function render()
    {

        $expedientes = $this->cliente->expedientes;






        return view('livewire.admin.expediente.expediente-listuser', compact('expedientes'));
    }
}
