<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tienda de Productos</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-950 text-slate-300">
        {{-- Resplandor de fondo indigo --}}
        <div class="fixed inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute -top-40 -left-40 h-[600px] w-[600px] rounded-full bg-indigo-500/20 blur-[120px]"></div>
            <div class="absolute -bottom-40 -right-40 h-[500px] w-[500px] rounded-full bg-indigo-600/15 blur-[100px]"></div>
        </div>

        <div class="relative min-h-screen flex flex-col items-center justify-center px-6">
            <div class="w-full max-w-2xl">
                {{-- Navegación superior --}}
                <header class="flex items-center justify-between py-8">
                    <div></div>
                    @if (Route::has('login'))
                        <nav class="flex items-center gap-3">
                            @auth
                                <a href="{{ route('dashboard') }}"
                                   class="rounded-lg px-4 py-2 text-sm font-semibold text-slate-300 ring-1 ring-white/10 transition hover:bg-white/5 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                    Iniciar sesión
                                </a>
                            @endauth
                        </nav>
                    @endif
                </header>

                {{-- Bloque central de marca --}}
                <div class="flex flex-col items-center text-center mt-12 mb-16">
                    {{-- Logo | Tienda --}}
                    <a href="{{ url('/') }}" class="flex items-center gap-4">
                        <svg class="h-10 w-10 shrink-0 text-indigo-500" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01a.814.814 0 0 1-.798 0L.4 39.944A.8.8 0 0 1 0 39.25V6.334c0-.1.02-.198.057-.289a.814.814 0 0 1 .344-.403L19.823.024a.814.814 0 0 1 .798 0l19.422 11.107c.17.097.299.243.364.41l.031.023h-.012ZM48.453 22.528v-9.24l-3.868 2.23-5.342 3.072v9.241l9.21-5.303Zm-10.01 17.217v-9.246l-5.267 3.013-15.049 8.65v9.339l20.315-11.756ZM1.601 7.389v31.086L21.916 49.94v-9.339l-10.64-6.007-.022-.015-.023-.017c-.143-.1-.241-.241-.288-.396a.8.8 0 0 1-.029-.207V14.86L5.47 11.79 1.6 9.56V7.39Zm18.024-5.962L2.413 11.188l7.176 4.144 9.196-5.303 9.202 5.303 7.176-4.144-7.54-4.311v-.002ZM11.001 36.626l10.91 6.149 10.9-6.149V15.739l-4.498 2.59-6.402 3.695v20.882l-.802.462-.803-.462V22.024l-6.403-3.695-3.9-2.25-.902.519V36.626Z" fill="currentColor"/>
                        </svg>
                        <span class="h-8 w-px bg-slate-600"></span>
                        <span class="text-2xl font-bold tracking-tight text-white">Tienda</span>
                    </a>

                    {{-- Subtítulo --}}
                    <p class="mt-4 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                        Tienda de Productos
                    </p>
                </div>

                {{-- Tarjeta BIENVENIDO --}}
                <div class="mx-auto max-w-lg">
                    <a
                        @auth
                            href="{{ route('dashboard') }}"
                        @else
                            href="{{ route('login') }}"
                        @endauth
                        class="group flex flex-col items-center gap-6 rounded-xl border border-slate-800 bg-slate-900 p-8 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:border-indigo-500/30 hover:shadow-indigo-500/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 lg:p-10"
                    >
                        <div class="flex items-center gap-5">
                            {{-- Icono en contenedor redondeado indigo --}}
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-indigo-500/10">
                                <svg class="h-6 w-6 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l4.071-4.071A1.5 1.5 0 0 1 8.11 2h7.78a1.5 1.5 0 0 1 1.06.44l4.071 4.071a3.004 3.004 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v2.25c0 .414.336.75.75.75Z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-white">BIENVENIDO</h2>
                                <p class="mt-2 text-sm leading-relaxed text-slate-400">
                                    Acceda a la tienda de productos.
                                </p>
                            </div>

                            {{-- Flecha --}}
                            <svg class="h-5 w-5 shrink-0 text-indigo-400 transition group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0-6.75-6.75M19.5 12l-6.75 6.75"/>
                            </svg>
                        </div>
                    </a>
                </div>

                {{-- Footer sin versión --}}
                <footer class="py-12 text-center text-xs text-slate-600">
                    &copy; {{ date('Y') }} Tienda. Todos los derechos reservados.
                </footer>
            </div>
        </div>
    </body>
</html>
