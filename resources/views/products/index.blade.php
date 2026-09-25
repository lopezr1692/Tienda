@extends('layouts.main')

@section('contenido')
    <div class="px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-indigo-600">{{ __('Catálogo') }}</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Productos') }}</h1>
                    <p class="mt-2 text-sm text-slate-500">{{ __('Gestiona el catálogo, precios y disponibilidad de productos.') }}</p>
                </div>
                <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" /></svg>
                    {{ __('Nuevo producto') }}
                </a>
            </div>

            @if(session('info'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">{{ session('info') }}</div>
            @endif

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">{{ __('Descripción') }}</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">{{ __('Precio') }}</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($products as $product)
                                <tr class="transition hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-800">{{ $product->description }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">${{ number_format($product->price, 0) }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                        <a href="{{ route('products.edit', $product->id) }}" class="font-semibold text-indigo-600 hover:text-indigo-500">{{ __('Editar') }}</a>
                                        <form class="ml-4 inline" id="delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="font-semibold text-rose-600 hover:text-rose-500">{{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-sm text-slate-500">{{ __('No hay productos registrados.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
