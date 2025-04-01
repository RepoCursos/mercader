@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <!-- Para llamar y pintar la vista del componente le indicamos en donde se encuentra -->
    <!-- ubicacion del componente -->
    @component('categoria._components.form')
        <!-- en este slot llamamos a la variable $title para idicarle que mostrar -->
        @slot('title')
        {{ __('section') . " " . __('categoria')  }}
        @endslot
        <!-- llamamos al slot action para indicar su configuracion -->
        @slot('action')
            action="{{ route('categoria.update', $categoria->id) }}"
        @endslot
        <!-- indicamos el method cual va a ser su valor a modificar -->
        @slot('method')
            @method('PUT')
        @endslot
        <!-- llamamos al metodo old para que no borre todo lo escrito si da un error en el completado del 
            formulario-->
        @slot('slug')
            @isset($categoria)
                value="{{ old('slug', $categoria->slug) }}"
            @endisset
        @endslot
        <!-- llamamos al metodo old para que no borre todo lo escrito si da un error en el completado del 
            formulario-->
        @slot('name')
            @isset($categoria)
                value="{{ old('name', $categoria->name) }}"
            @endisset
        @endslot
    @endcomponent

@endsection
