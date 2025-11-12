<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaginarte 3D - Personaliza tus Creaciones</title>
    <!-- Incluye Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración de la fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* Fondo claro para la página */
        }
        /* Colores personalizados para el logo */
        .logo-green {
            color: rgb(141, 255, 165); /* El verde personalizado */
        }
        /* Estilo para "Imaginarte" en blanco */
        .logo-imaginarte-white {
            color: white;
        }
        /* Estilo para los enlaces de navegación */
        .nav-link {
            /* Inherit text-lg from parent ul, add hover background and text color */
            @apply text-gray-300 hover:bg-purple-800 hover:text-white transition-all duration-300 ease-in-out font-semibold px-3 py-2 rounded-md whitespace-nowrap;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px; /* Underline thickness */
            background-color: white; /* Underline color */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
        }
        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        /* Estilos para el acordeón */
        .accordion-header {
            @apply flex justify-between items-center w-full py-4 px-6 text-left font-bold text-lg rounded-t-lg cursor-pointer transition-all duration-300;
            background-color: #ede9fe; /* Un morado muy claro para los encabezados del acordeón */
            color: #5b21b6; /* Texto morado oscuro */
            /* Mejoras de interactividad: sombra en hover, color en active */
            @apply hover:shadow-md active:bg-purple-100;
        }
        .accordion-header:hover {
            background-color: #ddd6fe; /* Un poco más oscuro al pasar el ratón */
        }
        .accordion-content {
            @apply px-6 py-4 bg-white border border-t-0 border-gray-200 rounded-b-lg;
            display: none; /* Oculto por defecto */
            overflow: hidden;
            transition: max-height 0.3s ease-out; /* Transición para la altura */
            max-height: 0; /* Para la animación de altura */
        }
        .accordion-content.active {
            display: block; /* Visible cuando está activo */
            max-height: 2000px; /* Un valor grande para permitir la expansión */
        }
        .accordion-icon {
            transition: transform 0.3s ease-in-out;
        }
        .accordion-icon.rotate {
            transform: rotate(180deg);
        }

        /* Estilos para el Dropdown de Navegación */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu { /* Changed from dropdown-content */
            display: none;
            position: absolute;
            background-color: rgb(90, 60, 170); /* Fondo del menú desplegable */
            min-width: 180px; /* Slightly wider for content */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1000; /* Asegura que esté por encima de otros elementos */
            border-radius: 0.375rem; /* rounded-md */
            overflow: hidden;
            top: 100%; /* Posiciona debajo del botón padre */
            left: 0;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
            pointer-events: none; /* Permite que el hover funcione sin que se cierre inmediatamente */
        }

        .dropdown:hover .dropdown-menu { /* Changed from dropdown-content */
            display: block;
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown-menu a { /* Changed from dropdown-content a */
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s ease-in-out;
            font-size: 0.875rem; /* text-sm for dropdown items */
        }

        .dropdown-menu a:hover { /* Changed from dropdown-content a */
            background-color: rgb(70, 40, 150); /* Un tono más oscuro al pasar el ratón */
        }

        /* Estilos para los botones principales y de cotización */
        .main-cta-button {
            @apply bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 active:scale-98 focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75;
        }

        /* Estilos para los botones de contacto en el footer */
        .contact-button {
            @apply bg-white text-purple-700 hover:bg-gray-200 font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 active:scale-98 focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75;
        }

        /* General style for image cards with hover effect */
        .image-card {
            @apply bg-gray-100 rounded-lg overflow-hidden shadow-md cursor-pointer;
            transition: all 0.3s ease-in-out; /* Base transition for all properties */
        }

        .image-card:hover {
            transform: translateY(-3px) scale(1.01); /* Slight lift and scale */
            box-shadow: 0 0 15px 5px rgba(147, 51, 234, 0.7), 0 0 25px 10px rgba(147, 51, 234, 0.5); /* Purple glow */
        }

        /* Specific adjustments for existing elements if needed */
        /* For "Nuestros Productos Destacados" cards, the .image-card class will now handle the hover effect */
        .products-intro-section .product-image-item {
            @apply shadow-md; /* Keep base shadow */
        }
        .products-intro-section .product-image-item:hover {
            /* Remove specific hover shadow/transform if .image-card handles it */
            /* @apply shadow-xl transform -translate-y-1; */
            /* The .image-card:hover will now apply */
        }

        /* For accordion content images, the .image-card class will now handle the hover effect */
        .accordion-content .bg-gray-100.rounded-lg.overflow-hidden.shadow-sm {
            /* @apply shadow-sm; */
        }
    </style>
</head>
<body class="text-gray-900">
    <!-- Encabezado de la página -->
    <header class="bg-purple-700 shadow-lg py-4 px-6 md:px-12">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logotipo de la empresa con vínculo de inicio -->
            <div class="flex items-center">
                <a href="index.html" class="text-white no-underline"> <!-- Vínculo al inicio de la página -->
                    <h1 class="text-2xl md:text-3xl font-extrabold">
                        <span class="logo-imaginarte-white">Imaginarte</span> <span class="logo-green">3D</span>
                    </h1>
                </a>
            </div>
            <!-- Navegación con botones y menús desplegables -->
            <nav>
                <ul class="flex flex-wrap justify-center md:justify-start space-x-4 text-lg">
                    <!-- Menú desplegable para Trabajos -->
                    <li class="relative dropdown">
                        <a href="#" class="nav-link flex items-center">
                            Trabajos
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#">Destacado 📸</a>
                            <a href="#">Favoritos</a>
                            <!-- Enlace a la nueva sección "Lo que el público pide" -->
                            <a href="lo-que-el-publico-pide.html" target="_blank">Lo que el público pide</a>
                        </div>
                    </li>
                    <!-- Menú desplegable para Productos -->
                    <li class="relative dropdown">
                        <a href="#" class="nav-link flex items-center">
                            Productos
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="dropdown-menu">
                            <!-- Enlace "Letras 3D" ahora se abre en una nueva pestaña -->
                            <a href="#letras-3d" target="_blank">Letras 3D</a>
                            <a href="#anuncios-luminosos">Anuncios Luminosos</a>
                            <a href="#neon-flex">Neón Flex</a>
                            <a href="#senaletica">Señalética Creativa</a>
                            <a href="#impresion-digital">Impresión Digital</a>
                            <a href="#promocionales">Promocionales</a>
                            <a href="#vinilo-decorativo">Vinilo Decorativo</a>
                        </div>
                    </li>
                    <!-- Nuevo menú desplegable para Servicios -->
                    <li class="relative dropdown">
                        <a href="#" class="nav-link flex items-center">
                            Servicios
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#">Cortes CNC</a>
                            <a href="#">Corte vinil</a>
                            <a href="#">Producción de letreros</a>
                        </div>
                    </li>
                    <li><a href="#nosotros" class="nav-link">Nosotros</a></li>
                    <li><a href="#contacto" class="nav-link">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Sección principal / Hero Section -->
    <main class="container mx-auto my-12 px-6 md:px-12">
        <section class="text-center bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                Haz Realidad tus Ideas con <span class="logo-imaginarte-white text-gray-800">Imaginarte</span><span class="logo-green"> 3D</span>
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">
                Diseñamos y creamos productos personalizados con tecnología 3D de vanguardia. Desde letreros de neón únicos hasta figuras coleccionables y prototipos funcionales, ¡tu imaginación es el límite!
            </p>
            <button class="main-cta-button">
                ¡Empieza a Crear Ahora!
            </button>
        </section>

        <!-- Sección: Nuestros Productos Destacados -->
        <section id="productos-destacados" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Nuestros Productos Destacados</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta de Producto: Letras 3D Corpóreas -->
                <a href="#letras-3d" class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Letras+3D+Corp%C3%B3reas" alt="Letras 3D Corpóreas" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Letras 3D Corpóreas</h4>
                        <p class="text-gray-600 text-sm">Dale volumen y presencia a tu marca con letras fabricadas en diversos materiales.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Anuncios Luminosos -->
                <a href="#anuncios-luminosos" class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Anuncios+Luminosos" alt="Anuncios Luminosos" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Anuncios Luminosos</h4>
                        <p class="text-gray-600 text-sm">Ilumina tu negocio y capta la atención con soluciones de iluminación LED.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Letreros en Neón Flex -->
                <a href="#neon-flex" class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex" alt="Letreros en Neón Flex" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Letreros en Neón Flex</h4>
                        <p class="text-gray-600 text-sm">El estilo clásico y llamativo del neón con la versatilidad del LED.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Impresión Digital a Gran Formato -->
                <a href="#impresion-digital" class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Impresi%C3%B3n+Digital" alt="Impresión Digital a Gran Formato" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Impresión Digital a Gran Formato</h4>
                        <p class="text-gray-600 text-sm">Soluciones de impresión en lona, vinil, papel y más para tus proyectos.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Señalética Creativa -->
                <a href="#senaletica" class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1al%C3%A9tica+Creativa" alt="Señalética Creativa" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Señalética Creativa</h4>
                        <p class="text-gray-600 text-sm">Guía y comunica de forma efectiva con diseños innovadores.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Promocionales -->
                <a href="#promocionales" class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Promocionales" alt="Promocionales" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Promocionales</h4>
                        <p class="text-gray-600 text-sm">Posiciona tu marca con artículos personalizados de alto impacto.</p>
                    </div>
                </a>
                <!-- Tarjeta de Producto: Vinilo Decorativo -->
                <a href="#vinilo-decorativo" class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+Decorativo" alt="Vinilo Decorativo" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h4 class="font-semibold text-xl mb-2 text-gray-800">Vinilo Decorativo</h4>
                        <p class="text-gray-600 text-sm">Personaliza tus espacios con vinilos adhesivos duraderos y versátiles.</p>
                    </div>
                </a>
            </div>
        </section>

        <!-- Sección: Letras 3D Corpóreas -->
        <section id="letras-3d" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Letras 3D Corpóreas</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                Dale volumen y presencia a tu marca. Fabricamos letras 3D en diversos materiales con acabados e iluminación que resaltarán su belleza y elegancia. Haz clic en cada material para ver más detalles.
            </p>

            <!-- Acordeón para Letras 3D en Aluminio -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="aluminio-content">
                    Letras 3D en Aluminio
                    <span class="accordion-icon">&#9660;</span> <!-- Flecha hacia abajo -->
                </button>
                <div id="aluminio-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-6">
                        La opción en aluminio otorga sobriedad y formalidad a tu marca. Con sus diferentes tonalidades, acabados e iluminación, el aluminio es ideal para un impacto duradero tanto en interiores como exteriores. Es la elección perfecta para quienes buscan una imagen sofisticada y de alta calidad.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Aluminio+Plata+Cepillado" alt="Letra 3D Aluminio plata cepillado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Plata Cepillado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Aluminio+Acero+Natural" alt="Letrero 3D Aluminio acero natural" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Acero Natural</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Aluminio+Dorado" alt="Letras 3D en aluminio dorado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Dorado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Aluminio+Luz+C%C3%A1lida" alt="Letrero realzado en aluminio oro cepillado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio con Luz Indirecta Cálida</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Aluminio+Negro+Mate" alt="Letras 3D Aluminio negro mate" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Negro Mate</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Aluminio+Espejo" alt="Letras 3D Aluminio espejo" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Espejo</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Tonalidades:** Disponibles en una amplia gama que incluye Plata, Oro, Cobre, Negro, Acero, Chocolate, Blanco, y más, para adaptarse perfectamente a la identidad de tu marca.</li>
                        <li>**Acabados:** Ofrecemos acabados cepillado para un look moderno, espejo para un brillo impactante, y natural para una estética minimalista.</li>
                        <li>**Iluminación:** Personaliza con iluminación indirecta fría o cálida, o explora opciones de RGB para efectos dinámicos y llamativos.</li>
                        <li>**Realzado o Canto:** El grosor de las letras puede variar desde 2 hasta 10 cm, permitiendo diferentes niveles de profundidad y presencia.</li>
                        <li>**Versatilidad:** Aptas para uso tanto en exteriores como en interiores, garantizando durabilidad y resistencia a las condiciones ambientales.</li>
                        <li>**Garantía:** Más de 10 años de garantía, asegurando que el material no se oxida ni se mancha con la exposición a los rayos UV.</li>
                        <li>**Mantenimiento:** De fácil mantenimiento, lo que las convierte en una solución práctica y duradera para tu negocio.</li>
                        <li>**Calidad:** Fabricadas con aluminio de primera línea de marcas reconocidas como Spec o Lac.</li>
                        <li>**Personalización de Color:** Ofrecemos opciones de pintura electroestática para igualar cualquier color corporativo o diseño específico.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO DE ALUMINIO
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Letras 3D en Acrílico -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="acrilico-content">
                    Letras 3D en Acrílico
                    <span class="accordion-icon">&#9660;</span>
                </button>
                <div id="acrilico-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-8">
                        Ideal si buscas innovación y frescura. El acrílico, con su belleza similar al cristal, flexibilidad y ligereza, es una excelente opción para realzar letras, figuras e isotipos en 3D. Su naturaleza translúcida permite un brillo único al iluminarse y ofrece una amplia gama de colores, adaptándose a cualquier diseño moderno.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Acr%C3%ADlico+Rosa+Luz+Directa" alt="Letrero realzado acrílico color rosa" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico Rosa con Luz Directa</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Acr%C3%ADlico+Blanco+Luz+Fr%C3%ADa" alt="Letras 3D acrílico color blanco" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico Blanco con Luz Fría</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Acr%C3%ADlico+Rojo+Sin+Luz" alt="Letras 3D acrílico color rojo sin luz" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico Rojo sin Luz</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Medall%C3%B3n+Acr%C3%ADlico+Vinil" alt="Medallón de acrílico 3D con arte en vinil" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Medallón de Acrílico con Vinil</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Acr%C3%ADlico+Transparente" alt="Letras 3D Acrílico Transparente" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico Transparente</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Acr%C3%ADlico+RGB" alt="Letras 3D Acrílico con luz RGB" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico con Luz RGB</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Colores:** Amplia variedad de colores vibrantes como blanco, rojo, amarillo, azul, rosa, verde, vino, naranja, y muchos más, para una personalización total.</li>
                        <li>**Acabado:** Su acabado translúcido permite un efecto de brillo y profundidad cuando se ilumina.</li>
                        <li>**Iluminación:** Opciones de iluminación directa o indirecta en tonos fríos o cálidos, y la posibilidad de integrar sistemas RGB para cambios de color dinámicos.</li>
                        <li>**Realzado o Canto:** El grosor puede variar desde 5 hasta 10 cm, ofreciendo una presencia notable en cualquier espacio.</li>
                        <li>**Versatilidad:** Adecuadas para uso tanto en exteriores como en interiores, manteniendo su color y brillo con el tiempo.</li>
                        <li>**Garantía:** Más de 10 años de garantía, con resistencia garantizada a la decoloración por rayos UV.</li>
                        <li>**Mantenimiento:** Requieren un mantenimiento mínimo, lo que las hace una opción práctica y duradera.</li>
                        <li>**Calidad:** Utilizamos acrílicos de primera mano para asegurar la máxima calidad y durabilidad.</li>
                        <li>**Personalización Adicional:** Pueden ser rotuladas con vinil para lograr tonalidades específicas, texturas o integrar imágenes complejas.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO DE ACRÍLICO
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Letras 3D Acrílico con Aluminio -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="acrilico-aluminio-content">
                    Letras 3D Acrílico con Aluminio
                    <span class="accordion-icon">&#9660;</span>
                </button>
                <div id="acrilico-aluminio-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-8">
                        La combinación perfecta de la naturalidad del acrílico y la elegancia del aluminio. Ofrece diversas posibilidades de fabricación, como frente de acrílico y cantos de aluminio o viceversa. Ideales para colocarse en alturas y lograr un impacto visual impresionante, fusionando durabilidad y estética.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/93C5FD/FFFFFF?text=Acr%C3%ADlico+Frente+Aluminio+Cantos" alt="Letras 3D frente de acrílico y cantos de aluminio" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Frente Acrílico, Cantos Aluminio</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/60A5FA/FFFFFF?text=Aluminio+Frente+Acr%C3%ADlico+Cantos" alt="Letras 3D frente de aluminio y cantos acrílico" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Frente Aluminio, Cantos Acrílico</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/3B82F6/FFFFFF?text=Letras+Combinadas+1" alt="Letras 3D combinadas 1" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Combinación de Materiales 1</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/93C5FD/FFFFFF?text=Letras+Combinadas+2" alt="Letras 3D combinadas 2" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Combinación de Materiales 2</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/60A5FA/FFFFFF?text=Acr%C3%ADlico+Iluminado+Aluminio" alt="Letras 3D Acrílico iluminado con base de Aluminio" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acrílico Iluminado con Base de Aluminio</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/3B82F6/FFFFFF?text=Aluminio+Iluminado+Acr%C3%ADlico" alt="Letras 3D Aluminio iluminado con frente de Acrílico" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Aluminio Iluminado con Frente de Acrílico</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Tonalidades de Aluminio:** Plata, Oro, Cobre, Negro, Acero, Chocolate, Blanco, entre otros, para el cuerpo o cantos de las letras.</li>
                        <li>**Colores de Acrílico:** Blanco, rojo, amarillo, azul, rosa, verde, vino, naranja y muchos más, para el frente o la parte trasera iluminada.</li>
                        <li>**Acabado de Acrílico:** Translúcido, ideal para difundir la luz de manera uniforme.</li>
                        <li>**Acabados de Aluminio:** Cepillado para un look moderno, espejo para un brillo intenso y natural para un toque orgánico.</li>
                        <li>**Iluminación:** Opciones de iluminación directa o indirecta en tonos fríos o cálidos, y la posibilidad de integrar sistemas RGB para efectos dinámicos.</li>
                        <li>**Realzado o Canto:** El grosor de las letras puede variar desde 5 hasta 10 cm, permitiendo una presencia impactante.</li>
                        <li>**Versatilidad:** Aptas para uso tanto en exteriores como en interiores, garantizando una alta resistencia a las condiciones climáticas y a los rayos UV.</li>
                        <li>**Garantía:** Más de 10 años de garantía, con materiales de primera mano que aseguran durabilidad y bajo mantenimiento.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO COMBINADO
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Letras 3D en Acero Inoxidable -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="acero-inoxidable-content">
                    Letras 3D en Acero Inoxidable
                    <span class="accordion-icon">&#9660;</span>
                </button>
                <div id="acero-inoxidable-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-8">
                        Para un acabado de lujo y máxima durabilidad, las letras 3D en acero inoxidable son la elección perfecta. Resistentes a la corrosión, a las condiciones climáticas extremas y con un brillo distintivo, son ideales para fachadas, señalización de alto impacto y ambientes que requieren una estética superior y una larga vida útil.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Acero+Inoxidable+Pulido" alt="Letras 3D Acero Inoxidable Pulido" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Pulido</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Acero+Inoxidable+Cepillado" alt="Letras 3D Acero Inoxidable Cepillado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Cepillado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Acero+Inoxidable+Retroiluminado" alt="Letras 3D Acero Inoxidable Retroiluminado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Retroiluminado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Acero+Inoxidable+Pintado" alt="Letras 3D Acero Inoxidable Pintado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Pintado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Acero+Inoxidable+Oro" alt="Letras 3D Acero Inoxidable color oro" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Color Oro</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Acero+Inoxidable+Negro" alt="Letras 3D Acero Inoxidable color negro" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">Acero Inoxidable Color Negro</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Acabados:** Disponibles en pulido espejo para un brillo reflectante, satinado (cepillado) para un look más sobrio, y opciones de color con pintura electroestática para una personalización completa.</li>
                        <li>**Durabilidad:** Extremadamente resistentes a la corrosión, la oxidación y las condiciones climáticas adversas, garantizando una vida útil prolongada.</li>
                        <li>**Iluminación:** Posibilidad de integrar retroiluminación LED para crear un elegante efecto de halo alrededor de las letras, destacándolas en cualquier ambiente.</li>
                        <li>**Realzado o Canto:** Disponibles en diferentes espesores para lograr el volumen y la presencia deseados.</li>
                        <li>**Uso:** Ideales para aplicaciones en exteriores de alta gama, fachadas de edificios, recepciones y cualquier lugar donde se busque una imagen de prestigio y durabilidad.</li>
                        <li>**Mantenimiento:** Requieren un mantenimiento mínimo gracias a sus propiedades inherentes de resistencia.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO DE ACERO
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Letras 3D en MDF -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="mdf-content">
                    Letras 3D en MDF
                    <span class="accordion-icon">&#9660;</span>
                </button>
                <div id="mdf-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-8">
                        Las letras 3D en MDF (Tablero de Fibra de Densidad Media) son una opción económica y versátil, ideal para interiores. Permiten una gran variedad de acabados, desde pintura personalizada hasta rotulación con vinil, adaptándose a cualquier diseño y estilo decorativo con facilidad.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=MDF+Pintado" alt="Letrero en MDF con pintura" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF Pintado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=MDF+Con+Vinil" alt="Letrero en MDF con vinil" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF con Vinil</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=MDF+Con+Frente+Aluminio" alt="Letrero en MDF con frente de aluminio" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF con Frente de Aluminio</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=MDF+Personalizado" alt="MDF Personalizado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF Personalizado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=MDF+Natural" alt="Letras 3D MDF Natural" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF en Acabado Natural</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=MDF+Con+Acr%C3%ADlico" alt="Letras 3D MDF con frente de Acrílico" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">MDF con Frente de Acrílico</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Uso:** Aptas únicamente para interior, ya que el MDF no es resistente a la humedad o a la intemperie.</li>
                        <li>**Espesores:** Disponibles en una variedad de espesores desde 3, 4, 6, 9 y hasta 12 milímetros, permitiendo diferentes profundidades y volúmenes.</li>
                        <li>**Tipos de Acabados:** Se pueden personalizar con pintura de cualquier color, rotulación con vinil para diseños específicos, o incluso con un frente de aluminio o acrílico para un acabado más sofisticado.</li>
                        <li>**Iluminación:** Por su naturaleza, las letras de MDF no incluyen iluminación interna. Sin embargo, se pueden complementar con iluminación externa para destacar su presencia.</li>
                        <li>**Costo-Efectividad:** Representan una opción económica y muy versátil para proyectos de señalización y decoración interior.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO DE MDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acordeón para Letras 3D en PVC -->
            <div class="mb-4 rounded-lg shadow-md overflow-hidden">
                <button class="accordion-header" data-target="pvc-content">
                    Letras 3D en PVC
                    <span class="accordion-icon">&#9660;</span>
                </button>
                <div id="pvc-content" class="accordion-content">
                    <p class="text-lg text-gray-600 mb-8">
                        El PVC (Cloruro de Polivinilo) es un material ligero y resistente, ideal para letras 3D tanto en interiores como exteriores. Ofrece una superficie lisa y uniforme, perfecta para acabados en pintura o vinil, garantizando durabilidad y un aspecto profesional en cualquier aplicación.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=PVC+Pintado+Exterior" alt="Letrero en PVC pintado para exterior" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC Pintado Exterior</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=PVC+Con+Vinil" alt="Letrero en PVC con vinil" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC con Vinil</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=PVC+Con+Frente+Aluminio" alt="Letrero en PVC con frente de aluminio" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC con Frente de Aluminio</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=PVC+Personalizado" alt="PVC Personalizado" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC Personalizado</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=PVC+Blanco" alt="Letras 3D PVC Blanco" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC en Blanco Natural</p></div>
                        </div>
                        <div class="image-card">
                            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=PVC+Negro" alt="Letras 3D PVC Negro" class="w-full h-48 object-cover">
                            <div class="p-3"><p class="font-medium text-sm">PVC en Negro</p></div>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Características Detalladas:</h4>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>**Uso:** Aptas para uso tanto en exteriores como en interiores, gracias a su resistencia a la humedad y a los cambios de temperatura.</li>
                        <li>**Espesores:** Disponibles en una variedad de espesores desde 3, 4, 6, 9 y hasta 12 milímetros, ofreciendo flexibilidad en el diseño y la profundidad.</li>
                        <li>**Tipos de Acabados:** Se pueden personalizar con pintura de cualquier color, rotulación con vinil impreso o de recorte, o incluso con un frente de aluminio para un acabado mixto.</li>
                        <li>**Iluminación:** Por su naturaleza, las letras de PVC no incluyen iluminación interna. Sin embargo, son ideales para complementar con iluminación externa.</li>
                        <li>**Propiedades:** Son ligeras, lo que facilita su instalación, y muy resistentes, garantizando una larga durabilidad y un bajo mantenimiento.</li>
                    </ul>
                    <div class="text-center mt-8">
                        <a href="#contacto" class="main-cta-button">
                            QUIERO COTIZAR MI LETRERO DE PVC
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección: Anuncios Luminosos -->
        <section id="anuncios-luminosos" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Anuncios Luminosos</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                ¡Que tu negocio brille! Los anuncios o letreros luminosos cuentan con tecnología de iluminación LED y se personalizan de acuerdo a las necesidades de tu marca.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Luminoso+Bandera" alt="Anuncio luminoso tipo bandera" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Anuncio luminoso tipo bandera</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Caja+de+Luz+1+Vista" alt="Caja de luz 1 vista" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Caja de luz 1 vista</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Contorno+Logo" alt="Anuncio a contorno del logo" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Anuncio a contorno del logo</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Anuncio+Bandera+Contorno" alt="Anuncio luminoso tipo bandera a contorno" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Anuncio luminoso tipo bandera a contorno</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Bandera+Rectangular" alt="Anuncio luminoso tipo bandera rectangular" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Anuncio luminoso tipo bandera rectangular</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Caja+Lona+Tensada" alt="Caja rectangular de lona tensada" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Caja rectangular de lona tensada</p></div>
                </div>
            </div>
            <h5 class="text-xl font-semibold text-gray-700 mb-2">Características de los anuncios luminosos:</h5>
            <ul class="list-disc list-inside text-gray-600">
                <li>Duración: Más de 10 años de garantía.</li>
                <li>Iluminación: A base de módulos LED, más de 30 mil horas de vida.</li>
                <li>Fabricados con materiales de primera calidad: Acrílico, aluminio, lámina galvanizada, etc.</li>
                <li>1 y 2 vistas.</li>
                <li>Fácil mantenimiento.</li>
                <li>Fabricación en grandes dimensiones.</li>
            </ul>
        </section>

        <!-- Sección: Letreros en Neón Flex -->
        <section id="neon-flex" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Letreros en Neón Flex</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                "El estilo clásico y llamativo". El Neón Flex es una tecnología patentada que crea una mejor iluminación y más opciones de colores que el neón tradicional, ideal para darle un toque clásico y brillante a tu espacio.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+3+Tonos" alt="Neón 3 tonos" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Neón 3 tonos</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Ne%C3%B3n+Flex+Rosa" alt="Neón Rosa" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Neón Rosa</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+Colores" alt="Neón Flex colores" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Neón Flex colores</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Ne%C3%B3n+Flex+Blanco" alt="Neón blanco" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Neón blanco</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+Amarillo" alt="Neón Flex amarillo" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Neón Flex amarillo</p></div>
                </div>
            </div>
            <h5 class="text-xl font-semibold text-gray-700 mb-2">Características del Neón Flex:</h5>
            <ul class="list-disc list-inside text-gray-600">
                <li>Duración: Más de 3 años de vida.</li>
                <li>Excelentes para interior y exterior.</li>
                <li>Versatilidad en colores (más de 10 tonos).</li>
                <li>Ocupa muy poca energía y son fáciles de conectar.</li>
                <li>Son ligeros, resistentes y manipulables.</li>
                <li>Opciones de animación (destellos, desvanecimientos o cambios de color).</li>
                <li>Brillo intenso.</li>
            </ul>
        </section>

        <!-- Sección: Impresión Digital a Gran Formato -->
        <section id="impresion-digital" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Impresión Digital a Gran Formato</h3>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Diferentes posibilidades para diferentes proyectos. Impresión de alta resolución para transmitir imágenes y mensajes en grandes superficies.
            </p>

            <!-- Sub-sección: Lona -->
            <div class="mb-10">
                <h4 class="text-2xl font-semibold text-gray-700 mb-4 border-b-2 border-purple-300 pb-2">Lona</h4>
                <p class="text-gray-600 mb-6">
                    Material muy resistente al exterior, con la ventaja de su costo y la capacidad de imprimirse en grandes dimensiones con diferentes aplicaciones.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Lona+Backlight" alt="Lona back light" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Lona back light</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Lona+Front+18+Onzas" alt="Lona front 18 onzas" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Lona front 18 onzas</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Lona+Mesh" alt="Lona mesh" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Lona mesh</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Lona+Para+Banner" alt="Lona para banner 13 onzas" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Lona para banner 13 onzas</p></div>
                    </div>
                </div>
                <h5 class="text-xl font-semibold text-gray-700 mb-2">Tipos de Lona y sus características:</h5>
                <ul class="list-disc list-inside text-gray-600">
                    <li>**Lona Front 13 y 18 onzas:** Blancas y con acabado brillante, económicas, resistentes y de gran calidad.</li>
                    <li>**Lona Mesh:** Altamente resistente, permite el paso del viento, ideal para escenografías o espectaculares en zonas de mucho viento o al exterior.</li>
                    <li>**Lona Black light 18 onzas:** Permite el paso de la iluminación artificial, ideal para cajas de luz de gran tamaño.</li>
                </ul>
            </div>

            <!-- Sub-sección: Vinil -->
            <div class="mb-10">
                <h4 class="text-2xl font-semibold text-gray-700 mb-4 border-b-2 border-purple-300 pb-2">Vinil</h4>
                <p class="text-gray-600 mb-6">
                    Material flexible y adherible, muy versátil para aplicar en diferentes superficies como muros, cristales, pisos, promocionales, textiles, autos, metales, etc. Fácil mantenimiento, ideal para interiores y exteriores.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Tablaroca" alt="Vinil aplicado en Tablaroca" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil aplicado en Tablaroca</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Auto" alt="Vinil aplicado auto" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil aplicado auto</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Vinil+Cristal" alt="Vinil aplicado sobre cristal" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil aplicado sobre cristal</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Textil" alt="Vinil textil" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil textil</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Microperforado" alt="Vinil microperforado" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil microperforado</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Vinil+Transparente" alt="Vinil transparente con impresión" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil transparente con impresión</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Esmerilado+Impreso" alt="Vinil esmerilado impreso" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil esmerilado impreso</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Electroest%C3%A1tico" alt="Vinil electroestático" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Vinil electroestático</p></div>
                    </div>
                </div>
                <h5 class="text-xl font-semibold text-gray-700 mb-2">Tipos de Vinil y sus características:</h5>
                <ul class="list-disc list-inside text-gray-600">
                    <li>**Vinil Adherible:** El más común, aplicable en diversas superficies, con diferentes tipos de durabilidad, adhesión y acabados mate o brillante.</li>
                    <li>**Vinil Microperforado:** Con agujeros uniformes que permiten el paso de la luz, ideal para rotulación y decoración de ventanas y cristales.</li>
                    <li>**Vinil Transparente:** Permite el paso de luz y no tapa completamente la visión, ideal para cristales o acrílicos.</li>
                    <li>**Vinil Electroestático:** No contiene adhesivos, se sostiene por carga electroestática, comúnmente usado en cristales por poco tiempo.</li>
                </ul>
            </div>

            <!-- Sub-sección: Papel -->
            <div class="mb-10">
                <h4 class="text-2xl font-semibold text-gray-700 mb-4 border-b-2 border-purple-300 pb-2">Papel</h4>
                <p class="text-gray-600 mb-6">
                    La impresión en Papel cuenta con diferentes aplicaciones dependiendo el proyecto, su gran ventaja son las dimensiones que pueden imprimirse. Contamos con papel bond y papel tapiz.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Papel+Tapiz" alt="Papel tapiz" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Papel tapiz</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Papel+Bond" alt="Papel bond" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Papel bond</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Tr%C3%ADpticos" alt="Trípticos" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Trípticos / Papelería Corporativa</p></div>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    Adicional a esto, en Imaginarte 3D también podemos apoyarte en la papelería corporativa: Trípticos, folletos, tarjetas de presentación, menús, etc.
                </p>
            </div>

            <!-- Sub-sección: Más Aplicaciones (Impresión) -->
            <div>
                <h4 class="text-2xl font-semibold text-gray-700 mb-4 border-b-2 border-purple-300 pb-2">Más Aplicaciones</h4>
                <p class="text-gray-600 mb-6">
                    Checa más posibilidades de impresión digital a gran formato, incluyendo rígidos, canvas y estireno.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Impresi%C3%B3n+en+R%C3%ADgidos" alt="Impresión en rígidos" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Impresión en rígidos</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Cuadro+en+Tela+Canvas" alt="Cuadro en tela Canvas" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Cuadro en tela Canvas</p></div>
                    </div>
                    <div class="image-card">
                        <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Estireno+Impreso" alt="Estireno impreso" class="w-full h-32 object-cover">
                        <div class="p-3"><p class="font-medium text-sm">Estireno impreso</p></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección: Señalética Creativa -->
        <section id="senaletica" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Señalética Creativa</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                La mejor estrategia de comunicación visual. Fundamental para actuar como guía dentro de cualquier lugar, brindando información clara y sencilla con un diseño bien pensado.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Vinil" alt="Señalamientos en Recorte de Vinil" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos en Recorte de Vinil</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+Madera" alt="Señalamientos en madera" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos en madera</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Acr%C3%ADlico" alt="Señalamientos en acrílico" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos en acrílico</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+PVC+Vinil" alt="Señalamientos en PVC y vinil impreso" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos en PVC y vinil impreso</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Protecci%C3%B3n+Civil" alt="Señalamientos creativos de protección civil" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos creativos de protección civil</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+Aluminio" alt="Señalamientos en aluminio y recorte de vinil" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Señalamientos en aluminio y recorte de vinil</p></div>
                </div>
            </div>
            <h5 class="text-xl font-semibold text-gray-700 mb-2">La señalización creativa incluye:</h5>
            <ul class="list-disc list-inside text-gray-600 mb-4">
                <li>Protección Civil, ubicación de zonas, informativas, directorios y todo lo que requiera ser señalado.</li>
                <li>**Materiales:** Aluminio, acrílico, PVC, madera, estireno, vinilos, grabado o calado, serigrafía, impresión directa, etc.</li>
                <li>Transmite una imagen mucho más cuidada e innovadora.</li>
                <li>Infinidad de opciones, para infinidad de ideas.</li>
            </ul>
        </section>

        <!-- Sección: Promocionales -->
        <section id="promocionales" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Promocionales</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                Posiciona tu marca en cualquier sitio. Más de 2,500 artículos promocionales para elegir, ideales para campañas publicitarias, regalos corporativos o de gran valor.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Playeras+DTF" alt="Playeras DTF serigráfico" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Playeras DTF serigráfico</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Plumas+Serigraf%C3%ADa" alt="Plumas en serigrafía" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Plumas en serigrafía</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Taza+Grabada" alt="Taza grabada" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Taza grabada</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Bolsas+Sublimaci%C3%B3n" alt="Bolsas con sublimación" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Bolsas con sublimación</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Libretas+Serigraf%C3%ADa" alt="Libretas en serigrafía" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Libretas en serigrafía</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Gorras+DTF" alt="Gorras DTF serigráfico" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Gorras DTF serigráfico</p></div>
                </div>
            </div>
            <h5 class="text-xl font-semibold text-gray-700 mb-2">Técnicas de impresión para promocionales:</h5>
            <ul class="list-disc list-inside text-gray-600">
                <li>Serigrafía, sublimación, DTF serigráfico, tampografía, vinil textil, grabado láser, etc.</li>
                <li>Son productos de bajo costo y alto impacto, ideales para incluir la dirección, logo o teléfono.</li>
                <li>Perfectos para promocionarte en eventos como ferias, bazares, convenciones, foros, etcétera.</li>
            </ul>
        </section>

        <!-- Sección: Vinilo Decorativo -->
        <section id="vinilo-decorativo" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Vinilo Decorativo</h3>
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                ¡Personaliza tus espacios! El vinilo para decoración es un material adhesivo duradero, resistente, accesible y versátil, un elemento estrella en los diseños de interiorismo.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-6">
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+Colores" alt="Vinilo decorativo colores" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Vinilo decorativo colores</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Vinilo+1+Color" alt="Vinilo decorativo 1 color" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Vinilo decorativo 1 color</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+2+Colores" alt="Vinilo decorativo 2 colores" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Vinilo decorativo 2 colores</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Vinilo+Esmerilado+Calado" alt="Vinilo esmerilado calado" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Vinilo esmerilado calado</p></div>
                </div>
                <div class="image-card">
                    <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+Esmerilado+Recorte" alt="Vinilo esmerilado y vinilo de recorte a color" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4"><p class="font-medium text-sm">Vinilo esmerilado y vinilo de recorte a color</p></div>
                </div>
            </div>
            <h5 class="text-xl font-semibold text-gray-700 mb-2">Características de los vinilos decorativos:</h5>
            <ul class="list-disc list-inside text-gray-600">
                <li>Duración: Más de 10 años al interior.</li>
                <li>Diseños personalizados.</li>
                <li>Fácil mantenimiento.</li>
                <li>Adherencia en muros de Tablaroca, concreto, Durock, cristales, plásticos, madera, etc.</li>
                <li>Vinilos recortados o calados.</li>
                <li>Vinilos esmerilados, neón y una amplia gama de tonalidades brillantes o mate.</li>
                <li>Pueden fabricarse en dimensiones grandes o muy pequeñas.</li>
                <li>Resistente a la humedad y al exterior.</li>
            </ul>
        </section>

        <!-- Sección: Nosotros -->
        <section id="nosotros" class="bg-white p-8 md:p-12 rounded-xl shadow-lg mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Sobre Nosotros</h3>
            <p class="text-lg text-gray-600 mb-8 text-center max-w-3xl mx-auto">
                En **Imaginarte 3D**, somos un equipo apasionado por transformar ideas en realidad. Con años de experiencia en el diseño y fabricación de soluciones visuales, nos dedicamos a ofrecer productos de la más alta calidad, combinando **creatividad**, **tecnología de vanguardia** y un **servicio al cliente excepcional**. Nuestra misión es ayudarte a destacar, brindando soluciones innovadoras que superen tus expectativas.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-center">
                <div>
                    <h4 class="text-2xl font-semibold text-gray-700 mb-3">Nuestra Misión</h4>
                    <p class="text-gray-600">
                        Ser el aliado estratégico de nuestros clientes, proporcionando soluciones de señalización y publicidad 3D que impulsen su imagen y comunicación, a través de la innovación, calidad y compromiso.
                    </p>
                </div>
                <div>
                    <h4 class="text-2xl font-semibold text-gray-700 mb-3">Nuestra Visión</h4>
                    <p class="text-gray-600">
                        Consolidarnos como líderes en el mercado de fabricación 3D, reconocidos por nuestra excelencia en diseño, producción y servicio, expandiendo nuestra presencia y ofreciendo soluciones creativas a nivel nacional.
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección de Contacto -->
        <section id="contacto" class="bg-gradient-to-r from-purple-700 to-purple-900 text-white p-8 md:p-12 rounded-xl shadow-lg text-center">
            <h3 class="text-3xl font-bold mb-4">¿Listo para Crear?</h3>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
                Contáctanos hoy mismo para comenzar tu proyecto personalizado. ¡Estamos ansiosos por dar vida a tus ideas!
            </p>
            <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="mailto:tuemail@imaginarte3d.com" class="contact-button">
                    Envíanos un Email
                </a>
                <a href="tel:+525512345678" class="contact-button">
                    Llámanos
                </a>
                <a href="https://wa.me/525512345678" target="_blank" class="contact-button">
                    WhatsApp
                </a>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-6 md:px-12 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Imaginarte 3D. Todos los derechos reservados.</p>
            <p class="mt-2">Diseñado con <span class="logo-imaginarte-white">Imaginarte</span> y Tecnología <span class="logo-green">3D</span>.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script para el desplazamiento suave de la navegación
            const navLinks = document.querySelectorAll('nav a[href^="#"]'); // Select all anchor links in nav that start with #
            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    const targetId = this.getAttribute('href');

                    // If the href is just '#', it is assumed to be a link for a dropdown menu
                    // and should not attempt to scroll to a section.
                    if (targetId === '#') {
                        event.preventDefault(); // Prevents the default link behavior
                        return; // Exits the function without attempting to scroll
                    }

                    // For internal anchor links, prevent default and scroll smoothly
                    if (targetId.startsWith('#')) {
                        event.preventDefault();
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 80, // Adjust for fixed header
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });

            // Script para la funcionalidad del acordeón
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const contentId = this.getAttribute('data-target');
                    const content = document.getElementById(contentId);
                    const icon = this.querySelector('.accordion-icon');

                    // Cierra todos los acordeones abiertos excepto el actual
                    accordionHeaders.forEach(otherHeader => {
                        const otherContentId = otherHeader.getAttribute('data-target');
                        const otherContent = document.getElementById(otherContentId);
                        const otherIcon = otherHeader.querySelector('.accordion-icon');

                        if (otherContent !== content && otherContent.classList.contains('active')) {
                            otherContent.classList.remove('active');
                            otherIcon.classList.remove('rotate');
                        }
                    });

                    // Alterna la visibilidad del contenido y la rotación del icono
                    content.classList.toggle('active');
                    icon.classList.toggle('rotate');
                });
            });
        });
    </script>
</body>
</html>
