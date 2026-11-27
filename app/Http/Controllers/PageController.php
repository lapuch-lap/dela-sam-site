<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Показать страницу "О компании"
    public function about()
    {
        $aboutText = Setting::where('key', 'about_text')->first()->value ?? 'Информация пока не заполнена.';
        return view('pages.about', compact('aboutText'));
    }

    // Форма редактирования (для админа)
    public function editAbout()
    {
        $aboutText = Setting::where('key', 'about_text')->first()->value ?? '';
        return view('admin.about.edit', compact('aboutText'));
    }

    // Сохранение текста
    public function updateAbout(Request $request)
    {
        $request->validate(['about_text' => 'required|string']);
        
        Setting::updateOrCreate(
            ['key' => 'about_text'],
            ['value' => $request->about_text]
        );

        return back()->with('success', 'Информация о компании обновлена!');
    }
}