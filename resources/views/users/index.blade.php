<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Usuarios') }}
            </h2>
            <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Nuevo usuario') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 rounded-md bg-red-50 p-4 text-sm text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($users->isEmpty())
                        <p class="text-gray-500">{{ __('No hay usuarios registrados.') }}</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left table-auto">
                                <thead>
                                    <tr class="border-b border-gray-200 bg-gray-50">
                                        <th class="px-4 py-3 text-sm font-semibold text-gray-700">#</th>
                                        <th class="px-4 py-3 text-sm font-semibold text-gray-700">{{ __('Nombre') }}</th>
                                        <th class="px-4 py-3 text-sm font-semibold text-gray-700">{{ __('Email') }}</th>
                                        <th class="px-4 py-3 text-sm font-semibold text-gray-700">{{ __('Registrado') }}</th>
                                        <th class="px-4 py-3 text-sm font-semibold text-gray-700">{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                                            <td class="px-4 py-3">{{ $user->id }}</td>
                                            <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                                            <td class="px-4 py-3">{{ $user->email }}</td>
                                            <td class="px-4 py-3">{{ $user->created_at->format('d/m/Y') }}</td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">{{ __('Editar') }}</a>
                                                    @if ($user->id !== Auth::id())
                                                        <form method="post" action="{{ route('users.destroy', $user) }}" class="inline" onsubmit="return confirm('{{ __('¿Eliminar este usuario?') }}');">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">{{ __('Eliminar') }}</button>
                                                        </form>
                                                    @else
                                                        <span class="text-gray-400 text-sm">{{ __('(tú)') }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
