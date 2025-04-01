<?php

namespace App\Console;

use App\Events\EnvioReporteEvent;
use App\Exports\ProductosExport;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Maatwebsite\Excel\Facades\Excel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        /**
         * llamamos al comando "PdfAutomaticoCommand" para que ejecute la funcion de generar y guardar el reporte 
         * en la carpeta "storage/pdfs"
         */
        $schedule->command('generate:report_productopdf');

        /**
         * Ejecutamos la funcion de llamada (call) para que ejecute la llamada a la funcion de exportacion del reporte
         * Excel e indicamos que lo guarde, esto se guarda en la carpeta "storage"
         * indicamos para que lo guarde en la variable $reporte para envia el mensaje al oyente que ya se guardo el PDF
         */
        $schedule->call(function() {
           $reporte = Excel::store(new ProductosExport, 'reporte.csv');
            EnvioReporteEvent::dispatch($reporte); 
        })->timezone('America/Montevideo')->cron('15 16 * * *'); // Ejecute la tarea en un horario de cron personalizado
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
