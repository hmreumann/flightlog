<div class="p-4">
    <div class="flex-col space-y-4">
        <div>
            <x-jet-input wire:model="search" class="w-1/4" placeholder="Buscar Aeropuerto..." />
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('local')">Local</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('denominacion')">Denominación</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('tipo')">Tipo</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('coordenadas')">Coordenadas</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('elev')">Elevación (Mts)</x-table.heading>
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
</div>