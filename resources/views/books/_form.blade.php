<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" class="form-control" required>
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Author</label>
    <select name="author_id" class="form-control" required>
        <option value="">-- selecione --</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
        @endforeach
    </select>
    @error('author_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- selecione --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id', $book->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
    </select>
    @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Value (R$)</label>
    <input type="text" step="0.01" name="value" id="value" value="{{ old('value', $book->value ?? 0) }}" class="form-control" required>
    @error('value')<div class="text-danger">{{ $message }}</div>@enderror
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

<script src="https://unpkg.com/imask"></script>
<script>
    document.getElementById('value').addEventListener('input', function () {
        let value = this.value;

        // Remove everything that is not a number.
        value = value.replace(/\D/g, "");

        // If it's empty, don't format it.
        if (value === "") {
            this.value = "";
            return;
        }

        // Insert a comma for 2 decimal places.
        value = (value / 100).toFixed(2) + "";

        // Replace the period with a comma.
        value = value.replace(".", ",");

        this.value = value;
    });
</script>