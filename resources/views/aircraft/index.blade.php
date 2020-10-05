<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Aeronaves
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach($aircraft as $item)
                <a href="{{ route('aircraft.show',['aircraft'=>$item])}}">
                <div class="bg-white p-4 border-gray-400 shadow-md rounded-lg">
                    <x-jet-section-title>
                        <x-slot name="title">{{$item->manufacturer}} {{$item->model}}</x-slot>
                        <x-slot name="description">
                            <div>{{$item->registration}}</div>
                            <div class="flex flex-col text-sm text-gray-600">
                                <div>Desgindador: {{$item->type_designator}}</div>
                                <div>Tipo de motor: {{$item->engine_type}}</div>
                                <div>Cantidad de motores: {{$item->engine_count}}</div>
                                <div>Tipo de Estela turbulenta: {{$item->WTC}}</div>
                            </div>
                        </x-slot>
                        
                    </x-jet-section-title>
                </div>
                </a>
                @endforeach

                <a href="{{ route('aircraft.create')}}">
                <div class="bg-white p-4 border-gray-400 shadow-md rounded-lg">
                    <x-jet-section-title>
                        <x-slot name="title">Crear nueva aeronave</x-slot>
                        <x-slot name="description">
                            <div class="text-gray-600 text-sm">
                                Si estas volando en un aeronave nueva, puedes registrarla.
                            </div>
                        </x-slot>
                        
                    </x-jet-section-title>
                </div>
                </a>

                {{$aircraft->links()}}
            </div>
        </div>
    </div>
</x-app-layout>