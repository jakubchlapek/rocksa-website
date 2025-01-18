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
        return view('orders.index')->with('orders', Order::where('user_id', auth()->id())->get());
    }

    public function create(): View
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $order = Order::create($data);

        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order): View
    {
        $this->authorizeUser($order);
        return view('orders.show')->with('order', $order);
    }

    public function edit(Order $order): View
    {
        $this->authorizeUser($order);
        return view('orders.edit')->with('order', $order);
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $this->authorizeUser($order);
        $order->update($request->validated());

        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $this->authorizeUser($order);
        $order->delete();

        return redirect()->route('orders.index');
    }

    private function authorizeUser(Order $order): void
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }

}


