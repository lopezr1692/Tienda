<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('products.index');
})->middleware(['auth', 'verified'])->name('products.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products', function(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    })->name('products.index');
    
    Route::get('products/create',function(){
        return view('products.create');
    })->name('products.create');
    
    Route::post('products', function(Request $request){
        $newProduct = new Product;
        $newProduct->description = $request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->save();
        return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
    })->name('products.save');
    
    Route::Delete('products/{Id}', function($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado correctamente');
    })->name('products.destroy');
    
    Route::get('products/{id}/edit', function($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');
    
    Route::put('/products/{id}', function (Request $request, $id){
        $product = Product::findOrFail($id);
        $product->description = $request->input(('description'));
        $product->price = $request->input(('price'));
        $product->save();
        return redirect()->route('products.index')->with('info', 'Producto editado correctamente');
    })->name('products.update');
});

require __DIR__.'/auth.php';

