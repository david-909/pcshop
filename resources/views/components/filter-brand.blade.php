<div class="input-checkbox">
    <input type="checkbox" id="brand-{{ $brand->id }}" name="brand[]" value="{{ $brand->id }}">
    <label for="brand-{{ $brand->id }}">
        <span></span>
        {{ $brand->brand }}
        {{-- @dd($brandNo, $brand) --}}
        @foreach ($brandNo as $b)
            @if ($brand->id == $b->brand_id)
                <small>({{ $b->count }})</small>
            @endif
            {{-- @dd($brand->id)
            @if (!in_array($brand->id, $brandNo))
                <small>(0)</small>
            @endif --}}
        @endforeach
    </label>
</div>
