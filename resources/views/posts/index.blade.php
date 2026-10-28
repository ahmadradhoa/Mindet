@extends('layouts.forum')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Home</h2>
        <p class="text-muted mb-0">Find an interesting topic or start a new discussion</p>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-pencil-square me-1"></i> Create Post
    </a>
</div>

<div class="card card-modern p-3 mb-4">
    <form method="GET" action="{{ route('posts.index') }}" class="row g-2 align-items-end">
        <div class="col-md-4">
            <label class="form-label small fw-semibold text-muted">Category Filter</label>
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label small fw-semibold text-muted">Search</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Type a title or text..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>
    @if(request('search') || request('category_id'))
        <div class="mt-2">
            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        </div>
    @endif
</div>

@forelse($posts as $p)
<div class="card card-modern mb-3 p-3">
    <div class="d-flex gap-3">
        <div class="flex-shrink-0 text-center">
            @php
                $avatarColor = $p->user->profile_picture ?? '#6366f1';
                
                $initials = strtoupper(substr($p->user->name, 0, 2));
            @endphp
            
            <div class="d-flex align-items-center justify-content-center text-white fw-bold rounded-circle mx-auto mb-1" 
                style="background-color: {{ $avatarColor }}; width: 40px; height: 40px; font-size: 14px;">
                {{ $initials }}
            </div>
            
            <div class="small text-muted" style="font-size: 0.7rem;">{{ $p->created_at->diffForHumans() }}</div>
        </div>
        
        <div class="flex-grow-1">
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge-category">{{ $p->category->name }}</span>
                <span class="text-muted small">• From <strong>{{ $p->user->name }}</strong></span>
            </div>
            
            <h5 class="fw-bold mb-2">
                <a href="{{ route('posts.show', $p) }}" class="text-decoration-none text-dark stretched-link">
                    {{ $p->title }}
                </a>
            </h5>
            <p class="text-muted small mb-3" style="line-height: 1.6;">{{ Str::limit($p->body, 180) }}</p>
            
<div class="d-flex align-items-center gap-3 text-muted small position-relative" style="z-index: 2;">
    <span class="d-flex align-items-center gap-1">
        <i class="bi bi-chat-dots"></i> {{ $p->comments_count }} Comments
    </span>

    @if($p->user_id === auth()->id())
        <div class="vr"></div>

        <a href="{{ route('posts.edit', $p) }}" class="btn btn-outline-warning btn-sm">
            <i class="bi bi-pencil me-1"></i> Edit
        </a>

        <form action="{{ route('posts.destroy', $p) }}" method="POST" class="d-inline delete-form">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger btn-sm" onclick="event.stopPropagation()">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    @endif
</div>
        </div>
    </div>
</div>
@empty
    <div class="text-center py-5">
        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Kosong" width="120" class="mb-3 opacity-50">
        <h5 class="fw-bold text-muted">There aren't any posts yet...</h5>
        <p class="text-muted small">Be the first!</p>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-2">Create your first post</a>
    </div>
@endforelse

<div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
</div>
@endsection