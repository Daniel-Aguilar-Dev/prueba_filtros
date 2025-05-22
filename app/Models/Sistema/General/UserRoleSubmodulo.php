<?php

namespace App\Models\Sistema\General;

use App\Models\Sistema\General\RoleSubmodulo;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRoleSubmodulo extends Model
{
    protected $fillable = ['user_id', 'role_submodulo_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roleSubmodulo()
    {
        return $this->belongsTo(RoleSubmodulo::class);
    }
}
