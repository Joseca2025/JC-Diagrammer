<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;
class ChatController extends Controller
{
    //
    public function sendMessage(Request $request) {
        // Validar y procesar el mensaje
        $message = $request->input('message');

        // Guarda el mensaje en tu base de datos si es necesario

        // Emite un evento para notificar a los clientes
        event(new NewMessage($message));

        return response()->json(['success' => true]);
        
    }
}
