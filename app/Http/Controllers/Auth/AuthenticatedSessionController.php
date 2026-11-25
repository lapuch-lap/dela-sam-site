<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException; // Добавлен импорт

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Пытаемся авторизовать по логину и паролю
        if (! Auth::attempt(['login' => $request->login, 'password' => $request->password], $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'login' => __('Неверный логин или пароль.'),
            ]);
        }

        $request->session()->regenerate();

        // Проверяем, является ли пользователь админом
        if (Auth::user()->is_admin) {
            // Если админ — кидаем в админку
            return redirect()->intended(route('admin.panel'));
        }

        // Обычных пользователей кидаем на главную страницу (dashboard)
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}