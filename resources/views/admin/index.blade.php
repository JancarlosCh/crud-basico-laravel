@extends('theme.base')

@section('title', 'Home ')

@section('content')
<div class="container-fluid">
    <h1 class="text-center mt-5">Bienvenido, {{ $name }}.</h1>
</div>
@endsection
