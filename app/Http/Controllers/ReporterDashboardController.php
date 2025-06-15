<?php

namespace App\Http\Controllers;

use App\Models\Article; // Sesuaikan jika nama model Anda 'Berita'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporterDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hitung statistik untuk reporter yang sedang login
        $totalArticles = Article::where('user_id', $user->id)->count();
        $pendingArticles = Article::where('user_id', $user->id)
                                  ->where('status', 'pending') // Sesuaikan dengan status di DB Anda
                                  ->count();
        $publishedArticles = Article::where('user_id', $user->id)
                                   ->where('status', 'published') // Sesuaikan dengan status di DB Anda
                                   ->count();

        // Ambil artikel terbaru dari reporter ini
        $latestArticles = Article::where('user_id', $user->id)
                                ->latest() // Urutkan dari yang terbaru
                                ->limit(5) // Ambil 5 artikel terbaru
                                ->get();

        return view('dashboard.reporter', compact(
            'user',
            'totalArticles',
            'pendingArticles',
            'publishedArticles',
            'latestArticles'
        ));
    }
}