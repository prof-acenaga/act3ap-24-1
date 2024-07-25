@extends('layouts.main')

@section('content')
    <div class="col-12">
        <h1 class="text-test">Checkout</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($order)
            <h2>Orden Numero {{ $order->id }}</h2>
            <h2>Total: {{ $order->total }}</h2>
            <h3>Productos</h3>
            <ul>
                @foreach (json_decode($order->products) as $product)
                    <li>{{ $product->name }}
                        @if (auth()->check())
                            <a href="{{ route('product.remove', $product->id) }}">Eliminar</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <h2>aun no ha agregado nada</h2>
        @endif
    </div>
@endsection
