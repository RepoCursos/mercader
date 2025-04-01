<?php

/** 
 * Si necesitas exportar solo algunas columnas en el archivo Excel en lugar de todas, puedes ajustar la consulta en tu clase de exportación 
 * para seleccionar solo las columnas deseadas.
 * 1- Ajusta la Consulta en la "function collection()".
 * 2- Agrega la "function headings()".
 * 3- Agrega la "function map($variable)" con una variable.
 * 
 * Explicación de los Métodos
 * collection(): Aquí defines la consulta para seleccionar solo las columnas que quieres exportar (id, name, email en este caso).
 * headings(): Define los encabezados de las columnas en el archivo Excel.
 * map($variable): Este método mapea cada fila de datos a las columnas exportadas. 
 *   Esto es útil si necesitas realizar algún tipo de transformación en los datos antes de exportarlos.
*/

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductosExport implements FromCollection, WithHeadings, WithMapping
{

    public function collection()
    {   
        /** Modificamos de "all" por "select" e indicamos que columnas necesitamos */
        return Producto::select('id', 'name', 'price', 'stock', 'categoria_id')->get();
    }
        
    /** agregamos la funcion "headings" donde indicamos en un arreglo como se como se van al llamar las cabeceras */
    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'PRICE',
            'STOCK',
            'CATEGORIA'
        ];
    }

    /** agregamos la funcion "map" con una variable ($variable) con la cual vamos a obtener de la base de datos, 
     *  los datos de las columnas que indiquemos  */
    public function map($producto): array
    {

        return [
            $producto->id,
            $producto->name,
            $producto->price,
            $producto->stock,
            $producto->categoria->name
        ];
    }
}
