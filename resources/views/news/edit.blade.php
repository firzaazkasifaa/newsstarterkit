@extends('layouts.app')

@section('title', 'Edit News')
@section('header', 'Edit News')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Same fields as create form, but with $news values -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $news->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Include other fields similarly with old('field', $news->field) -->
            
            <!-- Image preview -->
            @if($news->image)
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                <div>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" 
                         class="img-thumbnail" style="max-height: 200px;">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                        <label class="form-check-label" for="remove_image">
                            Remove current image
                        </label>
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Rest of the form same as create -->
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection