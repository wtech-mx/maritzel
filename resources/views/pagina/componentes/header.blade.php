
    <header class="header container-fluid  py-3 mb-4 border-bottom sticky-top">
        <div class="row container mx-auto">
            <div class="col-12">
                <div class="container d-flex flex-wrap justify-content-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img class="img_logo_footer " src="{{ asset(path: 'pagina/cropped-new-log.png')}}" alt="">
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="{{ route('pagina.inicio') }}" class="nav-link active" aria-current="page">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pagina.letras3d') }}">Letras 3d</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.impresion_digital') }}">Impresión digital a gran formato</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.letreros_neon') }}">Letreros en Neón</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.anuncios_luminosos') }}">Anuncios luminosos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.promocionales') }}">Promocionales</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.señaletica') }}">Señalética Creativa</a></li>
                            <li><a class="dropdown-item" href="{{ route('pagina.vinil') }}">Vinilo Decorativo</a></li>

                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Nosotros</a></li>
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        FAQS
                        </a>
                    </li>

                    <li class="nav-item my-auto">
                         <a href="" class="btn_accion text-center mt-3 mx-auto">Contacto</a>
                    </li>
                </ul>
                </div>

            </div>
        </div>

    </header>
