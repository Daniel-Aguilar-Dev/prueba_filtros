<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <h4>Asignar Rol a Submódulo</h4>

            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf   
                @method('PUT')

                <div class="mb-3">
                    <label for="submodulo_id" class="form-label">Módulo - Submódulo</label>
                    <select name="submodulo_id" id="submodulo_id" class="form-select" required>
                        @foreach ($submodulos as $sub)
                            <option value="{{ $sub->id }}">
                                {{ $sub->modulo->nombre }} - {{ $sub->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role_id" class="form-label">Rol</label>
                    <select name="role_id" id="role_id" class="form-select" required>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Asignar</button>
            </form>
        </div>
    </div>

</x-app-layout>
