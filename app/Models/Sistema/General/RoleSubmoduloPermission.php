<?php

namespace App\Models\Sistema\General;

use App\Models\Sistema\General\RoleSubmodulo;
use Illuminate\Database\Eloquent\Model;


class RoleSubmoduloPermission extends Model
{
    protected $fillable = [
        'role_submodulo_id',
        'permission_id',
    ];

    // Relación con tabla role_submodulo
    public function roleSubmodulo()
    {
        return $this->belongsTo(RoleSubmodulo::class);
    }

    // Relación con tabla permission
    // un rol de submodulo puede tener muchos permisos
    public function permission()
    {
        return $this->belongsTo(\Spatie\Permission\Models\Permission::class);
    }
}