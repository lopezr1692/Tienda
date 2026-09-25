@extends('layouts.main')

@section('contenido')
    <div class="px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-wide text-indigo-600">{{ __('Catálogo') }}</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Nuevo producto') }}</h1>
                <p class="mt-2 text-sm text-slate-500">{{ __('Añade un producto al catálogo.') }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="description" class="block text-sm font-semibold text-slate-700">{{ __('Descripción') }}</label>
                        <input id="description" type="text" name="description" value="{{ old('description') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('description')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-semibold text-slate-700">{{ __('Precio') }}</label>
                        <input id="price" type="number" name="price" value="{{ old('price') }}" min="0" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('price')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">{{ __('Cancelar') }}</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Guardar producto') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
