<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\Channel;

class NombreDelCanal
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function broadcastOn()
{
    return new Channel('nombre-del-canal');
}

public function broadcastAs()
{
    return 'evento-a-transmitir';
}

}
