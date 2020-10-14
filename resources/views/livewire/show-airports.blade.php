<div class="p-4">
    <div class="flex-col space-y-4">
        <div class="flex justify-between">
            <div class="w-1/4">
                <x-jet-input wire:model="search" placeholder="Buscar Aeropuerto..." />
            </div>
            <div>
                <x-button.primary type="button" wire:click="create"><x-icon.plus /> Nuevo</x-button.primary>
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('local')" :direction="$sortField === 'local' ? $sortDirection : null">Local</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('denominacion')" :direction="$sortField === 'denominacion' ? $sortDirection : null" class="w-full">Denominación</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('tipo')" :direction="$sortField === 'tipo' ? $sortDirection : null">Tipo</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('coordenadas')" :direction="$sortField === 'coordenadas' ? $sortDirection : null">Coordenadas</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('elev')" :direction="$sortField === 'elev' ? $sortDirection : null">Elevación (Mts)</x-table.heading>
                <x-table.heading></x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse($airports as $airport)
                <x-table.row wire:loading.class="opacity-75">
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

                    <x-table.cell wire:click="edit({{ $airport->id }})">
                        <x-button.link>Edit</x-button.link>
                    </x-table.cell>

                </x-table.row>
                @empty
                <x-table.row>
                    <x-table.cell colspan="5" class="text-center">
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