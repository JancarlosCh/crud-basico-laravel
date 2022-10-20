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
                        <a class="nav-link active" href="{{ route('categories.index') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection --}}

@section('title', 'Categorías')

@section('content')
    <div class="container-fluid">
        <h1 class="my-5 text-center">Módulo de categorías</h1>
        @if (Session::has('saved'))
            <div class="alert alert-success" role="alert">{{ Session::get('saved') }}</div>
        @endif
        @if (Session::has('updated'))
            <div class="alert alert-info" role="alert">{{ Session::get('updated') }}</div>
        @endif
        @if (Session::has('deleted'))
            <div class="alert alert-warning" role="alert">{{ Session::get('deleted') }}</div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nueva Categoría</a>
        <table class="table table-striped">
            <caption>Lista de categorías</caption>
            <thead class="table-dark">
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $data)
                    <tr>
                        <td>{{ $data->category }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('categories.edit', $data)}}" class="btn btn-warning px-3 me-1">Editar</a>
                                <form action="{{ route('categories.destroy', $data) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-2 ms-1">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
@endsection
