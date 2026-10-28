@extends('layouts.forum')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-modern p-4">
            <h4 class="fw-bold mb-4"><i class="bi bi-person-gear me-2"></i>Pengaturan Profil</h4>
            
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf 
                @method('PUT')
                
                <div class="text-center mb-4">
                    @php
                        $currentColor = auth()->user()->profile_picture ?? '#6366f1';
                        $initials = strtoupper(substr(auth()->user()->name, 0, 2));
                    @endphp
                    
                    <div id="avatar-preview" 
                         class="d-flex align-items-center justify-content-center text-white fw-bold rounded-circle mx-auto mb-3 border border-3 border-primary" 
                         style="background-color: {{ $currentColor }}; width: 128px; height: 128px; font-size: 3rem;">
                        {{ $initials }}
                    </div>
                    <!-- <p class="text-muted small">Avatar akan menampilkan 2 huruf awal username</p> -->
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold mb-3">Pilih Warna Avatar</label>
                    <div class="d-flex gap-3 flex-wrap">
                        @php 
                            $colors = ['#6366f1', '#ef4444', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6', '#06b6d4', '#f97316'];
                        @endphp
                        
                        @foreach($colors as $color)
                        <div class="text-center">
                            <input type="radio" class="btn-check" name="profile_picture" id="color-{{ $loop->index }}" value="{{ $color }}" 
                                {{ $currentColor == $color ? 'checked' : '' }} required>
                            <label class="btn p-0 border-0 rounded-circle d-flex align-items-center justify-content-center color-btn" 
                                for="color-{{ $loop->index }}" 
                                style="width: 35px; height: 35px; background-color: {{ $color }};">
                                <i class="bi bi-check-lg text-white check-icon" style="font-size: 1.5rem; display: none;"></i>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <script>
                    document.querySelectorAll('input[name="profile_picture"]').forEach(radio => {
                        radio.addEventListener('change', function() {
                            document.getElementById('avatar-preview').style.backgroundColor = this.value;
                            
                            document.querySelectorAll('.check-icon').forEach(icon => icon.style.display = 'none');
                            this.nextElementSibling.querySelector('.check-icon').style.display = 'block';
                        });
                    });
                </script>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection