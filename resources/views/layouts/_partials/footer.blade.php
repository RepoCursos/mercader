<!-- este footer es un parcial el cual sera llamado desde app "base", es porque app puede llamarlo con el @-include() 
    para que se refleje en las vistas.
  Si obserbamos tanto el menu como este footer no son ni extendidos "@-extends('')" ni tampoco 
  son llamados "@-section('') dado a que no se van a modificar o ocultar, sino que siempre van a estar a la vista -->
<div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{ __('Home')}}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{ __('Features')}}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{ __('Pricing')}}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">{{ __('About')}}</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2024 {{ __('Company')}}, Inc</p>
    </footer>
  </div>