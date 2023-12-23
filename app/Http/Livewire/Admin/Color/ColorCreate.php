<?php

namespace App\Http\Livewire\Admin\Color;

use Livewire\Component;
use App\Models\Color;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ColorCreate extends Component
{

    use AuthorizesRequests;
    public $open = false;
    public $nombre;


    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:colors',
    ];


    public function save(){
        $this->authorize('create', new Color);
        $this->validate();


        Color::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open','nombre']);

        $this->emitTo('admin.color.color-list','render');

        $this->emit('alert','El Color se creo correctamente');
    }


    public function render()
    {
        return view('livewire.admin.color.color-create');
    }
}
