<?php

namespace App\Http\Livewire;

use App\Models\Airport;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAirports extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'local';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if($field === $this->sortField){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
    }

    public function render()
    {

        $search = '%'.$this->search.'%';

        return view('livewire.show-airports',[
            'airports' => Airport::where('denominacion','like',$search)->orderBy($this->sortField,$this->sortDirection)->paginate(9)
        ])
        ->layout('layouts.app', ['header' => 'Aeropuertos']);
    }
}
