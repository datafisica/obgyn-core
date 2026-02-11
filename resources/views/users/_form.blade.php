@props(['user' => null])

<div class="space-y-6">
    <div>
        <x-input-label for="name" :value="__('Nombre')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user?->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user?->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div>
        <x-input-label for="password" :value="$user ? __('Nueva contraseña (dejar en blanco para no cambiar)') : __('Contraseña')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="{{ $user ? 'new-password' : 'new-password' }}" {{ $user ? '' : 'required' }} />
        <x-input-error class="mt-2" :messages="$errors->get('password')" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" {{ $user ? '' : 'required' }} />
        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
    </div>
</div>
