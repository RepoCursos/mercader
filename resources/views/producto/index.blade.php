@extends('layouts.app')
@section('title', 'Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- la directiva blade __('') se usa para traducir los textos de la aplicacion, como se puede ver
                    el el directorio lang tenemos 3 directorios mas, esto pertenece a cada lenguaje, hemos agregado el archivo
                    views.php para indicar las traduccionse de nuestros formularios y demas textos de nuestras vistas
                    ver video: https://www.youtube.com/watch?v=dPuP30gGtlk&list=PLDllzmccetSM50U0Y9fTOWHvSzAZ_W6Il&index=15 -->
                <div class="navbar" >
                    <div class="container-fluid">
                        <h1 class="navbar-brand">{{ __('Section') . ' ' . __('Producto') }}</h1>
                        <form method="GET" class="d-flex" role="search">
                            @csrf
                          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                      </div>
                </div>

                <!-- formulario para importar el archivo csv -->
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-auto">
                        <input type="file" class="form-control" name="document_csv">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Importar CSV</button>
                    </div>
                </form>

                <a href="{{ route('producto.create') }}"
                    class="btn btn-success">{{ __('create') . ' ' . __('Producto') }}</a>
                <a href="{{ route('producto.download') }}" class="btn btn-success">{{ __('Download PDF') }}</a>
                <a href="{{ route('export') }}" class="btn btn-success">{{ __('Download CSV') }}</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('photo') }}</th>
                            <th scope="col">{{ __('name') }}</th>
                            <th scope="col">{{ __('price') }}</th>
                            <th scope="col">{{ __('stock') }}</th>
                            <th scope="col">{{ __('category') }}</th>
                            <th scope="col">{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $i => $producto)
                            <tr>
                                <th>{{ $i + 1 }}</th>
                                <!-- para acceder a las imagenes tenemos que acceder a la ruta atravez de la directiva asset() -->
                                <td scope="row"><img src="{{ asset('storage/images/' . $producto->urlfoto) }}"
                                        alt="" width="65"></td>
                                <td>{{ $producto->name }}</td>
                                <td>{{ $producto->price }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->categoria->name }}</td>
                                <td>
                                    <a href="{{ route('producto.edit', $producto->id) }}"
                                        class="btn btn-primary">{{ __('edit') }}</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('producto.destroy', $producto->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="{{ __('delete') }}" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">{{ __('no_data') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $productos->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
