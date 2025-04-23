<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        // Envie o email (configurar mail no .env)
        Mail::send('emails.contact', $data, function($message) {
            $message->to('seuemail@dominio.com', 'Loja Geek')
                    ->subject('Mensagem de Contato');
        });

        return redirect()->route('contact.index')->with('status', 'Mensagem enviada com sucesso!');
    }
}