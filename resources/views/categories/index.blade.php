@extends('layouts.forum')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Discussion Categories</h2>
        <p class="text-muted mb-0">Select the topics you want to follow</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Category
    </a>
</div>

<div class="row g-3">
@forelse($categories as $c)
    <div class="col-md-6 col-lg-4">
        <div class="card card-modern h-100 p-4 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-folder2-open fs-4"></i>
                </div>
                <span class="badge bg-dark bg-opacity-75 rounded-pill">{{ $c->posts_count }} Post</span>
            </div>
            
            <h5 class="fw-bold mb-2">{{ $c->name }}</h5>
            <p class="text-muted small flex-grow-1 mb-3">{{ $c->description ?: 'No description' }}</p>
            
            <div class="d-flex gap-2 mt-auto">
                <a href="{{ route('posts.index', ['category_id' => $c->id]) }}" class="btn btn-outline-primary btn-sm flex-grow-1">View Discussion</a>
                <a href="{{ route('categories.edit', $c) }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a>
                
<form action="{{ route('categories.destroy', $c) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button class="btn btn-outline-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
</form>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center py-5">
        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Kosong" width="120" class="mb-3 opacity-50">
        <h5 class="fw-bold text-muted">No categories yet</h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2">Create the First Category</a>
    </div>
@endforelse
</div>
@endsection