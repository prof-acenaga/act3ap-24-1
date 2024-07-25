@extends('layouts.main')

@section('content')
    <div class="col-12">
        <h1 class="text-test">Productos</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            @foreach ($products as $product)
                <li>{{ $product->name }}</li>
                @if (auth()->check())
                    <a href="{{ route('product.add', $product) }}">Agregar</a>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
