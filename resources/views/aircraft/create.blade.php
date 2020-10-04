<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Aeronaves
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form-section method="POST">

                <x-slot name="title">
                    Crear Nueva Aeronave
                </x-slot>

                <x-slot name="description">
                    Luego podrás registrar los vuelos que hayas realizado con esta aeronave.
                </x-slot>

                <x-slot name="form">

                </x-slot>

                <x-slot name="actions">

                    <x-jet-button>
                        {{ __('Crear') }}
                    </x-jet-button>
                </x-slot>

            </x-form-section>
        </div>
    </div>
</x-app-layout>