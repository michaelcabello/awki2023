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
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

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

        $user = Auth::user();
        //$user2 = $user->awkirepresentada;//capatura al usuario externo que es dueño de la tienda
        $user2tienda = Awkitienda::where('user2_id', $user->id)->first();//usuario externo de awki metido en tienda
        //dd($user2tienda);
        if ($user->hasRole('Admin')) {
            $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        } elseif($user2tienda){
            //$this->awkirepresentadas = $empresa->pluck('razonsocial', 'id');
            $empresa = $user2tienda->awkirepresentada;
            $this->awkirepresentadas = collect([$empresa])->pluck('razonsocial', 'id');
        } else{
            $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        }


        //$this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');

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
        $user = Auth::user();//usuario gestor de awki
        $user2tienda = Awkitienda::where('user2_id', $user->id)->first();//usuario externo de awki metido en tienda

        //dd($user2tienda->expedientes);
        //dd($user->hasRole('Admin'));

        //$user2tiendas = $user->tiendass()->get();

        if ($user->hasRole('Admin')) {
            // El usuario tiene el rol de admin
            $expedientes = Expediente::filter($this->filters)->paginate(20);
        } elseif($user2tienda) {
            $expedientes = $user2tienda->expedientes()->filter($this->filters)->paginate(20);
            //dd($expedientes);
        }else{
            $expedientes = $user->expedientes()->filter($this->filters)->paginate(20);
        }


        //$this->expedientes = Expediente::filter($this->filters)->paginate(2);//pasando $this->expedientes no funciona el paginate
        //$expedientesQuery = Expediente::filter($this->filters);
        //$this->expedientes = $this->cant ? $expedientesQuery->paginate($this->cant) : $expedientesQuery->get();
        return view('livewire.admin.consulta.consulta-list', compact('expedientes'));

        //se soluciona el paginate enviando parametro en este caso $expedientes y no usarlo como $this->expedientes
        //return view('livewire.admin.consulta.consulta-list');
    }
}
