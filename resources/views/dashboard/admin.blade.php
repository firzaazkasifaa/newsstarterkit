<!-- resources/views/dashboard/admin.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow border">
            <h2 class="text-lg font-semibold mb-2">Total Reporter</h2>
            <p class="text-3xl">{{ $totalReporters }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow border">
            <h2 class="text-lg font-semibold mb-2">Artikel Pending</h2>
            <p class="text-3xl">{{ $pendingArticles }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow border">
            <h2 class="text-lg font-semibold mb-2">Artikel Diterbitkan</h2>
            <p class="text-3xl">{{ $publishedArticles }}</p>
        </div>
    </div>

    <h2 class="text-xl font-bold mb-4">Manajemen Artikel</h2>
    <table class="min-w-full bg-white border rounded-xl">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 border-b text-left">Judul</th>
                <th class="py-3 px-4 border-b text-left">Penulis</th>
                <th class="py-3 px-4 border-b text-left">Status</th>
                <th class="py-3 px-4 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td class="py-2 px-4 border-b">{{ $article->title }}</td>
                <td class="py-2 px-4 border-b">{{ $article->author->name }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($article->status) }}</td>
                <td class="py-2 px-4 border-b space-x-2">
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                    @if ($article->status === 'pending')
                    <form action="{{ route('admin.articles.approve', $article->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-green-600 hover:underline">Terbitkan</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
