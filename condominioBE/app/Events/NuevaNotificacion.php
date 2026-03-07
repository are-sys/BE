<?php

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NuevaNotificacion implements ShouldBroadcast
{
    public $notificacion;

    public function __construct($notificacion)
    {
        $this->notificacion = $notificacion;
    }

    public function broadcastOn()
    {
        return new Channel('departamento.' . $this->notificacion->departamento_id);
    }
}
