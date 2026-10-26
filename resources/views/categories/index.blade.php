@extends('layouts.forum')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Kategori</h4>
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">+ Tambah Kategori</a>
</div>

<div class="card">
  <table class="table table-hover mb-0">
    <thead class="table-light">
      <tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Jumlah Post</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    @forelse($categories as $c)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td><strong>{{ $c->name }}</strong></td>
        <td>{{ $c->description }}</td>
        <td><span class="badge bg-secondary">{{ $c->posts_count }}</span></td>
        <td>
          <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-outline-warning">Edit</a>
          <form action="{{ route('categories.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center text-muted py-3">Belum ada kategori.</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
@endsection