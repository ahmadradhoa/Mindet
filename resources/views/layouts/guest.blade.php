<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mindet</title>
        <link rel="icon" type="image/png" href="{{ asset('image/Mindet_Logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Dark Mode CSS -->
        <style>
            :root {
                --bg-color: #f3f4f6; /* gray-100 */
                --card-bg: #ffffff;
                --text-main: #111827; /* gray-900 */
            }
            
            [data-theme="dark"] {
                --bg-color: #0f172a; /* slate-900 */
                --card-bg: #1e293b; /* slate-800 */
                --text-main: #f1f5f9; /* slate-100 */
            }
            
            body {
                background-color: var(--bg-color) !important;
                color: var(--text-main) !important;
                transition: background-color 0.3s, color 0.3s;
            }
            
            /* Menggunakan class tambahan agar lebih aman daripada escape character Tailwind */
            .auth-card-bg {
                background-color: var(--card-bg) !important;
                transition: background-color 0.3s;
            }
            
            /* Tombol Toggle Dark Mode - Pojok Kanan Atas */
            .theme-toggle-btn {
                position: fixed;
                top: 20px;
                right: 20px;
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background-color: var(--card-bg);
                border: 1px solid #e5e7eb;
                color: var(--text-main);
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                z-index: 1000;
            }
            
            .theme-toggle-btn:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
            }
            
            [data-theme="dark"] .theme-toggle-btn {
                background-color: #1e293b;
                border-color: #334155;
                color: #f1f5f9;
            }

            /* Memastikan input form juga ikut berubah warna di dark mode */
            [data-theme="dark"] input, 
            [data-theme="dark"] label {
                color: var(--text-main);
            }
            [data-theme="dark"] input {
                background-color: #334155;
                border-color: #475569;
            }

            [data-theme="dark"] .text-gray-500,
            [data-theme="dark"] .text-gray-600,
            [data-theme="dark"] .text-gray-400,
            [data-theme="dark"] .text-gray-700 {
                color: #cbd5e1 !important;
            }

            [data-theme="dark"] label,
            [data-theme="dark"] .form-label {
                color: #f1f5f9 !important;
            }

            [data-theme="dark"] a {
                color: #6366f1 !important;
            }

            [data-theme="dark"] a:hover {
                color: #a5b4fc !important;
            }

            /* Hover "Register" jadi Ungu/Indigo Terang */
            [data-theme="dark"] a[href*="register"]:hover {
                color: #4f46e5 !important; /* Warna ungu muda yang nyala */
            }

            [data-theme="dark"] .form-check-label {
                color: #cbd5e1 !important;
            }

            [data-theme="dark"] hr {
                border-color: #334155 !important;
            }

            [data-theme="dark"] input::placeholder {
                color: #64748b !important;
            }
        </style>
    </head>
    
    <!-- PERBAIKAN 1: Hapus 'text-gray-900' agar warna teks dikendalikan oleh CSS variable -->
    <body class="font-sans antialiased">
        
        <!-- TOMBOL TOGGLE DARK MODE -->
        <button id="theme-toggle" class="theme-toggle-btn" title="Ganti Mode Gelap/Terang">
            <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <!-- PERBAIKAN 2: Ganti 'image' jadi 'images', dan pakai style inline untuk ukuran -->
                    <img src="{{ asset('image/Mindet_Logo.png') }}" alt="Logo App" style="width: 150px; height: 150px; object-fit: contain;">
                </a>
            </div>

            <!-- PERBAIKAN 3: Tambahkan class 'auth-card-bg' untuk background yang responsif terhadap dark mode -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg auth-card-bg">
                {{ $slot }}
            </div>
        </div>
        
        <!-- Dark Mode Script -->
        <script>
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            
            // Icons SVG
            const moonIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>`;
            const sunIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>`;
            
            // Set tema awal dari localStorage (default: light)
            const currentTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', currentTheme);
            themeIcon.innerHTML = currentTheme === 'light' ? moonIcon : sunIcon;
            
            // Toggle tema saat tombol diklik
            themeToggle.addEventListener('click', () => {
                const newTheme = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                themeIcon.innerHTML = newTheme === 'light' ? moonIcon : sunIcon;
            });
        </script>
    </body>
</html>