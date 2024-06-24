@extends('layouts.main')

@section('content')
<div class="col-12">
    <h1>Usuarios</h1>
    <div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar usuario</a>
    </div>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
        </li>
        @endforeach
    </ul>

</div>

@endsection
