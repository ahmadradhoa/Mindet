@extends('layouts.forum')
@section('content')
<h4 class="mb-3">Edit Kategori: {{ $category->name }}</h4>
<div class="card p-4">
<form method="POST" action="{{ route('categories.update', $category) }}">
  @csrf @method('PUT')
  @include('categories._form')
</form>
</div>
@endsection