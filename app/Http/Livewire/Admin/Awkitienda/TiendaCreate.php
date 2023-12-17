<?php

namespace App\Http\Livewire\Admin\Awkitienda;

use App\Models\User;
use Livewire\Component;
use App\Models\Awkizona;
use App\Models\Awkitienda;
use App\Models\Awkirepresentada;

class TiendaCreate extends Component
{

    public $open = false;
    public $name, $address, $description, $serief, $serieb, $email, $state, $user2_id="", $user_id="", $awkizona_id="", $awkirepresentada_id = "";
    public $awkirepresentadas = [];
    public $awkizonas = [];
    public $users = [];

    protected $rules = [
        'name' => 'required',
        'awkizona_id' => 'required',
        'awkirepresentada_id' => 'required',
    ];


    public function mount()
    {

        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial', 'id');
        $this->users = User::pluck('name', 'id');
    }



    public function updatedAwkirepresentadaId($value){
        $this->awkizonas = Awkizona::where('awkirepresentada_id', $value)->get();
        $this->reset(['awkizona_id']);
    }



    public function save()
    {
        $this->validate();

        //dd($this->state);

        $statee = ($this->state) ? 1 : 0;


        Awkitienda::create([
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'serief' => $this->serief,
            'serieb' => $this->serieb,
            'email' => $this->email,
            'state' => $statee,
            'user_id' => $this->user_id,
            'user2_id' => $this->user2_id,
            'awkizona_id' => $this->awkizona_id,
            'awkirepresentada_id' => $this->awkirepresentada_id,
        ]);

        $this->reset(['open', 'name', 'address', 'description', 'serief', 'serieb', 'state', 'email', 'awkizona_id', 'awkirepresentada_id', 'user_id']);

        $this->emitTo('admin.awkitienda.tienda-list', 'render');

        $this->emit('alert', 'La Tienda se creo correctamente');
    }

    public function render()
    {
        return view('livewire.admin.awkitienda.tienda-create');
    }
}
