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
    public $showEditModal = false;
    public Airport $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    public function rules()
    {
        return [
            'editing.local' => 'required',
            'editing.denominacion' => 'required',
            'editing.tipo' => 'required|in:'.collect(Airport::TIPOS)->keys()->implode(','),
            'editing.coordenadas' => 'required',
            'editing.elev' => 'required',
            'editing.latitud' => 'required',
            'editing.longitud' => 'required',
            'editing.uom_elev' => 'required',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankAirport();
    }

    public function sortBy($field)
    {
        if ($field === $this->sortField) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function edit(Airport $airport)
    {
        if($this->editing->isNot($airport)) $this->editing = $airport;
        $this->showEditModal = true;
    }
    
    public function save()
    {
        $this->validate();
        
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function create()
    {
        if($this->editing->getKey()) $this->editing = $this->makeBlankAirport();
        $this->showEditModal = true;
    }

    public function makeBlankAirport()
    {
        return Airport::make([
            'tipo' => 'Aeródromo',
            'latitud' => '-60.57066000',
            'longitud' => '-33.27226000',
            'uom_elev' => 'Metros',
        ]);
    }

    public function render()
    {

        $search = '%' . $this->search . '%';

        return view('livewire.show-airports', [
            'airports' => Airport::where('denominacion', 'like', $search)->orderBy($this->sortField, $this->sortDirection)->paginate(9)
        ])
            ->layout('layouts.app', ['header' => 'Aeropuertos']);
    }
}
