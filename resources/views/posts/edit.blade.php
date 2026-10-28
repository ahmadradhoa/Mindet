@extends('layouts.forum')
@section('content')
<h4 class="mb-3">Edit Post</h4>
<div class="card p-4">
<form method="POST" action="{{ route('posts.update', $post) }}">
  @csrf @method('PUT')
  @include('posts._form')
</form>
</div>
@endsection