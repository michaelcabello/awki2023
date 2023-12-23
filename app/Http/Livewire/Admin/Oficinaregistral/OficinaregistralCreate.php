<?php

namespace App\Http\Livewire\Admin\Oficinaregistral;

use Livewire\Component;
use App\Models\Oficinaregistral;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OficinaregistralCreate extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;
    public $open = false;
    public $nombre, $state;

    public function nuevo(){
        $this->open = true;
    }

    protected $rules = [
        'nombre'=> 'required|unique:oficinaregistrals',
        'state' => '',
    ];

    public function save(){
       $this->authorize('create', new Oficinaregistral);
        $this->validate();

        $statee = ($this->state) ? 1 : 0 ;

        Oficinaregistral::create([
            'nombre' => $this->nombre,
            'state' => $statee,
        ]);

        $this->reset(['open','nombre','state']);

        $this->emitTo('admin.oficinaregistral.oficinaregistral-list','render');

        $this->emit('alert','La oficina se creo correctamente');
    }


    public function render()
    {
        return view('livewire.admin.oficinaregistral.oficinaregistral-create');
    }
}
