<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    // allow mass assignment
    protected $fillable = ['departamento', 'mensaje'];
}
