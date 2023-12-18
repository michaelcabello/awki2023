<?php

namespace App\Http\Livewire\Admin\Awkirepresentada;

use App\Models\User;
use Livewire\Component;
use App\Models\Awkirepresentada;

class RepresentadaCreate extends Component
{
    public $open = false;
    public $razonsocial,$ruc,$address,$phone, $movil, $state, $nota1, $nota2, $user_id="";
    public $users=[];

    protected $rules = [
        'razonsocial'=> 'required|unique:awkirepresentadas',
        'ruc'=> 'required|unique:awkirepresentadas',
        'user_id'=> 'required|unique:awkirepresentadas',
    ];


    public function mount(){

        $this->users = User::pluck('name','id');

     }


    public function save(){
        $this->validate();

        //dd($this->state);

        $statee = ($this->state) ? 1 : 0 ;


        Awkirepresentada::create([
            'razonsocial' => $this->razonsocial,
            'ruc' => $this->ruc,
            'address' => $this->address,
            'phone' => $this->phone,
            'movil' => $this->movil,
            'nota1' => $this->nota1,
            'nota2' => $this->nota2,
            'state' => $statee,
            'user_id' => $this->user_id,//usuario externo que va entrar al sistema y tendra acceso solo de lectura
        ]);

        $this->reset(['open','razonsocial','ruc','address','phone','movil', 'nota1', 'nota2','state','user_id']);

        $this->emitTo('admin.awkirepresentada.representada-list','render');

        $this->emit('alert','El Cliente de Awki se creo correctamente');
    }


    public function render()
    {

        return view('livewire.admin.awkirepresentada.representada-create');
    }
}
