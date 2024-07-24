@extends('layouts.app')

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
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $post->name) }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">descripcion:</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description', $post->description) }}</textarea>
            </div>
            <div class="mb-3">
                @if ($post->main_image)
                    <img width="100" src="{{ asset('storage/' . $post->main_image) }}" alt="{{ $post->name }}">
                @else
                    <img width="50" src="{{ asset('assets/img/No-Image-Placeholder.svg') }}" alt="sin imagen">
                @endif
            </div>
            <div class=" mb-3 input-group">
                <label class="input-group-text" for="main_image">Imagen Principal</label>
                <input type="file" name="main_image" class="form-control" id="main_image">
            </div>
            @if (@auth()->user->role === 'admin')
            <div class="mb-3">
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->id }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
@endsection
