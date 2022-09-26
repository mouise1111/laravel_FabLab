@props(['product'])
<div class="card" style="width: 18rem;">
    {{-- <img src="" class="card-img-top" alt="..."> --}}
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <h6>{{ $product->price }} EUR</h6>
        {{-- <p class="card-text">{{ $product->description }}</p> --}}
        <a href="/products/{{ $product->id }}" class="btn btn-primary">View Details</a>
    </div>
</div>
