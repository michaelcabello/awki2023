<?php

namespace App\Http\Livewire\Admin\Consulta;

use Livewire\Component;
use App\Models\Awkitienda;
use App\Models\Expediente;
use App\Models\Statusfinal;
use Livewire\WithPagination;
use App\Models\Awkirepresentada;
use App\Exports\ExpedienteExport;
use App\Models\Awkizona;

use Illuminate\Database\Eloquent\Builder;
//use Maatwebsite\Excel\Facades\Excel;

class ConsultaList extends Component
{

    use WithPagination;
    public $readyToLoad = false;
    public $awkitiendas="", $awkirepresentadas="", $awkizonas="", $statusfinals;
    //public $expedientes;
    public $search;
    public $sort = 'awkitiendas.id';
    public $direction = 'desc';
    public $cant = '10';
    public $statusfinal_id = "";

    //public $awkirepresentada_id = "", $awkizona_id = "", $awkitienda_id = "";

    public $filters = [
        'awkirepresentada_id' => '',
        'awkizona_id' => '',
        'awkitienda_id' => '',
        //'tienda' => '',
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
        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->awkizonas = null;
        $this->awkitiendas = null;
        //$this->awkitiendas = Awkitienda::pluck('name', 'id');
        $this->statusfinals = Statusfinal::pluck('nombre', 'id');
    }

    public function updatedFiltersAwkirepresentadaId($value)
    {
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();

        //$this->reset('filters.awkizona_id', 'filters.awkitienda_id');
        $this->filters['awkizona_id'] = null;
        $this->filters['awkitienda_id'] = null;
        $this->resetPage();
    }



    public function updatedFiltersAwkizonaId($value)
    {

        $this->awkitiendas = Awkitienda::where('awkizona_id', $value)->get();

       // $this->reset('filters.awkitienda_id');
       $this->filters['awkitienda_id'] = null;
       $this->resetPage();
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
         $expedientes = Expediente::filter($this->filters)->paginate(20);
        //$this->expedientes = Expediente::filter($this->filters)->paginate(2);//pasando $this->expedientes no funciona el paginate
        //$expedientesQuery = Expediente::filter($this->filters);
        //$this->expedientes = $this->cant ? $expedientesQuery->paginate($this->cant) : $expedientesQuery->get();
        return view('livewire.admin.consulta.consulta-list', compact('expedientes'));

        //se soluciona el paginate enviando parametro en este caso $expedientes y no usarlo como $this->expedientes
        //return view('livewire.admin.consulta.consulta-list');
    }
}
