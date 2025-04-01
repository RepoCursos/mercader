@extends('layouts.app')
@section('title', 'Product')

@section('content')
    @component('producto._components.form')
        @slot('title') 
            {{ __('section') . " " . __('Producto') }}
        @endslot

        @slot('action')
            action="{{ route('producto.store') }}"
        @endslot

        @slot('method')

        @slot('photo')
        <input type="file" name="urlfoto" class="form-control" placeholder="File" required>
        @endslot

        @slot('name')
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @endslot

        @slot('price')
        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
        @endslot

        @slot('stock')
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">
        @endslot

        @slot('categoria')
        <option value="" selected disabled>{{ __('Selected Category') }}</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
        @endforeach
        @endslot
    @endcomponent
@endsection
