<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::query()->when(request('search'), function ($query) {
            return $query->where('slug', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('name', 'LIKE', '%' . request('search') . '%');
        })->paginate(5)->withQueryString();

        return view('categoria.index', compact('categorias'));
    }

    public function create(): View
    {
        return View('categoria.create');
    }

    public function store(CategoriaRequest $request): RedirectResponse
    {
        Categoria::create($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoria creada');
    }

    public function edit(Categoria $categoria): View
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoria actualizada');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        $categoria->delete();
        return redirect()->route('categoria.index')->with('danger', 'Categoria eliminada');
    }
}
