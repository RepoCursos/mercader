<?php

namespace App\Http\Controllers;

use App\Exports\ProductosExport;
use App\Http\Requests\CsvProductoRequest;
use App\Imports\ProductoImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\TryCatch;

class CsvProductoController extends Controller
{
    public function import(CsvProductoRequest $request): RedirectResponse
    {
        
        try {
            $file = $request->file('document_csv'); /**  'document_csv' se encuentra en la vista producto.index en el input de tipo file */
            Excel::import(new ProductoImport, $file);
    
            return redirect()->route('producto.index')->with('success', 'El archivo es correcto');
        } catch(\Exception $e) {
            return redirect()->route('producto.index')->with('danger', 'El archivo no es correcto');
        }

    }

    public function export()
    {
       return Excel::download(new ProductosExport, 'produc.csv');
    }
}
