<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Constructor untuk controller
     */
    public function __construct()
    {
        // Middleware auth untuk memastikan hanya user yang login bisa akses
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Menampilkan dashboard utama aplikasi
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Redirect berdasarkan role user
        if (Auth::user()->role === 'reporter') {
            return redirect()->route('reporter.dashboard');
        }
        
        // Default view untuk role lainnya
        return view('dashboard', [
            'user' => Auth::user() // Mengirim data user ke view
        ]);
    }
}