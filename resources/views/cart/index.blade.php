@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <h2>Carrinho de Compras</h2>

    @if(!empty($cart))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $index => $item)
                    <tr>
                        <td>{{ $item['product'] }}</td>
                        <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $index) }}" class="btn btn-danger btn-sm">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th>R$ {{ number_format($total, 2, ',', '.') }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Finalizar Compra</button>
        </form>
    @else
        <p>Seu carrinho está vazio.</p>
    @endif
@endsection