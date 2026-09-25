<div x-data="{ sidebarOpen: false }">
    <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden" @click="sidebarOpen = false">
    </div>

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-60 -translate-x-full flex-col bg-slate-950 text-slate-300 transition-transform duration-300 lg:translate-x-0"
        :class="{ 'translate-x-0': sidebarOpen }">
        <a href="{{ url('/') }}" class="flex items-center h-16 mb-4 px-5 border-b border-white/10">
            <svg class="w-8 h-8 shrink-0" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01a.814.814 0 0 1-.798 0L.4 39.944A.8.8 0 0 1 0 39.25V6.334c0-.1.02-.198.057-.289a.814.814 0 0 1 .344-.403L19.823.024a.814.814 0 0 1 .798 0l19.422 11.107c.17.097.299.243.364.41l.031.023h-.012ZM48.453 22.528v-9.24l-3.868 2.23-5.342 3.072v9.241l9.21-5.303Zm-10.01 17.217v-9.246l-5.267 3.013-15.049 8.65v9.339l20.315-11.756ZM1.601 7.389v31.086L21.916 49.94v-9.339l-10.64-6.007-.022-.015-.023-.017c-.143-.1-.241-.241-.288-.396a.8.8 0 0 1-.029-.207V14.86L5.47 11.79 1.6 9.56V7.39Zm18.024-5.962L2.413 11.188l7.176 4.144 9.196-5.303 9.202 5.303 7.176-4.144-7.54-4.311v-.002ZM11.001 36.626l10.91 6.149 10.9-6.149V15.739l-4.498 2.59-6.402 3.695v20.882l-.802.462-.803-.462V22.024l-6.403-3.695-3.9-2.25-.902.519V36.626Z"
                    fill="#FF2D20" />
            </svg>
            <span class="mx-3 h-6 w-px bg-slate-600"></span>
            <span class="text-lg font-bold tracking-tight text-white">Tienda</span>
        </a>

        <div class="flex-1 overflow-y-auto px-4 py-6">
            {{-- Sección: Workspace (solo Dashboard) --}}
            <p class="block w-full text-center text-xs font-semibold uppercase tracking-widest text-slate-500">
                {{ __('Workspace') }}</p>
            <a href="{{ route('dashboard') }}"
                class="mt-4 flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-950/30' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m3 10 9-7 9 7v10.25A1.75 1.75 0 0 1 19.25 22H4.75A1.75 1.75 0 0 1 3 20.25V10Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 22v-7h6v7" />
                </svg>
                {{ __('Dashboard') }}
            </a>

            {{-- Sección: Administración (Productos activo + módulos futuros) --}}
            <p class="mt-10 block w-full text-center text-xs font-semibold uppercase tracking-widest text-slate-500">
                {{ __('Administración') }}</p>
            <div class="mt-4 space-y-1">
                {{-- Productos: enlace activo --}}
                <a href="{{ route('products.index') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('products.*') ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-950/30' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.25h16.5v13.5H3.75V5.25Zm0 4.5h16.5M8.25 5.25v13.5" />
                    </svg>
                    {{ __('Productos') }}
                </a>
                {{-- Módulos futuros (deshabilitados) --}}
                @foreach ([
                        ['label' => 'Usuarios', 'icon' => 'M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM4 21a8 8 0 0 1 16 0'],
                        ['label' => 'Políticas', 'icon' => 'M12 3.75 19.5 6v5.25c0 4.5-3 7.5-7.5 9-4.5-1.5-7.5-4.5-7.5-9V6L12 3.75Z'],
                        ['label' => 'Seguridad', 'icon' => 'M7.5 10.5V8.25a4.5 4.5 0 0 1 9 0v2.25m-10.5 0h12v9h-12v-9Z'],
                        ['label' => 'Auditoría', 'icon' => 'M4.5 19.5v-6m5 6V9m5 10.5V4.5m5 15v-3'],
                        ['label' => 'Configuración', 'icon' => 'M12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Z'],
                    ] as $item)
                    <div class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-600">
                        <svg class="h-5 w-5 shrink-0 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="flex-1">{{ __($item['label']) }}</span>
                        <span
                            class="rounded-full bg-white/10 px-2 py-0.5 text-[10px] font-medium text-slate-500">{{ __('Próximo') }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-t border-white/10 p-4">
            <a href="{{ url('/') }}"
                class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-slate-400 transition hover:bg-white/10 hover:text-white">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                {{ __('Volver al inicio') }}
            </a>
        </div>
    </aside>

    <div class="flex h-20 items-center justify-between border-b border-slate-200 bg-white px-4 lg:hidden">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <svg class="w-8 h-8 shrink-0" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01a.814.814 0 0 1-.798 0L.4 39.944A.8.8 0 0 1 0 39.25V6.334c0-.1.02-.198.057-.289a.814.814 0 0 1 .344-.403L19.823.024a.814.814 0 0 1 .798 0l19.422 11.107c.17.097.299.243.364.41l.031.023h-.012ZM48.453 22.528v-9.24l-3.868 2.23-5.342 3.072v9.241l9.21-5.303Zm-10.01 17.217v-9.246l-5.267 3.013-15.049 8.65v9.339l20.315-11.756ZM1.601 7.389v31.086L21.916 49.94v-9.339l-10.64-6.007-.022-.015-.023-.017c-.143-.1-.241-.241-.288-.396a.8.8 0 0 1-.029-.207V14.86L5.47 11.79 1.6 9.56V7.39Zm18.024-5.962L2.413 11.188l7.176 4.144 9.196-5.303 9.202 5.303 7.176-4.144-7.54-4.311v-.002ZM11.001 36.626l10.91 6.149 10.9-6.149V15.739l-4.498 2.59-6.402 3.695v20.882l-.802.462-.803-.462V22.024l-6.403-3.695-3.9-2.25-.902.519V36.626Z"
                    fill="#FF2D20" />
            </svg>
            <span class="h-5 w-px bg-slate-300"></span>
            <span class="text-base font-bold tracking-tight text-slate-900">Tienda</span>
        </a>
        <button type="button" @click="sidebarOpen = !sidebarOpen"
            class="lg:hidden rounded-lg p-2 text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            aria-label="{{ __('Abrir menú') }}" :aria-expanded="sidebarOpen">
            <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="sidebarOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div
        class="sticky top-0 z-30 hidden min-h-20 items-center border-b border-slate-200 bg-white px-4 sm:px-6 lg:flex lg:pl-60">
        <div class="hidden lg:flex items-center ml-auto gap-4">
            <div class="hidden text-right sm:block">
                <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
            </div>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700 transition hover:bg-indigo-200">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>