<?php

namespace App\Http\Controllers;

use App\Mail\EnviarMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/** este controlador es el que envia mails usando interface web de la app */
class MailController extends Controller
{
    public function index(): View
    {
        /** desde el enlace Mails nos envia a la inteface del formulario para enviar mails */
        return view('emails.index');
    }

    public function send(Request $request)
    {
        /** recivimos en la variable $data un arreglo con los datos enviar como el asunto, contenido y adjunto*/
        $data = [
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'file' => $request->input('file') ?? ''
        ];

        /** controlamos si tenemos datos en el adjunto */
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('pdfs', $filename);
            $data['file'] = $filename;
        }

        /** con la funcion Mail enviamos el mail a la casilla de correo que se halla indicado en el input->email,
         *  la funcion send le da la orden a la clase "EnviarMail" configurada con la informacion que contenga 
         *  el arreglo de la variable "$data" 
         */
        Mail::to($request->input('email'))->send(new EnviarMail($data));
        return view('emails.index');
    }
}
