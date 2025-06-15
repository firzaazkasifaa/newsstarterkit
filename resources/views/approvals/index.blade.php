@extends('layouts.app')

@section('title', 'News Approvals')
@section('header', 'News Approvals')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('approvals.show', $item) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Review
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $news->links() }}
    </div>
</div>
@endsection