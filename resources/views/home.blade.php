
@extends('layouts.main')

@section('content')

<h1 class="text-test">Pagina de inicio</h1>



@if ($users)
    @foreach ($users as $user)
        <ul>
            <li>Nombre: {{ $user->name }}</li>
            <li>Nombre: {{ $user->email }}</li>
        </ul>
    @endforeach
@endif

<img src="{{ asset('assets/img/avatar.jpg') }}" alt="una imagen">

@endsection
