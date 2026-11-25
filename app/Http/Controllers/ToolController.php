<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return view('admin.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('admin.tools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price_per_day' => 'required|numeric|min:0',
            'deposit' => 'required|numeric|min:0',
            'delivery_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Tool::create($validated);

        return redirect()->route('admin.tools.index')->with('success', 'Инструмент успешно добавлен!');
    }
}