<x-layout>
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <h3>{{ $product->name }}</h3>
        <h4>{{ $product->price }} EUR</h4>
        <h6>{{ $product->company }}</h6>
        <p>{{ $product->description }}</p>
        {{-- @role('user')
            <button type="submit" class="btn btn-primary btn-block btn-lg" data-mdb-ripple-color="dark">Add to Cart</button>
        @endrole --}}
        <button type="submit" class="btn btn-primary btn-block btn-lg" data-mdb-ripple-color="dark">Add to Cart</button>
    </form>
</x-layout>
