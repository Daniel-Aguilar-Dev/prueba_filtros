<?php

namespace App\Http\Controllers\sistema\general;

use App\Http\Controllers\Controller;
use App\Models\Sistema\General\RoleSubmodulo;
use App\Models\Sistema\General\UserRoleSubmodulo;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = User::with([
            'roleSubmodulos.roleSubmodulo.role',
            'roleSubmodulos.roleSubmodulo.submodulo.modulo'
        ])->get();
        return view('user.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Obtener todos los submódulos con su módulo
        $submodulos = \App\Models\Sistema\General\Submodulo::with('modulo')->get();

        // Obtener todos los roles
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles', 'submodulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'submodulo_id' => 'required|exists:submodulos,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Buscar o crear el role_submodulo
        $roleSubmodulo = RoleSubmodulo::firstOrCreate([
            'role_id' => $request->role_id,
            'submodulo_id' => $request->submodulo_id,
        ]);

        // Actualizar el registro del usuario (puedes decidir si reemplazas o agregas)
        UserRoleSubmodulo::updateOrCreate(
            ['user_id' => $user->id, 'role_submodulo_id' => $roleSubmodulo->id],
            ['user_id' => $user->id, 'role_submodulo_id' => $roleSubmodulo->id]
        );

        return redirect()->route('user.index')->with('success', 'Rol asignado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
