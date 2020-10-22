<div class="p-4">
    <div class="flex-col space-y-4">
        <div class="flex justify-between">
            <div class="w-2/4 flex space-x-4">
                <x-jet-input wire:model="filters.search" placeholder="Buscar Aeropuerto..." />
                <x-button.link wire:click="$toggle('showFilters')">@if($showFilters) Esconder @endif Busqueda avanzada...</x-button.link>
            </div>
            <div class="flex items-center space-x-4">
                <x-button.secondary type="button" wire:click="exportSelected">
                    <x-icon.download /> Exportar
                </x-button.secondary>
                <livewire:import-airports />
                <x-button.primary type="button" wire:click="create">
                    <x-icon.plus /> Nuevo
                </x-button.primary>
            </div>
        </div>

        <!-- Advanced Search -->
        <div>
            @if ($showFilters)
            <div class="bg-cool-gray-200 p-4 rounded shadow-inner flex relative">
                <div class="w-1/2 pr-2 space-y-4">

                    <x-input.group inline for="local_code" label="Codigo Local">
                        <x-input.text wire:model="filters.local_code" id="local_code" placeholder="Local" />
                    </x-input.group>

                    <x-input.group inline for="tipo" label="Tipo">
                        <x-input.select wire:model="filters.tipo" id="tipo">
                            <option value="" disabled>Seleccion el tipo</option>
                            @foreach(App\Models\Airport::TIPOS as $value=> $label)
                            <option value="{{$value}}">{{$label}}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                </div>

                <div class="w-1/2 pl-2 space-y-4">

                    <x-input.group inline for="elev-min" label="Elevacion Minima">
                        <x-input.text wire:model.lazy="filters.elev-min" id="elev-min" placeholder="Elevacion" />
                    </x-input.group>
                    <x-input.group inline for="elev-max" label="Elevacion Maxima">
                        <x-input.text wire:model.lazy="filters.elev-max" id="elev-max" placeholder="Elevacion" />
                    </x-input.group>

                    <x-button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4">Reset Filters</x-button.link>
                </div>
            </div>
            @endif
        </div>

        <x-table>
            <x-slot name="head">
                <x-table.heading class="pr-0 w-8">
                    <x-input.checkbox wire:model="selectPage" />
                </x-table.heading>
                <x-table.heading sortable wire:click="sortBy('local')" :direction="$sortField === 'local' ? $sortDirection : null">Local</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('denominacion')" :direction="$sortField === 'denominacion' ? $sortDirection : null" class="w-full">Denominación</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('tipo')" :direction="$sortField === 'tipo' ? $sortDirection : null">Tipo</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('coordenadas')" :direction="$sortField === 'coordenadas' ? $sortDirection : null">Coordenadas</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('elev')" :direction="$sortField === 'elev' ? $sortDirection : null">Elevación (Mts)</x-table.heading>
                <x-table.heading></x-table.heading>
            </x-slot>

            <x-slot name="body">
                @if($selectPage)
                <x-table.row>
                    <x-table.cell class="bg-cool-gray-200" colspan="7">
                        @unless($allSelected)
                        <span>Seleccionaste <strong>{{ $airports->count() }}</strong> aeropuertos, ¿Quieres seleccionar los <strong>{{ $airports->total() }}</strong>?</span>
                        <x-button.link wire:click="selectAll" class="ml-2 text-blue-800">Seleccionar todos</x-button.link>
                        @else
                        <span>Seleccionaste los <strong>{{ $airports->total() }}</strong> aeropuetos.</span>
                        @endif
                    </x-table.cell>
                </x-table.row>
                @endif
                
                @forelse($airports as $airport)
                <x-table.row wire:loading.class="opacity-75" wire:key="{{$airport->id}}">
                    <x-table.cell class="pr-0 w-8">
                        <x-input.checkbox wire:model="selected" value="{{$airport->id}}" />
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-cool-gray-600 truncate">
                            {{$airport->local}}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-cool-gray-400 truncate">
                            {{$airport->denominacion}}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-white px-1 rounded truncate bg-{{ $airport->status_color }}-400">
                            {{$airport->tipo}}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-cool-gray-500 truncate">
                            {{$airport->coordenadas}}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-cool-gray-500 truncate">
                            {{$airport->elev}}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        
                        <a href="{{ route('airport.show',['airport'=>$airport])}}"><x-icon.eye /></a>
                    </x-table.cell>

                </x-table.row>
                @empty
                <x-table.row>
                    <x-table.cell colspan="6" class="text-center">
                        <span class="text-xl text-gray-500">Sin aeropuertos para esta busqueda...</span>
                    </x-table.cell>
                </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div>
            {{$airports->links()}}
        </div>
    </div>

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model="showEditModal">
            <x-slot name="title">Edit Aeropuerto</x-slot>
            <x-slot name="content">
                <x-input.group for="local" label="Codigo Local" :error="$errors->first('editing.local')">
                    <x-input.text id="local" name="local" wire:model="editing.local" />
                </x-input.group>
                <x-input.group for="denominacion" label="Denominación" :error="$errors->first('editing.denominacion')">
                    <x-input.text id="denominacion" name="denominacion" wire:model="editing.denominacion" />
                </x-input.group>
                <x-input.group for="tipo" label="Tipo" :error="$errors->first('editing.tipo')">
                    <x-input.select id="tipo" wire:model="editing.tipo">
                        @foreach(App\Models\Airport::TIPOS as $value => $label)
                        <option value="{{$value}}">{{$label}}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
                <x-input.group for="coordenadas" label="Coordenadas" :error="$errors->first('editing.coordenadas')">
                    <x-input.text id="coordenadas" name="coordenadas" wire:model="editing.coordenadas" />
                </x-input.group>
                <x-input.group for="elev" label="Elevación" :error="$errors->first('editing.elev')">
                    <x-input.text id="elev" name="elev" wire:model="editing.elev" />
                </x-input.group>
            </x-slot>
            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>
                <x-button.primary type="submit">Guardar</x-button.secondary>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>