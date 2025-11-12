<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>imaginarte 3D - Logo Interactivo</title>
   <!-- Tailwind CSS CDN (used for basic body styling, can be removed if not needed) -->
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- Three.js CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
   <!-- Three.js FontLoader and TextGeometry for 3D text -->
   <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/FontLoader.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/geometries/TextGeometry.js"></script>
   <style>
       body {
           margin: 0;
           overflow: hidden; /* Evita el scroll ya que solo es el logo */
           font-family: 'Inter', sans-serif;
           /* Fondo para la escena de Three.js */
           background-color: #000; /* Fondo de reserva */
       }
       canvas {
           display: block;
           position: fixed;
           top: 0;
           left: 0;
           width: 100vw;
           height: 100vh;
           z-index: 0;
       }
   </style>
</head>
<body>
   <canvas id="heroCanvas"></canvas>


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


       /**
        * Inicializa la escena de Three.js, la cámara, el renderizador, las luces y el texto 3D.
        */
       function init() {
           const canvas = document.getElementById('heroCanvas');


           // Configuración de la escena
           scene = new THREE.Scene();
           // Carga una imagen de fondo espacial con tonos más claros y blancos
           const textureLoader = new THREE.TextureLoader();
           textureLoader.load('https://cdn.pixabay.com/photo/2018/08/11/20/38/milky-way-3599929_1280.jpg', function(texture) {
               scene.background = texture;
           }, undefined, function(err) {
               console.error('Error al cargar la textura de fondo:', err);
               scene.background = new THREE.Color(0x000000); // Fondo de reserva negro si la imagen falla
           });


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
               textGroup.position.x = 0;
               textGroup.position.y = 0;
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
               // El valor +3 para X se mantiene, y el valor Y se ha cambiado a 0 para moverlo más arriba.
               textGroup.position.x += ((mouseX * mouseMovementScale) - textGroup.position.x + 3) * 0.1;
               textGroup.position.y += ((-mouseY * mouseMovementScale) - textGroup.position.y + 0) * 0.1; // Invierte el eje Y


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


       // Inicializa Three.js cuando la ventana se carga
       window.onload = init;
   </script>
</body>
</html>
