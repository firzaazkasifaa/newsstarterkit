@extends('layouts.app')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Dashboard Reporter</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    <h5>Total Artikel</h5>
                    <h3>{{ $totalArticles }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    <h5>Menunggu Verifikasi</h5>
                    <h3>{{ $pendingArticles }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    <h5>Telah Dipublikasikan</h5>
                    <h3>{{ $publishedArticles }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h4>Artikel Terbaru</h4>
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($latestArticles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->status }}</td>
                    <td>{{ $article->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada artikel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
