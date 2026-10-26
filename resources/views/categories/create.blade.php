@extends('layouts.forum')
@section('content')
<h4 class="mb-3">Tambah Kategori</h4>
<div class="card p-4">
<form method="POST" action="{{ route('categories.store') }}">
  @csrf
  @include('categories._form')
</form>
</div>
@endsection