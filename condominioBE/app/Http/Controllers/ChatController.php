<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Notificacion;
use App\Events\NuevoMensaje;
use App\Events\NotificacionNueva;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Handle incoming chat message and optionally send a notification.
     */
    public function enviar(Request $request)
    {
        // create the chat message (detalle de departamento/ mensaje según migración)
        $mensaje = Mensaje::create([
            'departamento' => $request->input('departamento'),
            'mensaje' => $request->input('mensaje'),
        ]);

        // broadcast the new message event
        broadcast(new NuevoMensaje($mensaje));

        // if notification data is provided, persist and broadcast it
        if ($request->has('usuario_destino') && $request->has('conversacion_id')) {
            $notificacion = Notificacion::create([
                'usuario_id' => $request->input('usuario_destino'),
                'tipo' => 'mensaje',
                'titulo' => 'Nuevo mensaje',
                'mensaje' => 'Tienes un nuevo mensaje',
                'url' => '/chat/'.$request->input('conversacion_id'),
            ]);

            broadcast(new NotificacionNueva($notificacion));
        }

        return response()->json($mensaje);
    }
}
