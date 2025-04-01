<?php

namespace App\Imports;

use App\Models\Categoria;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductoImport implements ToModel, WithHeadingRow
{
    /** si en el archivo csv se ingresa el nombre y no el id se codifica este codigo, ver ej archivo "import.csv" */
    private $categorias;
    public function __construct()
    {
        $this->categorias = Categoria::pluck('id', 'name'); //pluck va a comparar el nombre con el id y verifica que este correcto
    }
    /** ------------------------------------------------------------------ */

    public function model(array $row)
    {
        return new Producto([
            'urlfoto' => $row['urlfoto'],
            'name' => $row['name'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'categoria_id' => $this->categorias[$row['categoria_id']], //Se indica esta codificacion

            /** si en el archivo csv se ingresa el numero de id se deja este codigo, ver ej archivo "import_2.csv" */
            // 'categoria_id' => $row['categoria_id'],
        ]);
    }
}
