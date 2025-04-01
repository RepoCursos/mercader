<?php

namespace App\Console\Commands;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;

class PdfAutomaticoCommand extends Command
{

    /**
     * En signature indicamos el nombre de nuestro comando.
     *
     * @var string
     */
    protected $signature = 'generate:report_productopdf';

    /**
     * Indicamos una brebe descripcion de lo que hace el comando.
     *
     * @var string
     */
    protected $description = 'Este Command genera un listado de productos en PDF y lo guarda en el storage';

    /**
     * Codificamos la funcion handle que es lo que ejecutara, en este caso generar un PDF del listado de productos.
     */
    public function handle()
    {
        $productos = Producto::all();

        $logo = '/img/logo.jpeg';

        /** cargamos en la variabel la ubicacion de nuestra vista */
        $pdf = Pdf::loadView('pdf.example', compact('productos', 'logo'));

        // Guardar el PDF en la carpeta storage/app/pdfs
        $path = storage_path('app/pdfs/listado.pdf');
        $pdf->save($path);
    }
}
