<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$airport->denominacion}}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="p-4" style="height: 500px;">
            {!! Mapper::render() !!}
        </div>
        <div class="p-4 space-y-4">
            <span class="text-2xl text-gray-800 block">METAR</span>
            @forelse($metar['data'] as $key => $value)

            <span class="text-blue-700 block">{{$value['station']['name']}}</span>
            <span class="text-gray-600 block">{{$value['raw_text']}}</span>

            @empty

            Sin METAR

            @endforelse
        </div>
        <div class="p-4 space-y-4">
            <span class="text-2xl text-gray-800 block">TAF</span>
            @forelse($taf['data'] as $key => $value)

            <span class="text-blue-700 block">{{$value['station']['name']}}</span>
            <span class="text-gray-600 block">{{$value['raw_text']}}</span>

            @empty

            Sin METAR

            @endforelse
        </div>
    </div>


</x-app-layout>