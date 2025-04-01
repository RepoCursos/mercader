<?php

namespace App\Listeners;

use App\Events\EnvioReporteEvent;
use App\Mail\ReporteMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailReporteListener
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Una ves que recivimos el aviso del evento ejecutamos la funcion.
     */
    public function handle(EnvioReporteEvent $event): void
    {
        Mail::to('pfernandez1626@gmail.com')->send(new ReporteMail('Paulo'));
    }
}
