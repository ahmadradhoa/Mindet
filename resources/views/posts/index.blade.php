@extends('layouts.forum')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Beranda Diskusi</h4>
  <a href="{{ route('posts.create') }}" class="btn btn-warning btn-sm">+ Buat Postingan</a>
</div>

@forelse($posts as $p)
<div class="card mb-3">
  <div class="card-body">
    <span class="badge bg-primary mb-2">{{ $p->category->name }}</span>
    <h5><a href="{{ route('posts.show', $p) }}" class="text-decoration-none text-dark">{{ $p->title }}</a></h5>
    <p class="text-muted small mb-2">{{ Str::limit($p->body, 150) }}</p>
    <div class="small text-muted">
      <i class="bi bi-person"></i> {{ $p->user->name }}
      &nbsp;·&nbsp; <i class="bi bi-chat"></i> {{ $p->comments_count }} komentar
      &nbsp;·&nbsp; {{ $p->created_at->diffForHumans() }}
    </div>
    @if($p->user_id === auth()->id())
      <div class="mt-2">
        <a href="{{ route('posts.edit', $p) }}" class="btn btn-sm btn-outline-warning">Edit</a>
        <form method="POST" action="{{ route('posts.destroy', $p) }}" class="d-inline"
              onsubmit="return confirm('Yakin hapus postingan ini?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-outline-danger">Hapus</button>
        </form>
      </div>
    @endif
  </div>
</div>
@empty
  <div class="alert alert-info">Belum ada postingan. Jadilah yang pertama!</div>
@endforelse

<div class="d-flex justify-content-center mt-3">
  {{ $posts->links() }}
</div>
@endsection