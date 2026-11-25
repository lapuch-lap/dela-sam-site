<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Переименовали метод
    public function dexing()
    {
        $orders = Order::with(['user', 'tool'])->latest()->get();
        // Указываем новое имя файла
        return view('admin.orders.dexing', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|string']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Статус заказа обновлен!');
    }
}