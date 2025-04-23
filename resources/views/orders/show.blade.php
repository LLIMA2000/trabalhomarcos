@extends('layouts.app')

@section('title', 'Detalhes da Compra')

@section('content')
    <h2>Detalhes da Compra #{{ $order->id }}</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Data:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> R$ {{ number_format($order->total, 2, ',', '.') }}</p>
        </div>
    </div>

    <h4>Itens</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">
        Voltar para histórico
    </a>
@endsection