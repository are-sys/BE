<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NuevoMensaje implements ShouldBroadcast
{
    public $mensaje;

    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function broadcastOn()
    {
        return new Channel('chat-general');
    }
}