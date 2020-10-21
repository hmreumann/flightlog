<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$airport->denominacion}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto h-screen sm:px-6 lg:px-8">
            {!! Mapper::render() !!}
        </div>
    </div>
</x-app-layout>