<div class="mb-3">
  <label class="form-label">Kategori</label>
  <select name="category_id" class="form-select" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $c)
      <option value="{{ $c->id }}" {{ old('category_id', $post->category_id ?? '') == $c->id ? 'selected' : '' }}>
        {{ $c->name }}
      </option>
    @endforeach
  </select>
</div>
<div class="mb-3">
  <label class="form-label">Judul</label>
  <input type="text" name="title" class="form-control" required
         value="{{ old('title', $post->title ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Isi Postingan</label>
  <textarea name="body" class="form-control" rows="6" required>{{ old('body', $post->body ?? '') }}</textarea>
</div>
<button class="btn btn-primary">Simpan Postingan</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>