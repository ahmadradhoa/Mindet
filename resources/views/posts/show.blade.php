@extends('layouts.forum')
@section('content')
<a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary mb-3">&larr; Kembali ke Beranda</a>

<div class="card mb-4">
  <div class="card-body">
    <span class="badge bg-primary">{{ $post->category->name }}</span>
    <h3 class="mt-2">{{ $post->title }}</h3>
    <p class="text-muted small">
      Oleh <strong>{{ $post->user->name }}</strong> · {{ $post->created_at->format('d M Y H:i') }}
    </p>
    <p style="white-space: pre-line;" class="mt-3">{{ $post->body }}</p>

    @if($post->user_id === auth()->id())
      <div class="mt-3">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline"
              onsubmit="return confirm('Yakin hapus postingan ini?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </div>
    @endif
  </div>
</div>

<h5 class="mb-3">{{ $post->comments->count() }} Komentar</h5>

@foreach($post->comments->sortBy('created_at') as $c)
<div class="card mb-2 ms-3 border-start border-primary border-3">
  <div class="card-body py-2 d-flex justify-content-between align-items-start">
    <div>
      <strong class="small">{{ $c->user->name }}</strong>
      <span class="text-muted small">· {{ $c->created_at->diffForHumans() }}</span>
      <p class="mb-0 small mt-1">{{ $c->body }}</p>
    </div>
    @if($c->user_id === auth()->id())
      <form method="POST" action="{{ route('comments.destroy', $c) }}"
            onsubmit="return confirm('Hapus komentar?')">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-outline-danger" style="font-size: 0.8rem;">Hapus</button>
      </form>
    @endif
  </div>
</div>
@endforeach

<div class="card mt-4">
  <div class="card-body">
    <h6 class="mb-2">Tulis Komentar</h6>
    <form method="POST" action="{{ route('comments.store', $post) }}">
      @csrf
      <textarea name="body" class="form-control mb-2" rows="3" placeholder="Tulis komentar..." required></textarea>
      <button class="btn btn-primary btn-sm">Kirim Komentar</button>
    </form>
  </div>
</div>
@endsection