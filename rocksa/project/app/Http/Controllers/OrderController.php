<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('orders.index')->with('order', Order::all());
    }

    public function create(): View
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $order = Order::create($request->validated());

        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order): View
    {
        return view('orders.show')->with('order', $order);
    }

    public function edit(Order $order): View
    {
        return view('orders.edit')->with('order', $order);
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return redirect()->route('order.show', $order);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('order.index');
    }
}
