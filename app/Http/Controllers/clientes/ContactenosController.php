<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Flash;

class ContactenosController extends Controller
{
    public function index()
    {
        $idUsuario = auth()->user()->id;

        $usuarios = User::select('nombres', 'apellidos', 'email', 'direccion', 'celular')
            ->where('id', '=', $idUsuario)
            ->get();

        foreach ($usuarios as $usuario) {
            if (($usuario->nombres == null) || ($usuario->apellidos == null) || ($usuario->email == null) || ($usuario->direccion == null) || ($usuario->celular == null)) {

                $message = 'Debes diligenciar los datos de "Información del perfil", para hacer uso del formulario contactenos';

                return redirect()->back()->with('message', $message);
            }
        }

        return view('clientes.contactenos', compact('usuarios', 'idUsuario'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'email'  =>  'required|email',
                'asunto' =>  'required',
                'comentario' => 'required'
               ]);

           $correo = new ContactanosMailable($request->email, $request->asunto, $request->comentario);
           Mail::to('ecocarwashprueba@gmail.com')->send($correo);
           $message = 'Enviado exitosamente';

           return redirect()->route('contactenos.index')->with('message', $message);

        // $email = $request->email;
        // $asunto = $request->asunto;
        // $comentario = $request->comentario;
        // $body = "Email: " . $email .  "  Comentario: " . $comentario;

        // ini_set('display_errors', 1);
        // error_reporting(E_ALL);
        // $from = "hostingautosleo@gmail.com";
        // $to = "hostingautosleo@gmail.com";
        // $subject = $asunto;
        // $message = $body;
        // $headers = "From:" . $from;

        // if (mail($to, $subject, $message, $headers)) {
        //     $message = 'Enviado exitosamente.';
        //     return redirect()->route('contactenos.index')->with('message', $message);
        // } else {
        //     $message = 'No se logró enviar el mensaje, intentelo de nuevo.';
        //     return redirect()->route('contactenos.index')->with('message', $message);
        // }
    }
}
