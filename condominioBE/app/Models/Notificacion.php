<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
     protected $table = 'notificaciones';

    protected $fillable = [
        'usuario_id',
        'tipo',
        'titulo',
        'mensaje',
        'url',
        'leida'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
