<?php

namespace App\Http\Livewire\Admin\Anio;

use Livewire\Component;
use App\Models\Anio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnioCreate extends Component
{

    use AuthorizesRequests;
    public $open = false;
    public $nombre;


    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:anios',
    ];


    public function save(){
        $this->authorize('create', new Anio);
        $this->validate();


        Anio::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open','nombre']);

        $this->emitTo('admin.anio.anio-list','render');

        $this->emit('alert','El Año se creo correctamente');
    }

    public function render()
    {

        return view('livewire.admin.anio.anio-create');
    }
}
