@extends('layouts.main')

@section('content')
<div class="col-12">
    <h1 class="text-test">Pagina de Entradas</h1>
    @if ($posts->count() > 0)
        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay posts</p>
    @endif
</div>


@endsection
