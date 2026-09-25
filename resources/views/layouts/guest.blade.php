<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Tienda') }}</title>
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

        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-6">
            {{-- Bloque de marca: [Logo indigo] | Tienda --}}
            <div class="mb-8">
                <a href="{{ url('/') }}" class="flex items-center gap-4">
                    <svg class="h-10 w-10 shrink-0 text-indigo-500" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01a.814.814 0 0 1-.798 0L.4 39.944A.8.8 0 0 1 0 39.25V6.334c0-.1.02-.198.057-.289a.814.814 0 0 1 .344-.403L19.823.024a.814.814 0 0 1 .798 0l19.422 11.107c.17.097.299.243.364.41l.031.023h-.012ZM48.453 22.528v-9.24l-3.868 2.23-5.342 3.072v9.241l9.21-5.303Zm-10.01 17.217v-9.246l-5.267 3.013-15.049 8.65v9.339l20.315-11.756ZM1.601 7.389v31.086L21.916 49.94v-9.339l-10.64-6.007-.022-.015-.023-.017c-.143-.1-.241-.241-.288-.396a.8.8 0 0 1-.029-.207V14.86L5.47 11.79 1.6 9.56V7.39Zm18.024-5.962L2.413 11.188l7.176 4.144 9.196-5.303 9.202 5.303 7.176-4.144-7.54-4.311v-.002ZM11.001 36.626l10.91 6.149 10.9-6.149V15.739l-4.498 2.59-6.402 3.695v20.882l-.802.462-.803-.462V22.024l-6.403-3.695-3.9-2.25-.902.519V36.626Z" fill="currentColor"/>
                    </svg>
                    <span class="h-8 w-px bg-slate-600"></span>
                    <span class="text-2xl font-bold tracking-tight text-white">Tienda</span>
                </a>
            </div>

            {{-- Tarjeta del formulario --}}
            <div class="w-full sm:max-w-md rounded-xl border border-slate-800 bg-slate-900 px-8 py-8 shadow-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
