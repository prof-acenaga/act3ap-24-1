@extends('layouts.main')

@section('content')
<div class="col-12">
    <h1>Editar Usuario</h1>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.update', $user) }}" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}">
            </div>
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
