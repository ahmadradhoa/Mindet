@extends('layouts.forum')
@section('content')
<h4 class="mb-3">Buat Postingan Baru</h4>
<div class="card p-4">
<form method="POST" action="{{ route('posts.store') }}">
  @csrf
  @include('posts._form')
</form>
</div>
@endsection