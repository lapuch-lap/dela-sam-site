<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, Tool $tool)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $tool->quantity,
            'delivery_type' => 'required|in:Самовывоз,Доставка',
            'address' => 'required_if:delivery_type,Доставка|nullable|string|max:255',
        ], [
            'quantity.max' => 'На складе нет столько единиц этого инструмента.',
            'address.required_if' => 'Для доставки необходимо указать адрес.',
        ]);

        // Создаем заказ
        Order::create([
            'user_id' => Auth::id(),
            'tool_id' => $tool->id,
            'quantity' => $request->quantity,
            'delivery_type' => $request->delivery_type,
            'address' => $request->delivery_type == 'Доставка' ? $request->address : null,
            'status' => 'Подготавливается',
        ]);

        // Опционально: можно сразу уменьшить количество на складе
        // $tool->decrement('quantity', $request->quantity);

        return redirect()->route('profile.edit')->with('success', 'Заказ успешно оформлен!');
    }
}