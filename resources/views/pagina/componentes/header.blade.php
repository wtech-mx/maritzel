<header class="header sticky-top border-bottom mb-4">
  <nav class="navbar navbar-expand-lg container">
    <!-- Logo a la izquierda -->
    <a class="navbar-brand me-auto" href="{{ route('pagina.inicio') }}">
      <img src="{{ asset('pagina/cropped-new-log.png') }}" alt="Logo" height="40">
    </a>

    <!-- Botón hamburguesa: aparece <lg -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar" aria-controls="mainNavbar"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú colapsable -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white @if(request()->routeIs('pagina.inicio')) active @endif"
             href="{{ route('pagina.inicio') }}">
            Inicio
          </a>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link text-white dropdown-toggle" href="#" id="productosDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="productosDropdown">
            <li><a class="dropdown-item" href="{{ route('pagina.letras3d') }}">Letras 3D</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.impresion_digital') }}">Impresión digital</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.letreros_neon') }}">Neón</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.anuncios_luminosos') }}">Anuncios luminosos</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.promocionales') }}">Promocionales</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.señaletica') }}">Señalética</a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.vinil') }}">Vinilo</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="#">Nosotros</a>
        </li>

        <li class="nav-item">
          <a type="button" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
          FAQS
          </a>
        </li>

        <li class="nav-item my-auto">
            <a href="" class="btn_accion text-center mt-3 mx-auto">Contacto</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
