<?php

namespace App\Http\Livewire\Admin\Awkizona;

use App\Models\Awkirepresentada;
use App\Models\Awkizona;
use Livewire\Component;

class ZonaCreate extends Component
{

    public $open = false;
    public $name, $description, $awkirepresentada_id="", $state;
    public $awkirepresentadas=[];

    protected $rules = [
        'name'=> 'required',
        'awkirepresentada_id'=> 'required',
    ];


    public function mount(){

        $this->awkirepresentadas = Awkirepresentada::pluck('razonsocial','id');

     }


     public function save(){
        $this->validate();

        //dd($this->state);

        $statee = ($this->state) ? 1 : 0 ;


        Awkizona::create([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $statee,
            'awkirepresentada_id' => $this->awkirepresentada_id,
        ]);

        $this->reset(['open','name','description','state','awkirepresentada_id']);

        $this->emitTo('admin.awkizona.zona-list','render');

        $this->emit('alert','La Zona se creo correctamente');
    }


    public function render()
    {

        return view('livewire.admin.awkizona.zona-create');
    }
}
