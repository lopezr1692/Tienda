<x-app-layout>
    <x-slot name="header">
        <h2 class="w-full text-center text-xl font-semibold leading-tight text-gray-800">
            {{ __('Panel de administración') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-7">
                <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    {{ __('Bienvenido, :name', ['name' => auth()->user()->name]) }}
                </p>
                <p class="mt-2 text-sm text-gray-600 sm:text-base">
                    {{ __('Gestiona los módulos y funciones principales de la aplicación.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('products.index') }}" class="flex h-full min-h-56 flex-col rounded-xl border border-indigo-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <div class="flex items-start justify-between">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5v13.5H3.75V5.25Zm0 4.5h16.5M8.25 5.25v13.5" />
                            </svg>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">{{ __('Disponible') }}</span>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900">{{ __('Productos') }}</h3>
                    <p class="mt-2 flex-1 text-sm leading-5 text-gray-600">{{ __('Gestiona el catálogo, precios y disponibilidad de productos.') }}</p>
                    <span class="mt-4 inline-flex items-center text-sm font-semibold text-indigo-600">
                        {{ __('Gestionar productos') }}
                        <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </span>
                </a>

                @foreach ([
                    ['title' => 'Usuarios', 'description' => 'Administra usuarios, accesos y estado de verificación.', 'icon' => 'user'],
                    ['title' => 'Políticas', 'description' => 'Gestiona reglas de autorización y permisos del sistema.', 'icon' => 'shield'],
                    ['title' => 'Seguridad', 'description' => 'Consulta controles, validaciones y estado de seguridad.', 'icon' => 'lock'],
                    ['title' => 'Auditoría', 'description' => 'Revisa eventos y actividades importantes del sistema.', 'icon' => 'chart'],
                    ['title' => 'Configuración', 'description' => 'Personaliza los parámetros generales de la aplicación.', 'icon' => 'settings'],
                ] as $module)
                    <div class="flex h-full min-h-56 flex-col rounded-xl border border-gray-200 bg-gray-50 p-5 shadow-sm">
                        <div class="flex items-start justify-between">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-200 text-gray-500">
                                @if ($module['icon'] === 'user')
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" /></svg>
                                @elseif ($module['icon'] === 'shield')
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3.75 19.5 6v5.25c0 4.5-3 7.5-7.5 9-4.5-1.5-7.5-4.5-7.5-9V6L12 3.75Z" /></svg>
                                @elseif ($module['icon'] === 'lock')
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 10.5V8.25a4.5 4.5 0 0 1 9 0v2.25m-10.5 0h12v9h-12v-9Z" /></svg>
                                @elseif ($module['icon'] === 'chart')
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5v-6m5 6V9m5 10.5V4.5m5 15v-3" /></svg>
                                @else
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 4.5h3l.6 2.1a6.8 6.8 0 0 1 1.5.9l2.1-.6 1.5 2.6-1.5 1.5a6.8 6.8 0 0 1 0 1.8l1.5 1.5-1.5 2.6-2.1-.6a6.8 6.8 0 0 1-1.5.9l-.6 2.1h-3l-.6-2.1a6.8 6.8 0 0 1-1.5-.9l-2.1.6-1.5-2.6 1.5-1.5a6.8 6.8 0 0 1 0-1.8L4.8 9.5l1.5-2.6 2.1.6a6.8 6.8 0 0 1 1.5-.9l.6-2.1Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M14.25 12a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" /></svg>
                                @endif
                            </div>
                            <span class="rounded-full bg-gray-200 px-2.5 py-1 text-xs font-semibold text-gray-600">{{ __('Próximamente') }}</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-gray-700">{{ __($module['title']) }}</h3>
                        <p class="mt-2 flex-1 text-sm leading-5 text-gray-500">{{ __($module['description']) }}</p>
                        <button type="button" disabled class="mt-4 inline-flex w-fit cursor-not-allowed items-center rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-500">
                            {{ __('Próximamente') }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
