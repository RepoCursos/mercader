@extends('layouts.app')
@section('title', 'Category')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <div class="navbar" >
                    <div class="container-fluid">
                        <h1 class="mt-3 mb-3 fs-4">{{ __('section') . " " . __('Categoria') }}</h1>
                        <form method="GET" class="d-flex" role="search">
                            @csrf
                          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                      </div>
                </div>
                
                <a href="{{ route('categoria.create') }}" class="btn btn-success">{{ __('create') . " " . __('Categoria') }}</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SLUG</th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $i => $categoria)
                            <tr>
                                <!-- esta variable $i que utilizo es para que muestre el valor de la interacion y no el ID -->
                                <th>{{ $i + 1 }}</th>
                                <td>{{ $categoria->slug }}</td>
                                <td>{{ $categoria->name }}</td>
                                <td>
                                    <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary">{{ __('edit') }}</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('categoria.destroy', $categoria->id) }}">
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
        {{ $categorias->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
