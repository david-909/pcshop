{{-- @dd($filter->values) --}}
@foreach ($filter->values as $f)
    <div class="input-checkbox">
        <input name="filtervalue[]" type="checkbox" id="filter-{{ $filter->filter }}-{{ $f->id }}"
            value="{{ $f->id }}">
        <label for="filter-{{ $filter->filter }}-{{ $f->id }}">
            <span></span>
            {{ $f->filter_value }}
        </label>
    </div>
@endforeach
