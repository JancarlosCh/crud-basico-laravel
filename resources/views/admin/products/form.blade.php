@extends('theme.base')

@section('title', 'Productos')

@section('content')
    <div class="containter-fluid">
        <div class="container-sm">
            <h1 class="text-center mt-3 mb-5">Formulario de productos</h1>
            @if (isset($product))
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
            @else
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
            @endif
                <div class="mb-3">
                    <label for="product" class="form-label">Producto:</label>
                    <input type="text" name="product" id="product" class="form-control" value="{{ old('product') ?? @$product->product }}">
                    @error('product')
                        <p class="text-form text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descripton" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" cols="30" rows="" class="form-control">{{ old('description') ?? @$product->description }}</textarea>
                    @error('description')
                        <p class="text-form text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoría:</label>
                    <select name="category" id="category" class="form-select">
                    @isset($categories)
                        @if (isset($product))
                        <option value="">Seleccionar una categoría</option>
                            @foreach ( $categories as $category)
                                @php
                                    $selected = $category->id == $product->category_id;
                                @endphp
                                <option value="{{ $category->id }}" {{$selected ? 'selected' : ""}}>{{ $category->category}}</option>
                            @endforeach
                        @else
                        <option value="" selected>Seleccionar una categoría</option>
                            @foreach ( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category}}</option>
                            @endforeach
                        @endif
                    @endisset
                    </select>
                    @error('category')
                        <p class="text-form text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') ?? @$product->price }}">
                    @error('price')
                        <p class="text-form text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') ?? @$product->stock }}">
                    @error('stock')
                        <p class="text-form text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary mb-2">Guardar Producto</button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
