<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notificacion;
use App\Events\NuevaNotificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
   public function listar()
    {
        return Notificacion::where('usuario_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function marcarLeida($id)
    {
        $noti = Notificacion::findOrFail($id);
        $noti->leida = true;
        $noti->save();

        return response()->json($noti);
    }
    
}
