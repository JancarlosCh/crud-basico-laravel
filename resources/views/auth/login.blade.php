@extends('theme.base')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="container-fluid">
        <div class="container-sm mt-5">
            <h1 class="text-center">Formulario de inicio de sesión</h1>
            @if (Session::has('wrongCredentials'))
            <div class="alert alert-danger" role="alert">{{ Session::get('wrongCredentials') }}</div>
            @endif
            <form action="{{ route('auth.session.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                        <p class="form-text text-danger">{{ $message }}</p>
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
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
@endsection
