<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold text-dark">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Modulo</th>
                                <th>Submodulo</th>
                                <th>Rol</th>
                                <th class="text-center">Permiso</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Aquí van los datos cuando estén listos --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Agrega esto en el <head> de tu layout base -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</x-app-layout>
