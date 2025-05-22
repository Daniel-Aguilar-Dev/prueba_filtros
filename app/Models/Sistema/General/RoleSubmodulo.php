<?php

namespace App\Models\Sistema\General;

use App\Models\Sistema\General\Submodulo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSubmodulo extends Model
{
    protected $fillable = ['role_id', 'submodulo_id'];

    //relacion a tabla rol
    public function role()
    {
        return $this->belongsTo( Role::class);
    }
    //relacion a tabla submodulo
    public function submodulo()
    {
        return $this->belongsTo(Submodulo::class);
    }
    //relacion a tabla role_submodulo_permission
    // un rol de submodulo puede tener muchos permisos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_submodulo_permission');
    }
}