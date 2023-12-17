<?php

namespace App\Http\Livewire\Admin\Tipodedocumento;

use App\Models\Tipodedocumento;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class TipodedocumentoList extends Component
{
    use AuthorizesRequests; //se pone esto con jetstream livewire
    use WithPagination;
    public $statusfinal;
    public $search, $name;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    public $readyToLoad = false; //para cntrolar el preloader


    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];


    public function loadTipodedocumento()
    {
        $this->readyToLoad = true;
    }


    public function render()
    {

        if ($this->readyToLoad) {
            $tipodedocumentos = Tipodedocumento::where('nombre', 'like', '%' .$this->search. '%')
                /* ->when($this->state, function($query){
                    return $query->where('state',1);
                }) */
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $tipodedocumentos =[];
        }

        return view('livewire.admin.tipodedocumento.tipodedocumento-list', compact('tipodedocumentos'));
    }

}
