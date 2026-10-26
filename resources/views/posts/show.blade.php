@extends('layouts.forum')
@section('content')

<a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm mb-4 rounded-pill px-3">
    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
</a>

<!-- Kartu Postingan Utama -->
<div class="card card-modern p-4 mb-4">
    <div class="d-flex align-items-center gap-3 mb-3">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=6366f1&color=fff&rounded=true" class="avatar" alt="User">
        <div>
            <div class="fw-bold">{{ $post->user->name }}</div>
            <div class="text-muted small">{{ $post->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} • <span class="badge-category">{{ $post->category->name }}</span></div>
        </div>
    </div>
    
    <h2 class="fw-bold mb-3">{{ $post->title }}</h2>
    <div class="text-muted" style="line-height: 1.8; white-space: pre-line;">{{ $post->body }}</div>

    @if($post->user_id === auth()->id())
        <div class="d-flex gap-2 mt-4 pt-3 border-top">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i> Edit Postingan</a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Hapus Postingan</button>
            </form>
        </div>
    @endif
</div>

<!-- Bagian Komentar -->
<h5 class="fw-bold mb-3"><i class="bi bi-chat-left-text me-2"></i>{{ $post->comments->count() }} Komentar</h5>

@foreach($post->comments->sortBy('created_at') as $c)
<div class="card card-modern mb-3 p-3 ms-md-4 border-start border-4 border-primary">
    <div class="d-flex justify-content-between align-items-start">
        <div class="d-flex gap-2">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($c->user->name) }}&background=random&color=fff&rounded=true" class="avatar" style="width:32px; height:32px;" alt="User">
            <div>
                <div class="fw-semibold small">{{ $c->user->name }}</div>
                <div class="text-muted" style="font-size: 0.8rem;">{{ $c->created_at->diffForHumans() }}</div>
                <p class="mb-0 mt-1 small" style="line-height: 1.5;">{{ $c->body }}</p>
            </div>
        </div>
        @if($c->user_id === auth()->id())
            <form method="POST" action="{{ route('comments.destroy', $c) }}" onsubmit="return confirm('Hapus komentar?')">
                @csrf @method('DELETE')
                <button class="btn btn-link text-danger text-decoration-none p-0" style="font-size: 0.8rem;"><i class="bi bi-trash"></i></button>
            </form>
        @endif
    </div>
</div>
@endforeach

<!-- Form Tambah Komentar -->
<div class="card card-modern p-4 ms-md-4 mt-4 bg-light">
    <h6 class="fw-bold mb-3">Tulis Komentar</h6>
    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf
        <textarea name="body" class="form-control mb-3" rows="3" placeholder="Apa pendapatmu tentang ini?" required></textarea>
        <button class="btn btn-primary"><i class="bi bi-send-fill me-1"></i> Kirim Komentar</button>
    </form>
</div>

@endsection