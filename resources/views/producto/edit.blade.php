@extends('layouts.app')
@section('title', 'Product')

@section('content')
    @component('producto._components.form')
        @slot('title') 
        {{ __('section') . " " . __('Product') }}
        @endslot
        
        @slot('action')
        action="{{ route('producto.update', $producto->id) }}"
        @endslot

        @slot('method') @method('PUT') @endslot

        @slot('photo')
        <img src="{{ asset('storage/images/' . $producto->urlfoto) }}" alt="" width="65">
        <input type="file" name="urlfoto" class="form-control" value="{{ $producto->urlfoto }}">
        @endslot

        @slot('name')
        <input type="text" name="name" class="form-control" value="{{ old('name', $producto->name) }}">
        @endslot

        @slot('price')
        <input type="text" name="price" class="form-control" value="{{ old('price', $producto->price) }}">
        @endslot

        @slot('stock')
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}">
        @endslot

        @slot('categoria')
        <option value="{{ $producto->categoria->id }}" selected>{{ $producto->categoria->name }}</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
        @endforeach
        @endslot
    @endcomponent
@endsection
