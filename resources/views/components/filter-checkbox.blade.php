<div class="input-checkbox">
    <input type="checkbox" id="category-{{ $category->category }}" name="categories[]" value="{{ $category->id }}">
    <label for="category-{{ $category->category }}">
        <span></span>
        {{ $category->category }}

        <small>({{ $productno->count }})</small>
    </label>
</div>
