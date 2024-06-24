@extends('layouts.main')

@section('content')
    <div class="col-12">
        <h1>crear usuario</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">descripcion:</label>
                <textarea name="description" id="description" cols="30" rows="10"
                class="form-control"
                required></textarea>
            </div>
            <div class=" mb-3 input-group">
                <label class="input-group-text" for="main_image">Imagen Principal</label>
                <input type="file" name="main_image" class="form-control" id="main_image">
            </div>
            <div class="mb-3">
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->id }}</option>
                    @endforeach
                </select>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
