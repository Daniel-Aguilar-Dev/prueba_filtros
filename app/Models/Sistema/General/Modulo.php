<?php

namespace App\Models\Sistema\General;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sistema\General\Submodulo;
class Modulo extends Model
{
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'name', 'estado'
    ];
    // un modulo puede tener muchos submodulos
    public function submodulos()
    {
        return $this->hasMany(Submodulo::class);
    }
}
