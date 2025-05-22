<?php

namespace App\Http\Controllers\sistema\general;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = DB::table('users as u')
        ->join('user_role_submodulo as urs', 'u.id', '=', 'urs.user_id')
        ->join('role_submodulo as rs', 'urs.role_submodulo_id', '=', 'rs.id')
        ->join('roles as r', 'rs.role_id', '=', 'r.id')
        ->join('submodulos as s', 'rs.submodulo_id', '=', 's.id')
        ->join('modulos as m', 's.modulo_id', '=', 'm.id')
        ->select(
            'u.id as user_id',
            'u.name as usuario',
            'm.nombre as modulo',
            's.nombre as submodulo',
            'r.name as rol'
        )
        ->orderBy('u.id')
        ->get();

        return view('sistema.general.users.index', compact('usuarios'));

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
