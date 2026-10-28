<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mindet</title>

    <link rel="icon" type="image/png" href="{{ asset('image/Mindet_Logo.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
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

        .input-group-text {
            background-color: transparent !important;
            border: 1px solid #cbd5e1;
            border-right: none;
            color: var(--text-muted);
        }

        .form-control.border-start-0 {
            border-left: none !important;
        }

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

        [data-theme="dark"] .dropdown-menu {
            background-color: #1e293b;
            border-color: #334155;
        }
        [data-theme="dark"] .dropdown-item { color: #f1f5f9; }
        [data-theme="dark"] .dropdown-item:hover { background-color: #334155; color: #f1f5f9; }
        [data-theme="dark"] .dropdown-divider { border-color: #334155; }

        .card-modern.no-hover:hover {
            transform: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border-color: #e2e8f0;
        }
        [data-theme="dark"] .card-modern.no-hover:hover {
            border-color: #334155;
        }

        [data-theme="dark"] .form-label,
        [data-theme="dark"] label {
            color: var(--text-main);
        }
        [data-theme="dark"] .btn-outline-secondary {
            color: #cbd5e1;
            border-color: #475569;
        }
        [data-theme="dark"] .btn-outline-secondary:hover {
            background-color: #334155;
            color: #f1f5f9;
            border-color: #475569;
        }

        [data-theme="dark"] .card,
        [data-theme="dark"] .bg-white {
            background-color: var(--card-bg) !important;
            border-color: #334155;
            color: var(--text-main);
        }

        .swal2-popup {
            background-color: var(--card-bg) !important;
            color: var(--text-main) !important;
            border-radius: 16px !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
            border: 1px solid #e2e8f0;
            padding: 1.5rem !important;
        }
        [data-theme="dark"] .swal2-popup {
            border-color: #334155 !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5) !important;
        }
        .swal2-title {
            color: var(--text-main) !important;
            font-weight: 700 !important;
            font-size: 1.25rem !important;
            margin-bottom: 0.5rem !important;
        }
        .swal2-html-container {
            color: var(--text-muted) !important;
            font-size: 0.95rem !important;
            line-height: 1.5 !important;
            margin: 0 !important;
        }
        .swal2-confirm {
            background-color: #ef4444 !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 0.6rem 1.2rem !important;
            font-size: 0.9rem !important;
        }
        .swal2-confirm:hover {
            background-color: #dc2626 !important;
        }
        .swal2-cancel {
            background-color: #e2e8f0 !important;
            color: #475569 !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 0.6rem 1.2rem !important;
            font-size: 0.9rem !important;
        }
        [data-theme="dark"] .swal2-cancel {
            background-color: #334155 !important;
            color: #cbd5e1 !important;
        }
        .swal2-cancel:hover {
            background-color: #cbd5e1 !important;
        }
        [data-theme="dark"] .swal2-cancel:hover {
            background-color: #475569 !important;
        }
        .swal2-icon.swal2-warning {
            border-color: #f59e0b !important;
            color: #f59e0b !important;
        }

        @media (max-width: 767.98px) {
            .navbar {
                padding: 0.5rem 0 !important;
            }
            .navbar-brand {
                font-size: 1.2rem !important;
            }
            .navbar-brand img {
                height: 28px !important;
            }
            
            .container {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
            
            .d-flex.justify-content-between {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 10px;
            }
            .d-flex.justify-content-between h2 {
                font-size: 1.3rem !important;
            }
            .d-flex.justify-content-between p {
                font-size: 0.85rem !important;
            }
            
            .d-flex.justify-content-between .btn-primary {
                width: 100% !important;
                justify-content: center !important;
            }
            
            .card-modern.p-4 {
                padding: 1rem !important;
            }
            .row.g-3 {
                gap: 8px;
            }
            .col-md-5, .col-md-2 {
                width: 100% !important;
                max-width: 100% !important;
                flex: 0 0 100% !important;
            }
            .col-md-2.d-flex {
                margin-top: 5px;
            }
            .col-md-2 .btn {
                flex: 1;
            }
            
            .card-modern.mb-3.p-3 {
                padding: 0.8rem !important;
                margin-bottom: 0.8rem !important;
            }
            .card-modern.mb-3.p-3 h5 {
                font-size: 1rem !important;
            }
            .card-modern.mb-3.p-3 p {
                font-size: 0.85rem !important;
                line-height: 1.5 !important;
            }
            
            .avatar {
                width: 32px !important;
                height: 32px !important;
            }
            
            .d-none.d-sm-block {
                display: none !important;
            }
            
            .badge-category {
                font-size: 0.7rem !important;
                padding: 0.3em 0.6em !important;
            }
            
            .btn-link, .btn-outline-danger.btn-sm {
                font-size: 0.8rem !important;
                padding: 0.2rem 0.5rem !important;
            }
            
            footer {
                padding: 1.5rem 0 !important;
                font-size: 0.75rem !important;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top mb-4">
  <div class="container" style="max-width: 900px;">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('posts.index') }}">
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
                $avatarColor = auth()->user()->profile_picture ?? '#6366f1';
                
                $initials = strtoupper(substr(auth()->user()->name, 0, 2));
            @endphp

            <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--text-main);">
                <div class="d-flex align-items-center justify-content-center text-white fw-bold rounded-circle" 
                    style="background-color: {{ $avatarColor }}; width: 40px; height: 40px; font-size: 14px; flex-shrink: 0;">
                    {{ $initials }}
                </div>
                
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
    <p class="mb-0">© 2026 <strong>Mindet</strong></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Gagal', text: '{{ session('error') }}' });
    @endif

document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        Swal.fire({
            html: `
                <div class="text-start">
                    <p class="mb-0" style="color: var(--text-main); font-size: 1rem;">
                        <i class="bi bi-exclamation-triangle-fill text-warning me-2" style="font-size: 1.1rem;"></i>
                        Yakin ingin menghapus?
                    </p>
                    <p class="text-muted small mt-2 mb-0">
                        Data yang dihapus tidak dapat dikembalikan.
                    </p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-3 shadow-sm border-0',
                confirmButton: 'rounded-2 px-4 py-2 fw-semibold',
                cancelButton: 'rounded-2 px-4 py-2 fw-semibold'
            },
            buttonsStyling: true,
            width: '400px',
            padding: '1.5rem'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
});

    const themeToggles = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');
    const themeIcons = document.querySelectorAll('#theme-icon, #theme-icon-mobile');

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        document.documentElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
        updateIcons(theme);
    }

    function updateIcons(theme) {
        themeIcons.forEach(icon => {
            icon.className = theme === 'light' ? 'bi bi-moon-stars-fill' : 'bi bi-sun-fill';
        });
    }

    applyTheme(localStorage.getItem('theme') || 'light');

    themeToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const newTheme = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            applyTheme(newTheme);
        });
    });
</script>
</body>
</html>