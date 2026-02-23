<header class="header sticky-top border-bottom mb-4" role="banner">
  <nav class="navbar navbar-expand-lg container" aria-label="Navegación principal" itemscope itemtype="https://schema.org/SiteNavigationElement">

    {{-- Logo / regreso --}}
    <a class="navbar-brand me-auto icon_regreso" href="{{ route('pagina.inicio') }}" aria-label="Volver a inicio" itemprop="url">
      <i class="bi bi-caret-left" aria-hidden="true"></i>
      <span class="visually-hidden">Inicio</span>
    </a>

    <a class="navbar-brand me-auto" href="{{ route('pagina.inicio') }}" aria-label="Imaginarte 3D - Inicio" itemprop="url">
      <img src="{{ asset('pagina/cropped-new-log.png') }}" alt="Imaginarte 3D" height="40" loading="eager" fetchpriority="high">
    </a>

    {{-- Toggle --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar" aria-controls="mainNavbar"
            aria-expanded="false" aria-label="Abrir menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Menú --}}
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto" role="list">
        <li class="nav-item">
          <a class="nav-link text-white @if(request()->routeIs('pagina.inicio')) active @endif"
             href="{{ route('pagina.inicio') }}" itemprop="url">
            <span itemprop="name">Inicio</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="productosDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            Productos
          </a>

          <ul class="dropdown-menu" aria-labelledby="productosDropdown">
            <li><a class="dropdown-item" href="{{ route('pagina.letras3d') }}" itemprop="url"><span itemprop="name">Letras 3D</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.impresion_digital') }}" itemprop="url"><span itemprop="name">Impresión digital</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.letreros_neon') }}" itemprop="url"><span itemprop="name">Neón</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.anuncios_luminosos') }}" itemprop="url"><span itemprop="name">Anuncios luminosos</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.promocionales') }}" itemprop="url"><span itemprop="name">Promocionales</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.señaletica') }}" itemprop="url"><span itemprop="name">Señalética</span></a></li>
            <li><a class="dropdown-item" href="{{ route('pagina.vinil') }}" itemprop="url"><span itemprop="name">Vinilo</span></a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('pagina.inicio') }}#nosotros" itemprop="url">
            <span itemprop="name">Nosotros</span>
          </a>
        </li>

        <li class="nav-item">
          <a type="button" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-label="Abrir preguntas frecuentes">
            FAQS
          </a>
        </li>

        <li class="nav-item my-auto">
          <a href="https://wa.link/cprewb" class="btn_accion text-center mt-3 mx-auto" target="_blank" rel="noopener">
            Contacto
          </a>
        </li>
      </ul>
    </div>
  </nav>

  {{-- JSON-LD: ayuda a que Google entienda el menú aunque haya dropdown --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SiteNavigationElement",
    "name": ["Inicio","Letras 3D","Impresión digital","Neón","Anuncios luminosos","Promocionales","Señalética","Vinilo","Nosotros"],
    "url": [
      "{{ route('pagina.inicio') }}",
      "{{ route('pagina.letras3d') }}",
      "{{ route('pagina.impresion_digital') }}",
      "{{ route('pagina.letreros_neon') }}",
      "{{ route('pagina.anuncios_luminosos') }}",
      "{{ route('pagina.promocionales') }}",
      "{{ route('pagina.señaletica') }}",
      "{{ route('pagina.vinil') }}",
      "{{ route('pagina.inicio') }}#nosotros"
    ]
  }
  </script>

    {{-- Navegación extra (no visual) para mejorar rastreo de links en dropdown --}}
    <nav class="visually-hidden" aria-label="Mapa de navegación">
    <a href="{{ route('pagina.inicio') }}">Inicio</a>
    <a href="{{ route('pagina.letras3d') }}">Letras 3D</a>
    <a href="{{ route('pagina.impresion_digital') }}">Impresión digital</a>
    <a href="{{ route('pagina.letreros_neon') }}">Neón</a>
    <a href="{{ route('pagina.anuncios_luminosos') }}">Anuncios luminosos</a>
    <a href="{{ route('pagina.promocionales') }}">Promocionales</a>
    <a href="{{ route('pagina.señaletica') }}">Señalética</a>
    <a href="{{ route('pagina.vinil') }}">Vinilo</a>
    <a href="{{ route('pagina.inicio') }}#nosotros">Nosotros</a>
    </nav>


</header>
