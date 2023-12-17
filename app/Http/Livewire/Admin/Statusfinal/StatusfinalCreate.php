<?php

namespace App\Http\Livewire\Admin\Statusfinal;

use Livewire\Component;

use App\Models\Statusfinal;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatusfinalCreate extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;
    public $open = false;
    public $nombre;


    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:statusfinals',
    ];


    public function save(){
        $this->authorize('create', new Statusfinal);
        $this->validate();


        Statusfinal::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open','nombre']);

        $this->emitTo('admin.statusfinal.statusfinal-list','render');

        $this->emit('alert','El Status se creo correctamente');
    }


    public function render()
    {
        return view('livewire.admin.statusfinal.statusfinal-create');
    }
}
