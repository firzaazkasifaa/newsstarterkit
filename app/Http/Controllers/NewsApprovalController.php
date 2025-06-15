<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsApprovalController extends Controller
{
    /**
     * Display a listing of draft news awaiting approval.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $news = News::where('status', 'draft')
                    ->with(['author', 'category'])
                    ->latest()
                    ->paginate(10);
                    
        return view('approvals.index', compact('news'));
    }

    /**
     * Show the detailed view of a news item for approval.
     *
     * @param  News  $news
     * @return \Illuminate\View\View
     */
    public function show(News $news)
    {
        return view('approvals.show', compact('news'));
    }

    /**
     * Approve and publish a news article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, News $news)
    {
        $validated = $request->validate([
            'notes' => 'nullable|string|max:500',
        ]);
        
        $news->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
        
        NewsApproval::create([
            'news_id' => $news->id,
            'editor_id' => Auth::id(),
            'status' => 'approved',
            'notes' => $validated['notes'] ?? null,
        ]);
        
        return redirect()->route('approvals.index')
            ->with('toast_success', 'News approved and published successfully.');
    }

    /**
     * Reject a news article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, News $news)
    {
        $validated = $request->validate([
            'notes' => 'required|string|max:500',
        ]);
        
        $news->update([
            'status' => 'rejected',
        ]);
        
        NewsApproval::create([
            'news_id' => $news->id,
            'editor_id' => Auth::id(),
            'status' => 'rejected',
            'notes' => $validated['notes'],
        ]);
        
        return redirect()->route('approvals.index')
            ->with('toast_success', 'News rejected successfully.');
    }
}