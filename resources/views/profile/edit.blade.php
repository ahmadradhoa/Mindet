@extends('layouts.forum')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-modern p-4">
            <h4 class="fw-bold mb-4"><i class="bi bi-person-gear me-2"></i>Pengaturan Profil</h4>
            
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div class="text-center mb-4">
                    @php
                        $avatarUrl = auth()->user()->profile_picture 
                            ? asset('images/profiles/' . auth()->user()->profile_picture) 
                            : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff&size=128';
                    @endphp
                    <img src="{{ $avatarUrl }}" class="rounded-circle mb-3 border border-3 border-primary" width="128" height="128" style="object-fit: cover;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Foto Profil</label>
                    <input type="file" name="profile_picture" class="form-control" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection