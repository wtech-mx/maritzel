<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imaginarte 3D - Dale Vida a Tu Visión</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Three.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <!-- Three.js FontLoader and TextGeometry for 3D text -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/FontLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/geometries/TextGeometry.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');

        body {
            margin: 0;
            overflow: auto; /* Permite el desplazamiento para el contenido debajo del overlay */
            font-family: 'Inter', sans-serif;
            background-color: #FFFFFF; /* Fondo blanco para toda la página */
            color: #1a202c; /* Color de texto por defecto oscuro para el body */
        }

        /* Three.js Canvas Style */
        canvas {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 2; /* Canvas will be behind overlay content, but visible through transparent parts */
        }

        /* #overlay ahora actúa como la primera pantalla principal */
        #overlay {
            position: relative;
            width: 100%;
            height: 100vh; /* Establecido a la altura del viewport para la primera pantalla */
            z-index: 3; /* Asegura que esté por encima del canvas */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Mantiene el encabezado y pie de página en los extremos */
            align-items: center;
            padding: 2rem;
            box-sizing: border-box;
            background-color: transparent; /* Fondo transparente para ver el canvas detrás */
        }

        /* Ajustes de posicionamiento para elementos dentro del overlay */
        #overlay header {
            width: 100%;
            background: rgba(255, 255, 255, 0.7); /* Fondo blanco semi-transparente para el header */
            padding: 1rem 2rem;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 4; /* Asegura que el header esté por encima del logo 3D */
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1a202c; /* Color de texto oscuro para el header */
        }

        /* Estilos para la sección de búsqueda en el encabezado (solo la lupa) */
        .search-container {
            display: flex;
            align-items: center;
            padding: 0.5rem; /* Ajustado para solo el icono */
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .search-container:hover .search-icon {
            color: #9C27B0; /* Morado al pasar el ratón */
        }

        .search-icon {
            color: #4a5568;
            width: 24px; /* Tamaño del icono un poco más grande */
            height: 24px;
        }


        #overlay main {
            position: absolute;
            top: 65%; /* Movido más abajo para dejar espacio al logo */
            left: 50%;
            transform: translate(-50%, -50%); /* Centra el main en la pantalla */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 100%;
            max-width: 90%;
            z-index: 4; /* Asegura que el main esté por encima del logo 3D */
            padding-top: 0; /* Eliminado padding-top */
            padding-bottom: 0; /* Eliminado padding-bottom */
        }

        #overlay footer {
            width: 100%;
            text-align: center;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.7); /* Fondo blanco semi-transparente para el footer */
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 4; /* Asegura que el footer esté por encima del logo 3D */
            color: #4a5568; /* Color de texto oscuro para el footer */
        }

        .nav-link {
            transition: color 0.3s ease, transform 0.3s ease;
            color: #2d3748; /* Color de texto oscuro para los enlaces de navegación */
        }
        .nav-link:hover {
            color: #63b3ed; /* Azul claro al pasar el ratón */
            transform: translateY(-2px);
        }
        .button-explore {
            position: relative;
            z-index: 1;
            background: #2d3748;
            color: white;
            padding: 1rem 2rem;
            border-radius: 9999px;
            font-size: 1.25rem;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border: none;
        }

        .button-explore::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #00FF00, #800080); /* Degradado verde a morado */
            z-index: -1;
            border-radius: inherit;
            transition: opacity 0.3s ease;
        }

        .button-explore:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
        .button-explore:hover::before {
            opacity: 0.8;
        }

        /* Estilos para el eslogan con degradado */
        .slogan-gradient {
            background-image: linear-gradient(45deg, #00FF00, #800080); /* Degradado verde a morado */
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: bold;
            text-shadow: 0 0 8px rgba(0, 255, 0, 0.3), 0 0 8px rgba(128, 0, 128, 0.3); /* Sombra para un efecto de brillo */
        }

        /* Estilos para el menú desplegable */
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #2d3748; /* Fondo oscuro para el menú */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 20;
            border-radius: 0.5rem;
            overflow: hidden;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 0.5rem 0;
        }

        .dropdown-menu a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: #4a5568; /* Color de fondo al pasar el ratón */
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Estilos para el modal de proyectos */
        .projects-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro semi-transparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .projects-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: #1a202c; /* Fondo oscuro del modal */
            padding: 2rem;
            border-radius: 1rem;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
            color: white;
            position: relative;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7);
        }

        .modal-close-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            color: white;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .modal-close-button:hover {
            color: #ef4444; /* Rojo al pasar el ratón */
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .project-item {
            background-color: #2d3748;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease;
        }

        .project-item:hover {
            transform: translateY(-5px);
        }

        .project-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .project-item-title {
            padding: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Estilos para la nueva sección de diseños únicos */
        .unique-designs-section {
            background-color: #FFFFFF; /* Fondo blanco */
            padding: 3rem 2rem;
            border-radius: 1rem;
            margin-top: 2rem;
            margin-bottom: 4rem;
            width: 90%;
            max-width: 1200px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            position: relative;
            z-index: 5;
            color: #1a202c; /* Texto oscuro */
        }

        .unique-designs-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            background-image: linear-gradient(45deg, #00FF00, #800080); /* Degradado verde a morado */
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.4), 0 0 10px rgba(128, 0, 128, 0.4);
        }

        /* Contact section styles */
        .contact-section {
            background-color: #FFFFFF; /* Fondo blanco */
            padding: 3rem 2rem;
            border-radius: 1rem;
            margin-top: 2rem;
            margin-bottom: 4rem;
            width: 90%;
            max-width: 800px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            position: relative;
            z-index: 5;
            color: #1a202c; /* Texto oscuro */
        }

        .contact-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            background-image: linear-gradient(45deg, #00FF00, #800080);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.4), 0 0 10px rgba(128, 0, 128, 0.4);
        }

        .contact-form label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #2d3748; /* Color de texto oscuro para las etiquetas del formulario */
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid #cbd5e0; /* Borde más claro */
            background-color: #f7fafc; /* Fondo muy claro */
            color: #1a202c; /* Texto oscuro */
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-form input[type="text"]:focus,
        .contact-form input[type="email"]:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: #9C27B0; /* Morado al enfocar */
            box-shadow: 0 0 0 3px rgba(156, 39, 176, 0.5); /* Sombra de enfoque morada */
        }

        .contact-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .contact-form .button-explore {
            width: auto;
            padding-left: 3rem;
            padding-right: 3rem;
        }
    </style>
