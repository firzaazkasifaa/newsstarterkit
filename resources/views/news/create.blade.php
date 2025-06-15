@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Berita</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('news.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Berita</button>
    </form>
</div>
@endsection
