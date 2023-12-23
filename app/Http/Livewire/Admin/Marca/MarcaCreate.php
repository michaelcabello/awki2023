<?php

namespace App\Http\Livewire\Admin\Marca;

use Livewire\Component;
use App\Models\Marca;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MarcaCreate extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;
    public $open = false;
    public $nombre, $state;

    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:marcas',
        'state' => '',
    ];

    public function save(){
        $this->authorize('create', new Marca);

        $this->validate();

        $statee = ($this->state) ? 1 : 0 ;

        Marca::create([
            'nombre' => $this->nombre,
            'state' => $statee,
        ]);

        $this->reset(['open','nombre','state']);

        $this->emitTo('admin.marca.marca-list','render');

        $this->emit('alert','La Marca se creo correctamente');
    }




    public function render()
    {
        return view('livewire.admin.marca.marca-create');
    }
}
