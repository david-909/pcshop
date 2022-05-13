@forelse ($cart  as $c)
    {{-- @dd($c) --}}
    <tr>
        @foreach ($c->product->images as $i)
            @if ($loop->first)
                <td>
                    <img width="80px" class="img-fluid" src="{{ asset('img/' . $i->path) }}"
                        alt="{{ $i->name }}">
                </td>
            @endif
        @endforeach
        <td class="col-md-3">
            <p class="align-center">{{ $c->product->product }}</p>
        </td>
        <td class="col-md-3">
            <input type="number" class='form-control quantityCart' data-id="{{ $c->id }}"
                value="{{ $c->quantity }}">
        </td>
        <td>
            {{-- @dd(session("totalPrice")) --}}
            <p class="text-danger itemPrice" id="itemPrice">${{ $c->price }}</p>
            {{-- <p>${{ $c->product->price->price * $c->quantity }}</p> --}}
        </td>
        <td>
            <button data-id="{{ $c->id }}" class="btn btn-danger removeCart">Remove</button>
        </td>

    </tr>
@empty
    <h3>No products in your cart</h3>
@endforelse
