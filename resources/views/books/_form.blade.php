<div class="mb-3">
  <label>Título</label>
  <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" class="form-control" required>
  @error('title')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label>Descrição</label>
  <textarea name="description" class="form-control">{{ old('description', $book->description ?? '') }}</textarea>
  @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label>Autor</label>
  <select name="author_id" class="form-control" required>
    <option value="">-- selecione --</option>
    @foreach($authors as $author)
      <option value="{{ $author->id }}" {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
    @endforeach
  </select>
  @error('author_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label>Categoria</label>
  <select name="category_id" class="form-control" required>
    <option value="">-- selecione --</option>
    @foreach($categories as $cat)
      <option value="{{ $cat->id }}" {{ old('category_id', $book->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
  </select>
  @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label>Valor (R$)</label>
  <input type="number" step="0.01" name="price" value="{{ old('price', $book->price ?? 0) }}" class="form-control" required>
  @error('price')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label>Status</label>
  <select name="status" class="form-control" required>
    @foreach($statuses as $key => $label)
      <option value="{{ $key }}" {{ old('status', $book->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
  </select>
  @error('status')<div class="text-danger">{{ $message }}</div>@enderror
</div>
