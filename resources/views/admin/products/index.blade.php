@extends('theme.base')

{{-- @section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Stonline</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index' )}}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.index') }}">Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection --}}

@section('title', 'Productos')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-5 text-center">Módulo de productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mt-5 mb-3">Nuevo Producto</a>
        <table class="table table-striped">
            <caption>Lista de productos</caption>
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ isset($product->category) ? $product->category->category : "N/A"; }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('products.edit', $product)}}" class="btn btn-warning px-3 me-1">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-2 ms-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
