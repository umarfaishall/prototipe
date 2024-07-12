<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            Alert::toast('Selamat datang kembali, ' . Auth::user()->name . '.', 'success');
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'korlap') {
            Alert::toast('Selamat datang kembali, ' . Auth::user()->name . '.', 'success');
            return redirect()->route('korlap.dashboardkor');
        } elseif (Auth::user()->role == 'pimpinan') {
            Alert::toast('Selamat datang kembali, ' . Auth::user()->name . '.', 'success');
            return redirect()->route('pimpinan.dashboardpim');
        } else {
            Alert::toast('Selamat datang kembali, ' . Auth::user()->name . '.', 'success');
            return redirect()->intended('/');
        }
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
