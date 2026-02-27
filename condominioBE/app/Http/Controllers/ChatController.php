<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Events\NuevoMensaje;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function enviar(Request $request)
    {
        $mensaje = Mensaje::create([
            'departamento' => $request->departamento,
            'mensaje' => $request->mensaje,
        ]);

        broadcast(new NuevoMensaje($mensaje))->toOthers();

        return response()->json($mensaje);
    }
}
