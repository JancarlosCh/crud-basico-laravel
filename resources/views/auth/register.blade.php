@extends('theme.base')

@section('title', 'Registrarse')

@section('content')
    <div class="container-fluid">
        <div class="container-sm mt-5">
            <h1 class="text-center">Formulario de registro</h1>
            <form action="{{ route('auth.register.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <p class="form-text text-danger" class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <p class="form-text text-danger" class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
@endsection
