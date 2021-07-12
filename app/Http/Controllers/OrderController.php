<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected function getCart(){
        return $cart = auth()->user()
            ->cart()
            ->latest()
            ->get();
    }

    function create(){
        $cart = $this->getCart();

        return view('pages.orders.form', [
            'cart' => $cart
        ]);
    }

    function store(OrderRequest $request){
        $cart = $this->getCart();
        $products = $cart->groupBy('product.id')
            ->map(function (Collection $collection){
                return [
                    'amount' => $collection->first()->amount,
                ];
            });

        $data = $request->validated() + ['products' => $products];
        $order = auth()->user()
            ->orders()
            ->create($data);

        auth()->user()
            ->cart()
            ->delete();

        return redirect()->route('orders.show', $order);
    }

    function show(Order $order){
        return view('pages.orders.show', [
            'order' => $order
        ]);
    }
}