</head>
<body>
    <!-- Three.js Canvas for the interactive logo -->
    <canvas id="heroCanvas"></canvas>

    <div id="overlay" class="flex flex-col justify-between items-center text-white p-8">
        <!-- Header / Navigation -->
        <header class="w-full">
            <a href="#" class="text-xl font-bold text-gray-100 whitespace-nowrap">
                <span style="color: #8A2BE2;">imaginarte</span> <span style="color: #00FF00;">3D</span>
            </a>
            <nav class="flex items-center space-x-8 text-lg">
                <ul class="flex space-x-8 text-lg">
                    <!-- Menú desplegable para Trabajos -->
                    <li class="relative dropdown">
                        <a href="#" class="nav-link flex items-center">
                            Trabajos
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#">Destacado 📸</a>
                            <a href="#">Favoritos</a>
                            <a href="#">Lo que el público pide</a>
                        </div>
                    </li>
                    <!-- Menú desplegable para Productos -->
                    <li class="relative dropdown">
                        <a href="#" class="nav-link flex items-center">
                            Productos
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#">Letras 3D</a>
                            <a href="#">Anuncios Luminosos</a>
                            <a href="#">Cajas de Luz</a>
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
                    <li><a href="#" class="nav-link">Nosotros</a></li>
                    <li><a href="#" class="nav-link">Contacto</a></li>
                </ul>
                <!-- Search Section (only magnifying glass icon) -->
                <div class="search-container">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </nav>
        </header>

        <!-- Main Content / Tagline & Button -->
        <main class="flex flex-col items-center text-center mt-auto mb-auto py-16">
            <!-- The Three.js logo will be rendered here, no direct HTML element needed for the text -->
            <p class="text-xl md:text-2xl max-w-2xl mb-10 slogan-gradient">
                ¡Logos que brillan!
            </p>
            <button id="exploreProjectsBtn" class="button-explore">
                Explorar Proyectos
            </button>
        </main>

        <!-- Footer (optional, could add copyright or social links) -->
        <footer class="w-full text-center text-gray-500 text-sm">
            &copy; 2024 imaginarte 3D. Todos los derechos reservados.
        </footer>
    </div>

    <!-- New Unique Designs Section -->
    <div class="unique-designs-section mx-auto">
        <h2>Diseños únicos para ideas únicas</h2>
        <div class="projects-grid">
            <!-- Imágenes de ejemplo, puedes reemplazarlas con tus diseños -->
            <div class="project-item">
                <img src="https://placehold.co/400x250/00FF00/000000?text=Dise%C3%B1o+A" alt="Diseño A">
                <div class="project-item-title">Diseño Abstracto</div>
            </div>
            <div class="project-item">
                <img src="https://placehold.co/400x250/800080/FFFFFF?text=Dise%C3%B1o+B" alt="Diseño B">
                <div class="project-item-title">Letrero Moderno</div>
            </div>
            <div class="project-item">
                <img src="https://placehold.co/400x250/4A5568/FFFFFF?text=Dise%C3%B1o+C" alt="Diseño C">
                <div class="project-item-title">Corte de Vinil</div>
            </div>
            <div class="project-item">
                <img src="https://placehold.co/400x250/2D3748/FFFFFF?text=Dise%C3%B1o+D" alt="Diseño D">
                <div class="project-item-title">Caja de Luz Creativa</div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="contact-section mx-auto">
        <h2>Contáctanos</h2>
        <p class="text-lg text-gray-300 mb-8">¿Listo para llevar tu proyecto a la tercera dimensión? Ponte en contacto con nosotros.</p>
        <form class="contact-form">
            <div class="mb-4">
                <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Tu Nombre" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" placeholder="tu.email@ejemplo.com" required>
            </div>
            <div class="mb-6">
                <label for="message" class="block text-gray-300 text-sm font-bold mb-2">Mensaje:</label>
                <textarea id="message" name="message" rows="6" placeholder="Describe tu proyecto o consulta..." required></textarea>
            </div>
            <button type="submit" class="button-explore">Enviar Mensaje</button>
        </form>
    </section>

    <!-- Projects Modal -->
    <div id="projectsModal" class="projects-modal">
        <div class="modal-content">
            <button class="modal-close-button" id="closeModalBtn">&times;</button>
            <h2 class="text-3xl font-bold text-center mb-8">Nuestros Proyectos</h2>
            <div class="projects-grid">
                <!-- Example project -->
                <div class="project-item">
                    <img src="https://placehold.co/400x250/800080/FFFFFF?text=Proyecto+1" alt="Proyecto 1">
                    <div class="project-item-title">Letras 3D para Tienda</div>
                </div>
                <!-- Another example project -->
                <div class="project-item">
                    <img src="https://placehold.co/400x250/00FF00/000000?text=Proyecto+2" alt="Proyecto 2">
                    <div class="project-item-title">Anuncio Luminoso Restaurante</div>
                </div>
                <!-- You can add more projects here -->
                <div class="project-item">
                    <img src="https://placehold.co/400x250/4A5568/FFFFFF?text=Proyecto+3" alt="Proyecto 3">
                    <div class="project-item-title">Caja de Luz Creativa</div>
                </div>
                <div class="project-item">
                    <img src="https://placehold.co/400x250/800080/FFFFFF?text=Proyecto+4" alt="Proyecto 4">
                    <div class="project-item-title">Corte CNC para Decoración</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables globales de Three.js
        let scene, camera, renderer;
        let textGroup; // Grupo para los elementos de texto 3D
        let mouseX = 0, mouseY = 0;
        let targetRotationX = 0, targetRotationY = 0;
        // Factores de escala para la interacción del ratón
        const mouseMovementScale = 0.003; // Controla cuánto se mueve el texto con el ratón (reducido aún más)
        const mouseRotationScale = 0.0015; // Controla la sensibilidad de rotación (reducido aún más)
        const windowHalfX = window.innerWidth / 2;
        const windowHalfY = window.innerHeight / 2;
        let goldenStars; // Variable para el sistema de partículas doradas

        // Offset para mover el logo completo a la derecha (declarado globalmente)
        const logoOffsetX = 2.0; // Ajustado a 2.0 para moverlo un poco a la izquierda y centrarlo
        // Offset para mover el logo completo hacia arriba (declarado globalmente)
        const logoOffsetY = 2.0; // Se mantiene igual
        // Posiciones base para el logo en el espacio 3D (declarado globalmente)
        const baseLogoXPosition = 0; // Centrado horizontalmente
        const baseLogoYPosition = 0; // Centrado verticalmente


        /**
         * Inicializa la escena de Three.js, la cámara, el renderizador, las luces y el texto 3D.
         */
        function init() {
            const canvas = document.getElementById('heroCanvas');

            // Configuración de la escena
            scene = new THREE.Scene();
            // Fondo blanco para la escena de Three.js
            scene.background = new THREE.Color(0xFFFFFF);

            // Configuración de la cámara
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 7; // Posición de la cámara ajustada para asegurar que el texto sea completamente visible y centrado

            // Configuración del renderizador
            renderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(window.devicePixelRatio);

            // Iluminación
            const ambientLight = new THREE.AmbientLight(0x404040, 2); // Luz ambiental para iluminación general
            scene.add(ambientLight);

            const directionalLight1 = new THREE.DirectionalLight(0xffffff, 1); // Luz direccional blanca
            directionalLight1.position.set(0, 1, 1).normalize();
            scene.add(directionalLight1);

            const directionalLight2 = new THREE.DirectionalLight(0xffffff, 0.8); // Otra luz direccional
            directionalLight2.position.set(0, -1, -1).normalize();
            scene.add(directionalLight2);

            // Carga la fuente y crea el texto 3D
            const loader = new THREE.FontLoader();
            loader.load('https://cdn.jsdelivr.net/npm/three@0.128.0/examples/fonts/helvetiker_regular.typeface.json', function (font) {
                const textOptions = {
                    font: font,
                    size: 1.0, // Tamaño del texto
                    height: 0.2, // Profundidad de extrusión
                    curveSegments: 12,
                    bevelEnabled: true,
                    bevelThickness: 0.03,
                    bevelSize: 0.02,
                    bevelOffset: 0,
                    bevelSegments: 5
                };

                // Geometría para "imaginarte"
                const geometryImaginarte = new THREE.TextGeometry('imaginarte', textOptions);
                geometryImaginarte.computeBoundingBox();
                geometryImaginarte.center(); // Centra la geometría para facilitar el posicionamiento

                // Geometría para "3D"
                const geometry3D = new THREE.TextGeometry('3D', textOptions);
                geometry3D.computeBoundingBox();
                geometry3D.center(); // Centra la geometría para facilitar el posicionamiento

                // Material para "imaginarte" (Morado)
                const materialImaginarte = new THREE.MeshPhysicalMaterial({
                    color: 0x800080, // Morado vibrante
                    metalness: 0.9,
                    roughness: 0.2,
                    clearcoat: 0.8,
                    clearcoatRoughness: 0.1,
                    reflectivity: 0.3,
                    emissive: 0x800080, // Color de emisión para el brillo
                    emissiveIntensity: 0.8 // Intensidad de emisión base
                });

                // Material para "3D" (Verde)
                const material3D = new THREE.MeshPhysicalMaterial({
                    color: 0x00FF00, // Verde vibrante
                    metalness: 0.9,
                    roughness: 0.2,
                    clearcoat: 0.8,
                    clearcoatRoughness: 0.1,
                    reflectivity: 0.3,
                    emissive: 0x00FF00, // Color de emisión para el brillo
                    emissiveIntensity: 0.8 // Intensidad de emisión base
                });

                // Crea las mallas
                const meshImaginarte = new THREE.Mesh(geometryImaginarte, materialImaginarte);
                const mesh3D = new THREE.Mesh(geometry3D, material3D);

                // Calcula el ancho de cada texto para posicionarlos uno al lado del otro
                const widthImaginarte = geometryImaginarte.boundingBox.max.x - geometryImaginarte.boundingBox.min.x;
                const width3D = geometry3D.boundingBox.max.x - geometry3D.boundingBox.min.x;
                const spacing = 0.3; // Espacio entre palabras

                // Crea un grupo para contener ambas mallas
                textGroup = new THREE.Group();

                // Posiciona las mallas dentro del grupo
                meshImaginarte.position.x = -(widthImaginarte + spacing) / 2;
                mesh3D.position.x = (width3D + spacing) / 2;

                textGroup.add(meshImaginarte);
                textGroup.add(mesh3D);

                // Posición inicial del grupo (centrado en la escena)
                // Se añade logoOffsetX y logoOffsetY para desplazar el logo completo
                textGroup.position.x = baseLogoXPosition + logoOffsetX;
                textGroup.position.y = baseLogoYPosition + logoOffsetY;
                // Almacena los materiales en textGroup para acceso dinámico en animate()
                textGroup.materialImaginarte = materialImaginarte;
                textGroup.material3D = material3D;

                scene.add(textGroup);
            }, undefined, function(err) {
                console.error('Error al cargar la fuente:', err);
            });

            // Crea destellos de estrellas doradas
            const goldenStarGeometry = new THREE.BufferGeometry();
            const goldenStarMaterial = new THREE.PointsMaterial({
                color: 0xFFD700, // Color dorado
                size: 0.08,      // Tamaño de cada partícula
                sizeAttenuation: true, // Las partículas más lejanas se ven más pequeñas
                transparent: true,
                opacity: 0.7,    // Opacidad
                blending: THREE.AdditiveBlending // Para un efecto de brillo más intenso
            });

            const goldenStarVertices = [];
            for (let i = 0; i < 1000; i++) { // 1000 partículas doradas
                const x = (Math.random() - 0.5) * 100; // Rango de -50 a 50
                const y = (Math.random() - 0.5) * 100;
                const z = (Math.random() - 0.5) * 100;
                goldenStarVertices.push(x, y, z);
            }
            goldenStarGeometry.setAttribute('position', new THREE.Float32BufferAttribute(goldenStarVertices, 3));
            goldenStars = new THREE.Points(goldenStarGeometry, goldenStarMaterial);
            scene.add(goldenStars);

            // Escuchadores de eventos para la interactividad
            document.addEventListener('mousemove', onDocumentMouseMove);
            window.addEventListener('resize', onWindowResize);

            // Inicia el bucle de animación
            animate();
        }

        /**
         * Actualiza las coordenadas del ratón basándose en el movimiento del mismo.
         * @param {MouseEvent} event - El evento de movimiento del ratón.
         */
        function onDocumentMouseMove(event) {
            mouseX = event.clientX - windowHalfX;
            mouseY = event.clientY - windowHalfY;
        }

        /**
         * Maneja los eventos de redimensionamiento de la ventana para actualizar la relación de aspecto de la cámara y el tamaño del renderizador.
         */
        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        /**
         * Bucle de animación para la escena de Three.js.
         */
        function animate() {
            requestAnimationFrame(animate); // Solicita el siguiente fotograma

            if (textGroup && textGroup.materialImaginarte && textGroup.material3D) {
                // Suaviza la rotación del texto hacia la posición del ratón
                targetRotationY = mouseX * mouseRotationScale;
                targetRotationX = mouseY * mouseRotationScale;

                textGroup.rotation.y += (targetRotationY - textGroup.rotation.y) * 0.05;
                textGroup.rotation.x += (targetRotationX - textGroup.rotation.x) * 0.05;

                // Mueve el texto 3D en la pantalla según la posición del ratón
                // Se añade logoOffsetX y logoOffsetY a la posición final para desplazar el logo completo
                textGroup.position.x += ((mouseX * mouseMovementScale) + logoOffsetX - textGroup.position.x) * 0.1;
                textGroup.position.y += ((-mouseY * mouseMovementScale) + logoOffsetY - textGroup.position.y) * 0.1; // Invierte el eje Y

                // Lógica de iluminación dinámica/brillo
                const maxDistance = Math.sqrt(windowHalfX * windowHalfX + windowHalfY * windowHalfY);
                const currentDistance = Math.sqrt(mouseX * mouseX + mouseY * mouseY);
                let glowFactor = currentDistance / maxDistance; // Normaliza a 0-1
                glowFactor = Math.min(1, glowFactor * 1.5); // Impulsa y limita a 1 para un efecto más notorio

                const baseEmissiveIntensity = 0.8; // Brillo base aumentado
                const dynamicEmissiveBoost = 0.2; // Brillo adicional que se puede añadir

                textGroup.materialImaginarte.emissiveIntensity = baseEmissiveIntensity + (glowFactor * dynamicEmissiveBoost);
                textGroup.material3D.emissiveIntensity = baseEmissiveIntensity + (glowFactor * dynamicEmissiveBoost);
            }

            // Anima los destellos de estrellas doradas (esto es un efecto de fondo y no parte del movimiento del logo)
            if (goldenStars) {
                goldenStars.rotation.y += 0.0005; // Rotación lenta en Y
                goldenStars.rotation.x += 0.0003; // Rotación lenta en X
            }

            renderer.render(scene, camera); // Renderiza la escena
        }

        // Lógica del modal
        const exploreProjectsBtn = document.getElementById('exploreProjectsBtn');
        const projectsModal = document.getElementById('projectsModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        exploreProjectsBtn.addEventListener('click', () => {
            projectsModal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Evita el scroll del body cuando el modal está abierto
        });

        closeModalBtn.addEventListener('click', () => {
            projectsModal.classList.remove('show');
            document.body.style.overflow = 'auto'; // Restaura el scroll del body
        });

        // Cerrar modal al hacer clic fuera de él
        projectsModal.addEventListener('click', (event) => {
            if (event.target === projectsModal) {
                projectsModal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });

        // Inicializa Three.js cuando la ventana se carga
        window.onload = init;
    </script>
</body>
</html>
