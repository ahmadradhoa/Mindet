<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mindet</title>
    
    <!-- Modern Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom UI/UX CSS & Dark Mode Variables -->
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        [data-theme="dark"] {
            --bg-color: #0f172a;
            --card-bg: #1e293b;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: background 0.3s, border-color 0.3s;
        }

        [data-theme="dark"] .navbar {
            background: rgba(15, 23, 42, 0.9) !important;
            border-bottom: 1px solid #334155;
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }

        .card-modern {
            background: var(--card-bg);
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            color: var(--text-main);
        }

        .card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        [data-theme="dark"] .card-modern {
            border-color: #334155;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 10px;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid transparent;
        }

        .badge-category {
            background-color: #e0e7ff;
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.4em 0.8em;
            border-radius: 8px;
            font-size: 0.75rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 0.75rem 1rem;
            background-color: var(--card-bg);
            color: var(--text-main);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        /* === FIX SEARCH BOX & INPUT GROUP === */
        .input-group-text {
            background-color: transparent !important;
            border: 1px solid #cbd5e1;
            border-right: none;
            color: var(--text-muted);
        }
        .form-control.border-start-0 {
            border-left: none !important;
        }

        /* === DARK MODE OVERRIDES (LENGKAP) === */
        [data-theme="dark"] .text-dark { color: var(--text-main) !important; }
        [data-theme="dark"] .text-muted { color: var(--text-muted) !important; }
        [data-theme="dark"] .fw-bold, [data-theme="dark"] .fw-semibold, [data-theme="dark"] strong { color: var(--text-main) !important; }
        [data-theme="dark"] .bg-light { background-color: #334155 !important; }
        [data-theme="dark"] p { color: #e2e8f0; }
        [data-theme="dark"] .form-text, [data-theme="dark"] small.text-muted { color: #94a3b8 !important; }
        [data-theme="dark"] hr, [data-theme="dark"] .border-top { border-color: #334155 !important; }

        [data-theme="dark"] .form-control, [data-theme="dark"] .form-select {
            background-color: #334155;
            border-color: #475569;
            color: #f1f5f9;
        }
        [data-theme="dark"] .form-control::placeholder, [data-theme="dark"] input::placeholder, [data-theme="dark"] textarea::placeholder {
            color: #64748b;
        }

        [data-theme="dark"] .input-group-text {
            background-color: transparent !important;
            border-color: #475569;
            color: #94a3b8;
        }

        [data-theme="dark"] .card-modern p,
        [data-theme="dark"] .card-modern h1, [data-theme="dark"] .card-modern h2, 
        [data-theme="dark"] .card-modern h3, [data-theme="dark"] .card-modern h4, 
        [data-theme="dark"] .card-modern h5, [data-theme="dark"] .card-modern h6,
        [data-theme="dark"] .card-modern strong, [data-theme="dark"] .card-modern .fw-bold, 
        [data-theme="dark"] .card-modern .fw-semibold {
            color: #f1f5f9 !important;
        }

        [data-theme="dark"] .card-modern a.text-dark { color: #f1f5f9 !important; }
        [data-theme="dark"] .card-modern a.text-dark:hover { color: #cbd5e1 !important; }

        /* Dropdown Dark Mode */
        [data-theme="dark"] .dropdown-menu {
            background-color: #1e293b;
            border-color: #334155;
        }
        [data-theme="dark"] .dropdown-item { color: #f1f5f9; }
        [data-theme="dark"] .dropdown-item:hover { background-color: #334155; color: #f1f5f9; }
        [data-theme="dark"] .dropdown-divider { border-color: #334155; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top mb-4">
  <div class="container" style="max-width: 900px;">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('posts.index') }}">
        <!-- Pastikan folder 'images' ada di public, dan file bernama Mindent_Logo.png -->
        <img src="{{ asset('image/Mindet_Logo.png') }}" alt="Mindet Logo" height="35" class="d-inline-block align-text-top">
        <span class="fw-bold">Mindet</span>
    </a>
    
    <div class="d-flex gap-2 align-items-center">
      <a class="btn btn-outline-secondary btn-sm d-none d-md-inline-flex align-items-center gap-1" href="{{ route('posts.index') }}">
        <i class="bi bi-house"></i> Beranda
      </a>
      <a class="btn btn-outline-secondary btn-sm d-none d-md-inline-flex align-items-center gap-1" href="{{ route('categories.index') }}">
        <i class="bi bi-grid"></i> Kategori
      </a>
      <a class="btn btn-primary btn-sm d-none d-md-inline-flex align-items-center gap-1" href="{{ route('posts.create') }}">
        <i class="bi bi-plus-lg"></i> Posting
      </a>
      
      @auth
        <div class="vr mx-2 d-none d-md-block"></div>
        
        <button id="theme-toggle" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; padding: 0;" title="Ganti Mode Gelap/Terang">
            <i class="bi bi-moon-stars-fill" id="theme-icon"></i>
        </button>

        <div class="dropdown">
            @php
                $navAvatar = auth()->user()->profile_picture 
                    ? asset('images/profiles/' . auth()->user()->profile_picture) 
                    : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff&rounded=true';
            @endphp
            <!-- Hapus class text-dark, ganti dengan style variable agar ikut dark mode -->
            <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--text-main);">
                <img src="{{ $navAvatar }}" class="avatar" alt="User">
                <span class="fw-semibold small d-none d-md-block">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person-gear me-2"></i>Pengaturan Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
      @else
        <button id="theme-toggle-mobile" class="btn btn-outline-secondary btn-sm rounded-circle d-md-none" style="width: 38px; height: 38px; padding: 0;">
            <i class="bi bi-moon-stars-fill" id="theme-icon-mobile"></i>
        </button>
        <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
      @endauth
    </div>
  </div>
</nav>

<div class="container" style="max-width: 900px;">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm rounded-4">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>

<footer class="text-center text-muted small py-5 mt-5">
    <p class="mb-0">© 2024 <strong>Mindent</strong>. Dibuat dengan ❤️ menggunakan Laravel.</p>
</footer>

<!-- SweetAlert2 & Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // 1. SweetAlert2 Notifications
    @if(session('success'))
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: '{{ session('success') }}', timer: 2500, showConfirmButton: false });
    @endif
    @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Oops...', text: '{{ session('error') }}' });
    @endif

    // 2. Custom Confirm Delete
    document.querySelectorAll('form[onsubmit*="confirm"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) { this.submit(); }
            });
        });
    });

    // 3. Dark Mode Logic
    const themeToggles = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');
    const themeIcons = document.querySelectorAll('#theme-icon, #theme-icon-mobile');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    document.documentElement.setAttribute('data-theme', currentTheme);
    updateIcons(currentTheme);

    themeToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const newTheme = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcons(newTheme);
        });
    });

    function updateIcons(theme) {
        themeIcons.forEach(icon => {
            icon.className = theme === 'light' ? 'bi bi-moon-stars-fill' : 'bi bi-sun-fill';
        });
    }
</script>
</body>
</html>