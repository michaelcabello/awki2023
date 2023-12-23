<?php

namespace App\Http\Livewire\Admin\Modello;

use Livewire\Component;
use App\Models\Modello;

use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModelloCreate extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;
    public $open = false;
    public $nombre, $state;

    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:modellos',
        'state' => '',
    ];

    public function save(){
       $this->authorize('create', new Modello);
        $this->validate();

        $statee = ($this->state) ? 1 : 0 ;

        Modello::create([
            'nombre' => $this->nombre,
            'state' => $statee,
        ]);

        $this->reset(['open','nombre','state']);

        $this->emitTo('admin.modello.modello-list','render');

        $this->emit('alert','El Modelo se creo correctamente');
    }


    public function render()
    {
        return view('livewire.admin.modello.modello-create');
    }
}
