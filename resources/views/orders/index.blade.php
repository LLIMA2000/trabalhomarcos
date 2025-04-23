@extends('layouts.app')

@section('title', 'Histórico de Compras')

@section('content')
    <h2>Histórico de Compras</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nº Pedido</th>
                <th>Data</th>
                <th>Total</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                            Detalhes
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection