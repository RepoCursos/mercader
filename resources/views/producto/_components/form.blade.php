<!-- ESTO ES UN COMPONENTE -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <!-- Forma de mostrar el error de forma general, este codigo se puede mejorar mostrandolo en una alerta con sweetalert2 
                ver video: https://www.youtube.com/watch?v=D3Ww5FGa1mY&list=PLy8Qdj_a4vwEX2uci6HqFGI5rydtgPIgp&index=29 -->
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <!-- ************************************************************ -->
            <h2>{{ $title }}</h2>
            <form method="POST" {{ $action }} enctype="multipart/form-data">
                {{ $method }}
                @csrf
                <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label">{{ __('photo') }}</label>
                    <div class="col-sm-10">
                        {{ $photo }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('name') }}</label>
                    <div class="col-sm-10">
                        {{ $name }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">{{ __('price') }}</label>
                    <div class="col-sm-10">
                        {{ $price }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">{{ __('stock') }}</label>
                    <div class="col-sm-10">
                        {{ $stock }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="category_id" class="col-sm-2 col-form-label">{{ __('Categoria') }}</label>
                    <div class="col-sm-10">
                        <select name="categoria_id" id="" class="form-control">
                            {{ $categoria }}
                        </select>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                    <a href="{{ route('producto.index') }}" class="btn btn-danger">{{ __('cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
