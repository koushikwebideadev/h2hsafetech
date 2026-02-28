<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $featuresCount = \App\Models\Feature::count();
        $servicesCount = \App\Models\Service::count();
        $blogsCount = \App\Models\Blog::count();
        $contactLeadsCount = \App\Models\ContactLead::count();
        $bookDemoLeadsCount = \App\Models\BookDemoLead::count();
        $pagesCount = \App\Models\Page::count();

        return view('admin.dashboard', compact(
            'featuresCount',
            'servicesCount',
            'blogsCount',
            'pagesCount',
            'contactLeadsCount',
            'bookDemoLeadsCount'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    /**
     * Clear application cache (config, route, view, and application cache).
     */
    public function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Cache cleared successfully.']);
        }

        return back()->with('success', 'Cache cleared successfully.');
    }
}
