@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Artikel Baru</h1>

    <form action="{{ route('articles.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow-md space-y-6">
        @csrf
        <div>
            <label for="title" class="block font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="content" class="block font-medium text-gray-700">Konten</label>
            <textarea name="content" id="content" rows="8" class="w-full mt-1 border rounded px-3 py-2" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
