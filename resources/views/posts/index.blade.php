@extends('layouts.forum')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Beranda Diskusi</h2>
        <p class="text-muted mb-0">Temukan topik menarik atau mulai diskusi baru.</p>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-pencil-square me-1"></i> Buat Postingan
    </a>
</div>

<div class="card card-modern p-3 mb-4">
    <form method="GET" action="{{ route('posts.index') }}" class="row g-2 align-items-end">
        <div class="col-md-4">
            <label class="form-label small fw-semibold text-muted">Filter Kategori</label>
            <select name="category_id" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label small fw-semibold text-muted">Cari Diskusi</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Ketik judul atau isi..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </form>
    @if(request('search') || request('category_id'))
        <div class="mt-2">
            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-x-circle"></i> Reset Filter
            </a>
        </div>
    @endif
</div>

@forelse($posts as $p)
<div class="card card-modern mb-3 p-3">
    <div class="d-flex gap-3">
                <!-- Avatar User -->
        <div class="flex-shrink-0 text-center">
            @php
                $postAvatar = $p->user->profile_picture 
                    ? asset('images/profiles/' . $p->user->profile_picture) 
                    : 'https://ui-avatars.com/api/?name=' . urlencode($p->user->name) . '&background=random&color=fff&rounded=true';
            @endphp
            <img src="{{ $postAvatar }}" class="avatar mb-1" alt="{{ $p->user->name }}">
            <div class="small text-muted" style="font-size: 0.7rem;">{{ $p->created_at->diffForHumans() }}</div>
        </div>
        
        <div class="flex-grow-1">
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge-category">{{ $p->category->name }}</span>
                <span class="text-muted small">• Oleh <strong>{{ $p->user->name }}</strong></span>
            </div>
            
            <h5 class="fw-bold mb-2">
                <a href="{{ route('posts.show', $p) }}" class="text-decoration-none text-dark stretched-link">
                    {{ $p->title }}
                </a>
            </h5>
            <p class="text-muted small mb-3" style="line-height: 1.6;">{{ Str::limit($p->body, 180) }}</p>
            
<div class="d-flex align-items-center gap-3 text-muted small position-relative" style="z-index: 2;">
    <span class="d-flex align-items-center gap-1">
        <i class="bi bi-chat-dots"></i> {{ $p->comments_count }} Komentar
    </span>

    @if($p->user_id === auth()->id())
        <div class="vr"></div>

        <a href="{{ route('posts.edit', $p) }}" class="btn btn-outline-warning btn-sm">
            <i class="bi bi-pencil me-1"></i> Edit
        </a>

        <form action="{{ route('posts.destroy', $p) }}" method="POST" class="d-inline form-delete">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash me-1"></i> Hapus
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
        <h5 class="fw-bold text-muted">Belum ada diskusi nih...</h5>
        <p class="text-muted small">Jadilah orang pertama yang memulai percakapan!</p>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-2">Buat Postingan Pertama</a>
    </div>
@endforelse

<div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
</div>
@endsection