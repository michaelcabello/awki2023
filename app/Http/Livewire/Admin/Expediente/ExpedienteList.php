<?php

namespace App\Http\Livewire\Admin\Expediente;

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


    public function render()
    {
        return view('livewire.admin.expediente.expediente-list');
    }
}
