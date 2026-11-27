<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Возвращаем стандартное имя метода index
    public function index()
    {
        $orders = Order::with(['user', 'tool'])->latest()->get();
        // Указываем стандартное имя файла
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        // Разрешаем все статусы, которые есть в вашем выпадающем списке
        $request->validate([
            'status' => 'required|in:Подготавливается,В ожидании,Доставляется,Доставлен,Получен'
        ]);
        
        $order->update(['status' => $request->status]);
        
        return back()->with('success', 'Статус заказа №' . $order->id . ' успешно изменен!');
    }
}