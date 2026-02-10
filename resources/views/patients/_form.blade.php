@props(['patient' => null])

<div class="space-y-6">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $patient?->nombre)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" name="apellidos" type="text" class="mt-1 block w-full" :value="old('apellidos', $patient?->apellidos)" required />
            <x-input-error class="mt-2" :messages="$errors->get('apellidos')" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="tipo_documento" :value="__('Tipo de documento')" />
            <select id="tipo_documento" name="tipo_documento" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">{{ __('Seleccione') }}</option>
                <option value="DNI" @selected(old('tipo_documento', $patient?->tipo_documento) == 'DNI')>DNI</option>
                <option value="Pasaporte" @selected(old('tipo_documento', $patient?->tipo_documento) == 'Pasaporte')>Pasaporte</option>
                <option value="CE" @selected(old('tipo_documento', $patient?->tipo_documento) == 'CE')>CE</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('tipo_documento')" />
        </div>
        <div>
            <x-input-label for="numero_documento" :value="__('Número de documento')" />
            <x-text-input id="numero_documento" name="numero_documento" type="text" class="mt-1 block w-full" :value="old('numero_documento', $patient?->numero_documento)" />
            <x-input-error class="mt-2" :messages="$errors->get('numero_documento')" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="mt-1 block w-full" :value="old('fecha_nacimiento', $patient?->fecha_nacimiento?->format('Y-m-d'))" />
            <x-input-error class="mt-2" :messages="$errors->get('fecha_nacimiento')" />
        </div>
        <div>
            <x-input-label for="sexo" :value="__('Sexo')" />
            <select id="sexo" name="sexo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">{{ __('Seleccione') }}</option>
                <option value="Femenino" @selected(old('sexo', $patient?->sexo) == 'Femenino')>Femenino</option>
                <option value="Masculino" @selected(old('sexo', $patient?->sexo) == 'Masculino')>Masculino</option>
                <option value="Otro" @selected(old('sexo', $patient?->sexo) == 'Otro')>Otro</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $patient?->telefono)" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $patient?->email)" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    </div>

    <div>
        <x-input-label for="direccion" :value="__('Dirección')" />
        <textarea id="direccion" name="direccion" rows="2" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('direccion', $patient?->direccion) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
    </div>

    <div>
        <x-input-label for="notas" :value="__('Notas')" />
        <textarea id="notas" name="notas" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('notas', $patient?->notas) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('notas')" />
    </div>
</div>
