@extends('theme.base')

@section('title', 'Categorías')

@section('content')
    <div class="containter-fluid">
        <div class="container-sm">
            <h1 class="text-center mt-3 mb-5">Formulario de categorías</h1>
            @if (Session::has('success'))
                <p>{{ Session::get('success') }}</p>
            @endif
            @if (isset($categoryData))
                <form action="{{ route('categories.update', $categoryData) }}" method="POST">
                    @csrf
                    @method('PUT')
            @else
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
            @endif
                <div class="mb-3">
                    <label for="category-name" class="form-label">Categoría:</label>
                    <input type="text" name="category" id="category" class="form-control"
                        value="{{ old('category') ?? @$categoryData->category }}">
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category-description" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') ?? @$categoryData->description }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        @if (isset($categoryData))
                            Actualizar Categoría
                        @else
                            Guardar Categoría
                        @endif
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
