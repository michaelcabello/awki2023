<?php

namespace App\Http\Livewire\Admin\Statussunarp;

use Livewire\Component;
use App\Models\Statussunarp;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatussunarpCreate extends Component
{
    use AuthorizesRequests;
    //use WithFileUploads;
    public $open = false;
    public $nombre;


    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:statussunarps',
    ];


    public function save(){
        $this->authorize('create', new Statussunarp);
        $this->validate();


        Statussunarp::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open','nombre']);

        $this->emitTo('admin.statussunarp.statussunarp-list','render');

        $this->emit('alert','El Status Sunarp se creo correctamente');
    }

    public function render()
    {
        return view('livewire.admin.statussunarp.statussunarp-create');
    }
}
