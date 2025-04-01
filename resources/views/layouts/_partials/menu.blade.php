<!-- este menu es un parcial el cual sera llamado desde app "base", es porque app puede llamarlo con el @-include() 
    para que se refleje en las vistas -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('Home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mail.index') }}">{{ __('Mail')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('producto.index') }}">{{ __('Product')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categoria.index') }}">{{ __('Category')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
