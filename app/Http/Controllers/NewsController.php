<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Tampilkan daftar berita milik user (reporter).
     */
    public function index()
    {
        $news = News::where('user_id', auth()->id())->latest()->get();
        return view('news.index', compact('news'));
    }

    /**
     * Tampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:news',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|min:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'status' => 'draft',
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeNewsImage($request->file('image'));
        }

        News::create($data);

        return redirect()->route('news.index')
            ->with('success', 'Berita berhasil dibuat dan menunggu persetujuan editor.');
    }

    /**
     * Tampilkan form edit berita.
     */
    public function edit(News $news)
    {
        $this->authorize('update', $news); // Pastikan user pemiliknya
        return view('news.edit', compact('news'));
    }

    /**
     * Update berita.
     */
    public function update(Request $request, News $news)
    {
        $this->authorize('update', $news);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:news,title,' . $news->id,
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|min:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'status' => 'draft', // Kembali ke draft setelah edit
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $this->storeNewsImage($request->file('image'));
        }

        $news->update($data);

        return redirect()->route('news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita.
     */
    public function destroy(News $news)
    {
        $this->authorize('delete', $news);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Optimasi dan simpan gambar.
     */
    protected function storeNewsImage($image)
    {
        $path = $image->store('news_images', 'public');

        // Resize gambar ke ukuran 800x500 dan kualitas 80%
        Image::make(storage_path("app/public/{$path}"))
            ->fit(800, 500, function ($constraint) {
                $constraint->upsize();
            })
            ->save(storage_path("app/public/{$path}"), 80);

        return $path;
    }
}
