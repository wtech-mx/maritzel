<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaginarte 3D - Letras 3D Profesionales</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Inter:wght@300;400;600&display=swap');

        .text-3d {
            font-family: 'Orbitron', monospace;
            text-shadow:
                0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 3px 0 #bbb,
                0 4px 0 #b9b9b9,
                0 5px 0 #aaa,
                0 6px 1px rgba(0,0,0,.1),
                0 0 5px rgba(0,0,0,.1),
                0 1px 3px rgba(0,0,0,.3),
                0 3px 5px rgba(0,0,0,.2),
                0 5px 10px rgba(0,0,0,.25);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-3d {
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
        }

        .card-3d:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }

        .letter-showcase {
            font-family: 'Orbitron', monospace;
            font-weight: 900;
            font-size: 4rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Header -->
    <header class="gradient-bg text-white py-6 shadow-2xl">
        <div class="container mx-auto px-6">
            <nav class="flex justify-between items-center">
                <div class="text-3xl font-bold">
                    <span class="text-white">IMAGINARTE</span>
                    <span class="text-green-400 text-3d">3D</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#inicio" class="hover:text-yellow-300 transition-colors duration-300">Inicio</a>
                    <a href="#servicios" class="hover:text-yellow-300 transition-colors duration-300">Servicios</a>
                    <a href="#favoritos" class="hover:text-yellow-300 transition-colors duration-300">Favoritos</a>
                    <a href="#galeria" class="hover:text-yellow-300 transition-colors duration-300">Galería</a>
                    <a href="#contacto" class="hover:text-yellow-300 transition-colors duration-300">Contacto</a>
                </div>
                <button class="md:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <div class="floating mb-8">
                <div class="letter-showcase">3D</div>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-3d">
                Letras 3D que Cobran Vida
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Transformamos tus ideas en impresionantes letras tridimensionales.
                Diseño, creatividad y tecnología al servicio de tu marca.
            </p>
            <button onclick="scrollToSection('contacto')" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300 shadow-lg">
                Solicita tu Cotización
            </button>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">Nuestros Servicios</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-3d bg-white p-8 rounded-xl shadow-xl border border-gray-100">
                    <div class="text-5xl mb-4">🎨</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Diseño Personalizado</h3>
                    <p class="text-gray-600 mb-6">Creamos letras 3D únicas adaptadas a tu marca y estilo. Cada proyecto es una obra de arte personalizada.</p>
                    <ul class="text-sm text-gray-500 space-y-2">
                        <li>• Diseño desde cero</li>
                        <li>• Múltiples opciones de estilo</li>
                        <li>• Revisiones incluidas</li>
                    </ul>
                </div>

                <div class="card-3d bg-white p-8 rounded-xl shadow-xl border border-gray-100">
                    <div class="text-5xl mb-4">🏭</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Fabricación</h3>
                    <p class="text-gray-600 mb-6">Utilizamos tecnología de vanguardia para materializar tus letras 3D con la máxima calidad y precisión.</p>
                    <ul class="text-sm text-gray-500 space-y-2">
                        <li>• Materiales premium</li>
                        <li>• Tecnología avanzada</li>
                        <li>• Control de calidad</li>
                    </ul>
                </div>

                <div class="card-3d bg-white p-8 rounded-xl shadow-xl border border-gray-100">
                    <div class="text-5xl mb-4">🚚</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Instalación</h3>
                    <p class="text-gray-600 mb-6">Servicio completo de instalación profesional. Nos encargamos de que tu proyecto quede perfecto.</p>
                    <ul class="text-sm text-gray-500 space-y-2">
                        <li>• Instalación profesional</li>
                        <li>• Garantía de servicio</li>
                        <li>• Mantenimiento incluido</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Favorites Section -->
    <section id="favoritos" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-4 text-gray-800">Proyectos Favoritos</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">Los diseños más populares y exitosos de nuestros clientes. Estas letras 3D han marcado la diferencia en sus negocios.</p>

            <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Favorite 1 -->
                <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="text-3xl mr-3">⭐</div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">RESTAURANT</h3>
                                <p class="text-gray-600">Más de 500 pedidos similares</p>
                            </div>
                        </div>
                        <div class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                            #1 Favorito
                        </div>
                    </div>
                    <div class="h-40 bg-gradient-to-br from-orange-400 to-red-600 rounded-xl flex items-center justify-center mb-6">
                        <div class="text-white text-5xl font-bold text-3d">RESTAURANT</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-purple-600">500+</div>
                            <div class="text-sm text-gray-600">Proyectos</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-purple-600">98%</div>
                            <div class="text-sm text-gray-600">Satisfacción</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-purple-600">4.9★</div>
                            <div class="text-sm text-gray-600">Rating</div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 2 -->
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="text-3xl mr-3">🏆</div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">BOUTIQUE</h3>
                                <p class="text-gray-600">Diseño más premiado</p>
                            </div>
                        </div>
                        <div class="bg-green-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Premiado
                        </div>
                    </div>
                    <div class="h-40 bg-gradient-to-br from-pink-400 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <div class="text-white text-5xl font-bold text-3d">BOUTIQUE</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-teal-600">250+</div>
                            <div class="text-sm text-gray-600">Proyectos</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-teal-600">100%</div>
                            <div class="text-sm text-gray-600">Satisfacción</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-teal-600">5.0★</div>
                            <div class="text-sm text-gray-600">Rating</div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 3 -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="text-3xl mr-3">🔥</div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">OFFICE</h3>
                                <p class="text-gray-600">Tendencia corporativa</p>
                            </div>
                        </div>
                        <div class="bg-orange-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Trending
                        </div>
                    </div>
                    <div class="h-40 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl flex items-center justify-center mb-6">
                        <div class="text-white text-5xl font-bold text-3d">OFFICE</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-orange-600">300+</div>
                            <div class="text-sm text-gray-600">Proyectos</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-orange-600">96%</div>
                            <div class="text-sm text-gray-600">Satisfacción</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-orange-600">4.8★</div>
                            <div class="text-sm text-gray-600">Rating</div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 4 -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="text-3xl mr-3">💎</div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">LUXURY</h3>
                                <p class="text-gray-600">Diseño premium exclusivo</p>
                            </div>
                        </div>
                        <div class="bg-pink-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Premium
                        </div>
                    </div>
                    <div class="h-40 bg-gradient-to-br from-gold-400 to-yellow-600 rounded-xl flex items-center justify-center mb-6" style="background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);">
                        <div class="text-gray-900 text-5xl font-bold text-3d">LUXURY</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-pink-600">150+</div>
                            <div class="text-sm text-gray-600">Proyectos</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-pink-600">100%</div>
                            <div class="text-sm text-gray-600">Satisfacción</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-pink-600">5.0★</div>
                            <div class="text-sm text-gray-600">Rating</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button onclick="scrollToSection('contacto')" class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-purple-700 hover:to-blue-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    Solicita tu Diseño Favorito
                </button>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeria" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">Galería de Proyectos</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">LOGO</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Letras Corporativas</h3>
                        <p class="text-gray-600">Diseño elegante para oficinas corporativas</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-pink-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">CAFÉ</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Señalización Comercial</h3>
                        <p class="text-gray-600">Letras llamativas para restaurantes</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-blue-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">HOTEL</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Hospitalidad</h3>
                        <p class="text-gray-600">Diseños sofisticados para hoteles</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">SHOP</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Retail</h3>
                        <p class="text-gray-600">Letras atractivas para tiendas</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">EVENT</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Eventos</h3>
                        <p class="text-gray-600">Letras espectaculares para eventos</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-600 flex items-center justify-center">
                        <div class="text-white text-4xl font-bold text-3d">HOME</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Decoración</h3>
                        <p class="text-gray-600">Letras personalizadas para el hogar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-20 gradient-bg text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">Contáctanos</h2>
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <div>
                    <h3 class="text-2xl font-semibold mb-6">¿Listo para tu proyecto?</h3>
                    <p class="text-lg mb-8 opacity-90">
                        Estamos aquí para hacer realidad tus ideas. Contáctanos y recibe una cotización personalizada para tu proyecto de letras 3D.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="text-2xl mr-4">📧</div>
                            <div>
                                <div class="font-semibold">Email</div>
                                <div class="opacity-80">info@imaginarte3d.com</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="text-2xl mr-4">📱</div>
                            <div>
                                <div class="font-semibold">Teléfono</div>
                                <div class="opacity-80">+1 (555) 123-4567</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="text-2xl mr-4">📍</div>
                            <div>
                                <div class="font-semibold">Ubicación</div>
                                <div class="opacity-80">Ciudad, País</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 p-8 rounded-xl backdrop-blur-sm">
                    <form class="space-y-6" onsubmit="handleSubmit(event)">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nombre</label>
                            <input type="text" required class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Tu nombre completo">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" required class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="tu@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Proyecto</label>
                            <textarea required rows="4" class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-white placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cuéntanos sobre tu proyecto de letras 3D..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors duration-300">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="text-2xl font-bold mb-4">
                        <span class="text-white">IMAGINARTE</span>
                        <span class="text-green-400 text-3d">3D</span>
                    </div>
                    <p class="text-gray-400">Especialistas en letras 3D y señalización personalizada. Transformamos ideas en realidad tridimensional.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Servicios</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Diseño 3D</li>
                        <li>Fabricación</li>
                        <li>Instalación</li>
                        <li>Mantenimiento</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Instagram</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Imaginarte 3D. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }

        function handleSubmit(event) {
            event.preventDefault();
            alert('¡Gracias por tu mensaje! Te contactaremos pronto para discutir tu proyecto de letras 3D.');
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96b237923630a634',t:'MTc1NDUyMTkyNS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
