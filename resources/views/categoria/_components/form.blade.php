<!-- ESTO ES UN COMPONENTE -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <!-- Forma de mostrar el error de forma general -->
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <!-- ************************************************************ -->

            <!-- A menudo necesitarás pasar contenido adicional a tu componente a través de "ranuras".
                Las ranuras de los componentes se representan haciendo eco de la variable $slot.
                En los slot se representan como el ejemplo $title -->
            <h2>{{ $title }}</h2>
            <form method="POST" {{ $action }}>
                {{ $method }}
                @csrf
                <div class="mb-3 row">
                    <label for="slug" class="col-sm-2 col-form-label">SLUG</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" {{ $slug }}>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('name') }}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" {{ $name }}>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                    <a href="{{ route('categoria.index') }}" class="btn btn-danger">{{ __('cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
