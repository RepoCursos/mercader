<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    public function index(): View
    {
        $productos = Producto::query()->when(request('search'), function ($query) {
            return $query->where('name', 'LIKE', '%' . request('search') . '%')
                ->orWhereHas('categoria', function ($q) {
                    $q->where('name', 'LIKE', '%' . request('search') . '%');
                });
        })->paginate(5)->withQueryString();

        return view('producto.index', compact('productos'));
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('name')->get();
        return view('producto.create', compact('categorias'));
    }

    public function store(ProductoRequest $request): RedirectResponse
    {
        $producto = Producto::create($request->all());

        if ($request->hasFile('urlfoto')) {
            $fileName = $producto->id . "-" . time() . "." . $request->file('urlfoto')->extension();
            $request->file('urlfoto')->storeAs('public/images', $fileName);
            $producto->urlfoto = $fileName;
            $producto->save();
        }

        return redirect()->route('producto.index')->with('success', 'Producto creado');
    }

    public function edit(Producto $producto): View
    {
        $categorias = Categoria::orderBy('name')->get();
        return view('producto.edit', compact('producto'), compact('categorias'));
    }

    public function update(RedirectResponse $request, Producto $producto): RedirectResponse
    {
        if ($request->hasFile('urlfoto')) {
            $uri = 'public/images' . $producto->urlfoto;
            Storage::delete($uri);
            $fileName = $producto->id . "-" . time() . "." . $request->file('urlfoto')->extension();
            $request->file('urlfoto')->storeAs('public/images', $fileName);
            $producto->urlfoto = $fileName;
            $producto->save();
        }

        $producto->update($request->input());
        return redirect()->route('producto.index')->with('success', 'Producto actualizado');
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        $uri = 'public/images' . $producto->urlfoto;
        Storage::delete($uri);
        $producto->delete();
        return redirect()->route('producto.index')->with('danger', 'Producto Eliminado');
    }

    public function download()
    {
        $productos = Producto::all();

        $logo = '/img/logo.jpeg';

        /** guardamos en la variabel la ubicacion de nuestra vista */
        $pdf = Pdf::loadView('pdf.example', compact('productos', 'logo'));
        /** descargamos y le asignamos un nombre  */
        return $pdf->download('nombre-archivo.pdf');
    }
}
