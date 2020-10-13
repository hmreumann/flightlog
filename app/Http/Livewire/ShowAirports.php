<?php

namespace App\Http\Livewire;

use App\Models\Airport;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAirports extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {

        $search = '%'.$this->search.'%';

        return view('livewire.show-airports',[
            'airports' => Airport::where('denominacion','like',$search)->paginate(9)
        ])
        ->layout('layouts.app', ['header' => 'Aeropuertos']);
    }
}
