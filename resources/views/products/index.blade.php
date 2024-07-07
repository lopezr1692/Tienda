@extends('layouts.main')
@section('contenido')
    <div class="container d-flex align-items-center justify-content-center" style="padding-top:30px"><br>
        <h4 class="position-absolute top-0 start-50 translate-middle-x" style="padding-top: 15px">APLICACION - INGENIERIA DE SOFTWARE</h4>
        <div class="row">
            <div class="col-md-12 align-items-center" style="padding-top: 15px">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-end">Nuevo</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                        <div class="alert alert-success">
                        {{ session('info')}}
                        </div>
                        @endif
                        <table class="table table-hover table-ms">
                            <thead>
                                <th>
                                    Descripcion
                                </th>
                                <th>
                                    Precio
                                </th>
                                <th>
                                    Accion
                                </th> 
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->description}}
                                    </td>
                                    <td>
                                    {{$product->price}}
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
