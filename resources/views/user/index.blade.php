<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th> --}}
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modulo
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Submodulo</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Rol
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($usuarios as $usuario)
                        @foreach ($usuario->roleSubmodulos as $urs)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $urs->roleSubmodulo->submodulo->modulo->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $urs->roleSubmodulo->submodulo->nombre }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $urs->roleSubmodulo->role->name }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $usuario) }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                    {{--                     @foreach ($user as $usuario)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                                <a href="{{ route('user.show', $usuario->id) }}" class="inline-flex items-center px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 text-sm">Ver</a>
                                <a href="{{ route('user.edit', $usuario->id) }}" class="inline-flex items-center px-3 py-1 rounded bg-yellow-400 text-white hover:bg-yellow-500 text-sm">Editar</a>
                                <form action="{{ route('user.destroy', $usuario->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 rounded bg-red-600 text-white hover:bg-red-700 text-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
