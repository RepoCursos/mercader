@extends('layouts.app')
@section('title', 'Mail')

<!-- Este index es la plantilla creada para simular como si fuerea una casilla de correos integrada a nuestro sistema
 cabe aclarar que es muy dificiel que alguien quiera implementar esta plantilla devido a que no se reciven mails y no hay
 seguimiento del mismo, pero se deja ya algo armado para saber como se puede codificar. 
 Este ejemplo usa como cuerpo del mensaje la plantilla exampleMail y controladores MailController y EnviarMail  -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1 class="mt-3 mb-3 fs-4">eMails</h1>
                <form method="POST" action="{{ route('mail.send')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Asunto</label>
                        <input type="text" name="subject" class="form-control" id="subject">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenido</label>
                        <textarea class="form-control" name="content" id="textarea" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Archivo adjunto</label>
                        <input type="file" name="file" class="form-control" id="file">
                      </div>
                      
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary mb-3" id="Enviar" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
