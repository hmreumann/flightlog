<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Aeronaves
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form-section method="POST" routename="aircraft.store">

                <x-slot name="title">
                    Crear Nueva Aeronave
                </x-slot>

                <x-slot name="description">
                    Luego podrás registrar los vuelos que hayas realizado con esta aeronave.
                </x-slot>

                <x-slot name="form">

                    <!-- manufacturer -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="manufacturer">Fabricante</x-jet-label>
                        <x-jet-input type="text" id="manufacturer" name="manufacturer" class="mt-1 block w-full" placeholder="Ej: Tecnam" value="{{old('manufacturer')}}" />
                        <x-jet-input-error for="manufacturer" class="mt-2"/>
                    </div>

                    <!-- model -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="model">Modelo</x-jet-label>
                        <x-jet-input type="text" id="model" name="model" class="mt-1 block w-full" placeholder="Ej: P2002" value="{{old('model')}}" />
                        <x-jet-input-error for="model" class="mt-2"/>
                    </div>

                    <!-- type_designator -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="type_designator" valu>Tipo</x-jet-label>
                        <x-jet-input type="text" id="type_designator" name="type_designator" class="mt-1 block w-full" placeholder="Ej: SIRA" value="{{old('type_designator')}}" />
                        <x-jet-input-error for="type_designator" class="mt-2"/>
                    </div>
                    
                    <!-- description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" valu>Descripción</x-jet-label>
                        <x-select class="mt-1 block w-full" name="description">
                            <option value=""></option>
                            <option value="LandPlane" {{old('description') == 'LandPlane' ? 'selected' : '' }}>LandPlane</option>
                            <option value="Amphibian"  {{old('description') == 'Amphibian' ? 'selected' : '' }}>Amphibian</option>
                            <option value="Gyrocopter"  {{old('description') == 'Gyrocopter' ? 'selected' : '' }}>Gyrocopter</option>
                            <option value="Helicopter"  {{old('description') == 'Helicopter' ? 'selected' : '' }}>Helicopter</option>
                            <option value="SeaPlane"  {{old('description') == 'SeaPlane' ? 'selected' : '' }}>SeaPlane</option>
                            <option value="Tiltrotor"  {{old('description') == 'Tiltrotor' ? 'selected' : '' }}>Tiltrotor</option>
                        </x-select>
                        <x-jet-input-error for="description" class="mt-2"/>
                    </div>
                    
                    <!-- engine_type -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="engine_type" valu>Tipo de Motor</x-jet-label>
                        <x-select class="mt-1 block w-full" name="engine_type">
                            <option value=""></option>
                            <option value="Electric" {{old('engine_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                            <option value="Jet"  {{old('engine_type') == 'Jet' ? 'selected' : '' }}>Jet</option>
                            <option value="Piston"  {{old('engine_type') == 'Piston' ? 'selected' : '' }}>Piston</option>
                            <option value="Rocket"  {{old('engine_type') == 'Rocket' ? 'selected' : '' }}>Rocket</option>
                            <option value="Turboprop/Turboshaft"  {{old('engine_type') == 'Turboprop/Turboshaft' ? 'selected' : '' }}>Turboprop/Turboshaft</option>
                        </x-select>
                        <x-jet-input-error for="engine_type" class="mt-2"/>
                        
                    </div>
                    
                    <!-- engine_count -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="engine_count" valu>Cantidad de Motores</x-jet-label>
                        <x-select class="mt-1 block w-full" name="engine_count">
                            <option value=""></option>
                            <option value="1" {{old('engine_count') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2"  {{old('engine_count') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3"  {{old('engine_count') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4"  {{old('engine_count') == '4' ? 'selected' : '' }}>4</option>
                            <option value="Mas"  {{old('engine_count') == 'Mas' ? 'selected' : '' }}>Mas</option>
                        </x-select>
                        <x-jet-input-error for="engine_count" class="mt-2"/>
                    </div>
                    
                    <!-- WTC -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="WTC" valu>Categoría de Estela Turbulenta</x-jet-label>
                        <x-select class="mt-1 block w-full" name="WTC">
                            <option value=""></option>
                            <option value="H" {{old('WTC') == 'H' ? 'selected' : '' }}>H</option>
                            <option value="L"  {{old('WTC') == 'L' ? 'selected' : '' }}>L</option>
                            <option value="L/M"  {{old('WTC') == 'L/M' ? 'selected' : '' }}>L/M</option>
                            <option value="M"  {{old('WTC') == 'M' ? 'selected' : '' }}>M</option>
                        </x-select>
                        <x-jet-input-error for="WTC" class="mt-2"/>
                    </div>

                    <!-- registration -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="registration">Matricula</x-jet-label>
                        <x-jet-input type="text" id="registration" name="registration" class="mt-1 block w-full" placeholder="Ej: LV-S050" value="{{old('registration')}}" />
                        <x-jet-input-error for="registration" class="mt-2"/>
                    </div>


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