<?php

namespace App\Http\Livewire;

use App\Models\Airport;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAirports extends Component
{
    use WithPagination;

    public $sortField = 'local';
    public $sortDirection = 'asc';
    public $showEditModal = false;
    public $showFilters = false;
    public $selectPage = false;
    public $allSelected= false;
    public $selected = [];
    public $filters = [
        'search' => null,
        'local_code' => null,
        'tipo' => '',
        'elev-min' => null,
        'elev-max' => null,
    ];
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

    public function mount() { $this->editing = $this->makeBlankAirport(); }

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

    public function exportSelected(){
        return response()->streamDownload(function(){
            echo Airport::whereKey($this->selected)->toCsv();
        },'airports.csv');
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

    public function updatedSelectPage($value)
    {
        $this->selected = $value
        ? $this->airports->pluck('id')->map(fn($id) => (string) $id)
        : [];
    }

    public function updatedSelected()
    {
        $this->allSelected = false;
        $this->selectPage = false;
    }

    public function selectAll()
    {
        $this->allSelected = true;
    }

    public function updatedFilters(){ $this->resetPage(); }

    public function resetFilters(){ $this->reset('filters'); }

    public function getAirportsQueryProperty()
    {
        return Airport::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where('denominacion','like','%'.$search.'%'))
            ->when($this->filters['local_code'], fn($query, $local) => $query->where('local','like','%'.$local.'%'))
            ->when($this->filters['tipo'], fn($query, $tipo) => $query->where('tipo',$tipo))
            ->when($this->filters['elev-min'], fn($query, $elev) => $query->where('elev','>=',$elev))
            ->when($this->filters['elev-max'], fn($query, $elev) => $query->where('elev','<=',$elev))
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function getAirportsProperty()
    {
        
        return $this->airportsQuery->paginate(9);
    }

    public function render()
    {
        if($this->allSelected){
            $this->selected = $this->airports->pluck('id')->map(fn($id) => (string) $id);
        }

        return view('livewire.show-airports', [
            'airports' => $this->airports
        ])->layout('layouts.app', ['header' => 'Aeropuertos']);
    }
}
