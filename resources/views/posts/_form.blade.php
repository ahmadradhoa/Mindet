<div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category_id" class="form-select" required>
    <option value=""> Select Category </option>
    @foreach($categories as $c)
      <option value="{{ $c->id }}" {{ old('category_id', $post->category_id ?? '') == $c->id ? 'selected' : '' }}>
        {{ $c->name }}
      </option>
    @endforeach
  </select>
</div>
<div class="mb-3">
  <label class="form-label">Title</label>
  <input type="text" name="title" class="form-control" required
         value="{{ old('title', $post->title ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Content</label>
  <textarea name="body" class="form-control" rows="6" required>{{ old('body', $post->body ?? '') }}</textarea>
</div>
<div class="d-flex gap-2">
  <button type="submit" class="btn btn-primary btn-form">Post</button>
  <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-form">Cancel</a>
</div>