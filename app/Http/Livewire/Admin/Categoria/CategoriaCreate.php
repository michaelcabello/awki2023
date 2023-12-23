<?php

namespace App\Http\Livewire\Admin\Categoria;

use Livewire\Component;

use App\Models\Categoria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoriaCreate extends Component
{

    use AuthorizesRequests;
    public $open = false;
    public $nombre;


    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:categorias',
    ];


    public function save(){
        $this->authorize('create', new Categoria);
        $this->validate();


        Categoria::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open','nombre']);

        $this->emitTo('admin.categoria.categoria-list','render');

        $this->emit('alert','La Categoria se creo correctamente');
    }


    public function render()
    {
        return view('livewire.admin.categoria.categoria-create');
    }
}
