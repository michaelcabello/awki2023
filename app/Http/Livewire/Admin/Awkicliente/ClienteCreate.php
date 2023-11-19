<?php

namespace App\Http\Livewire\Admin\Awkicliente;

use Livewire\Component;
use App\Models\Awkizona;
use App\Models\Awkitienda;
use App\Models\Awkicliente;
use App\Models\Awkirepresentada;
use Illuminate\Support\Facades\Auth;

class ClienteCreate extends Component
{

    public $open = false;
    public $user;
    public $dni, $nombres, $apellidopaterno, $apellidomaterno, $state, $awkirepresentada_id = "", $awkizona_id = "", $awkitienda_id = "";
    public $awkirepresentadau_id, $awkizonau_id, $awkitiendau_id="";
    public $awkitiendas = [];
    //public $awkitiendasu = [];
    public $awkirepresentadas = [];
    public $awkizonas = [];

    protected $rules = [
        'dni' => 'required|unique:awkiclientes',
        'nombres' => 'required',
        'apellidopaterno' => 'required',
        'apellidomaterno' => 'required',
        'state' => '',
        //'awkirepresentada_id' => '',//estas validaciones son importantes ponerlo en nulo de lo contrario no graba en los usuarios que no son administrador
        //'awkizona_id' => '',//estas validaciones son importantes ponerlo en nulo de lo contrario no graba en los usuarios que no son administrador
        //'awkitienda_id' => '',
        //'awkitiendau_id' => '',
    ];


    public function mount()
    {
        $this->user = Auth::user();
        //$this->awkitiendasu = Awkitienda::pluck('name', 'id');
        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        //$this->awkitiendas = Awkitienda::pluck('name', 'id');
    }

    public function updatedAwkirepresentadaId($value)
    {
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();
        $this->reset(['awkizona_id', 'awkitienda_id']);
    }

    public function updatedAwkizonaId($value)
    {
        $this->awkitiendas = Awkitienda::where('awkizona_id', $value)->get();
        $this->reset(['awkitienda_id']);
    }

    public function cancel()
    {
        $this->reset(['open', 'dni', 'nombres', 'apellidopaterno', 'apellidomaterno', 'state', 'awkitienda_id', 'awkizona_id', 'awkirepresentada_id', 'awkitiendau_id']);
    }


    public function save()
    {


        $statee = ($this->state) ? 1 : 0;


        if ($this->user->hasRole('Admin')) {

            $rules['awkirepresentada_id'] = 'required';
            $rules['awkizona_id'] = 'required';
            $rules['awkitienda_id'] = 'required';
            $this->validate();

            $awkirepresentadaId = $this->awkirepresentada_id;
            $awkizonaId = $this->awkizona_id;

/*             Awkicliente::create([
                'dni' => $this->dni,
                'nombres' => $this->nombres,
                'apellidopaterno' => $this->apellidopaterno,
                'apellidomaterno' => $this->apellidomaterno,
                'state' => $statee,
                'awkirepresentada_id' => $awkirepresentadaId,
                'awkizona_id' => $awkizonaId,
                'awkitienda_id' => $this->awkitienda_id,
            ]); */

        } else {
            $rules['awkirepresentada_id'] = '';
            $rules['awkizona_id'] = '';
            $rules['awkitienda_id'] = '';
            $rules['awkitiendau_id'] = '';
            $this->validate();
            $tienda = Awkitienda::find($this->awkitiendau_id);

            $awkirepresentadaId = $tienda->awkirepresentada_id;
            $awkizonaId = $tienda->awkizona_id;
            $this->awkitienda_id = $this->awkitiendau_id;


        }


        Awkicliente::create([
            'dni' => $this->dni,
            'nombres' => $this->nombres,
            'apellidopaterno' => $this->apellidopaterno,
            'apellidomaterno' => $this->apellidomaterno,
            'state' => $statee,
            'awkirepresentada_id' => $awkirepresentadaId,
            'awkizona_id' => $awkizonaId,
            'awkitienda_id' => $this->awkitienda_id,
        ]);



        $this->reset(['open', 'dni', 'nombres', 'apellidopaterno', 'apellidomaterno', 'state', 'awkitienda_id', 'awkizona_id', 'awkirepresentada_id']);

        $this->emitTo('admin.awkicliente.cliente-list', 'render');

        $this->emit('alert', 'El Cliente se creo correctamente');
    }



    public function render()
    {
        return view('livewire.admin.awkicliente.cliente-create');
    }
}
