<?php

namespace App\Models\Sistema\General;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sistema\General\Modulo;
class Submodulo extends Model
{
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'name', 'estado', 'modulo_id'
    ];

    // un submodulo pertenece a un modulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
