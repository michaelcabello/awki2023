<?php

namespace App\Http\Livewire\Admin\Consulta;

use App\Exports\ExpedienteExport;
use App\Models\Awkitienda;
use App\Models\Expediente;
use App\Models\Statusfinal;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
//use Maatwebsite\Excel\Facades\Excel;

class ConsultaList extends Component
{

    use WithPagination;
    public $readyToLoad = false;
    public $awkitiendas, $statusfinals;
    public $expedientes;
    public $search;
    public $sort = 'awkitiendas.id';
    public $direction = 'desc';
    public $cant = '10';
    public $awkitienda_id="";
    public $statusfinal_id="";

    public $filters = [
        'tienda' => '',
        'fromdate' => '',
        'todate' => '',
        'fromdaterecepcion' => '',
        'todaterecepcion' => '',
        'status' => '',
    ];


    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'awkitiendas.id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];


    public function mount()
    {
        $this->awkitiendas = Awkitienda::pluck('name', 'id');
        $this->statusfinals = Statusfinal::pluck('nombre', 'id');

    }


    public function updatingFiltersFromdate()
    {
        $this->resetPage();
    }

    public function updatingFiltersFromdaterecepcion()
    {
        $this->resetPage();
    }

    public function updatingFiltersTodate()
    {
        $this->resetPage();
    }

    public function updatingFiltersTodaterecepcion()
    {
        $this->resetPage();
    }

    public function generateReport()
    {
        //return Excel::download(new ExpedienteExport(), 'expediente.xlsx');
        //return Excel::download(new ExpedienteExport(), 'expediente.csv', \Maatwebsite\Excel\Excel::CSV);
        //return (new ExpedienteExport())->download();
        return new ExpedienteExport($this->filters);
    }


    public function render()
    {
        $this->expedientes = Expediente::filter($this->filters)->get();
        return view('livewire.admin.consulta.consulta-list');
    }
}
