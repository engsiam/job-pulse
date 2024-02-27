<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function candidateCreate(): View
    {
        return view('auth.candidateLogin');
    }

    public function companyCreate(): View
    {
        return view('auth.companyLogin');
    }

    public function selectUser()
    {
        return view('auth.selectrole');
    }
    /**
     * Handle an incoming authentication request.
     */ 
    
    public function candidateStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role === 'candidate') {
            return redirect()->route('candidate.dashboard');
        } else {
            toastr()->error('You are not allowed to login from here');
            Auth::guard('web')->logout();
            return redirect('/');
        }
    }

    public function companyStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role === 'company') {
            return redirect()->route('company.dashboard');
        } else {
            toastr()->error('You are not allowed to login from here');
            Auth::guard('web')->logout();
            return redirect('/');
        }
    }

    public function adminStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            toastr()->error('You are not allowed to login from here');
            Auth::guard('web')->logout();
            return redirect('/');
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
