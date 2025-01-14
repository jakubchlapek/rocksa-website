<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemsRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class orderItemsController extends Controller
{
    public function store(StoreOrderItemsRequest $request): RedirectResponse
    {
        $orderItems = OrderItems::create($request->validated());

        return redirect()->route('orderItems.show', $orderItems);
    }
}
