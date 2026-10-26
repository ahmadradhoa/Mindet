<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mindet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">Mindet</a>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-light btn-sm" href="{{ route('posts.index') }}">Beranda</a>
      <a class="btn btn-outline-light btn-sm" href="{{ route('categories.index') }}">Kategori</a>
      <a class="btn btn-warning btn-sm" href="{{ route('posts.create') }}">+ Posting</a>
      
      @auth
        <span class="navbar-text text-light small align-self-center ms-2">Halo, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
      @else
        <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
      @endauth
    </div>
  </div>
</nav>

<div class="container" style="max-width: 900px;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>