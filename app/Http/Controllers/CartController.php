<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart', []);
        
        $cart[] = [
            'product' => $product->name,
            'price' => $product->price,
            'product_id' => $product->id
        ];
        
        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Reorganiza os índices
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);

        // Cria a ordem
        $order = Order::create([
            'total' => $total,
            'status' => 'completed'
        ]);

        // Adiciona itens à ordem
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => 1,
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');
        
        return redirect()->route('orders.index')
            ->with('success', 'Compra finalizada com sucesso! Nº ' . $order->id);
    }

    private function calculateTotal($cart)
    {
        return array_reduce($cart, function($carry, $item) {
            return $carry + $item['price'];
        }, 0);
    }
}