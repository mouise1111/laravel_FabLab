<x-layout>
    <section>
        <form action="{{ route('cart.pay') }}" method="POST">
            @csrf
            <div class="container py-5 h-100">
                <div style="    text-align-last: center;">
                    @if (session('message'))
                        <div class="btn btn-dark btn-block btn-lg">
                            <h5 class="mb-0 text-muted text-white"> {{ session('message') }}</h5>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="btn btn-warning btn-block btn-lg">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="btn btn-danger btn-block btn-lg">
                            {{ session('warning') }}
                        </div>
                    @endif
                </div>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                                <h6 class="mb-0 text-muted">
                                                    Items
                                                    {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}
                                                </h6>
                                            </div>
                                            <hr class="my-4">

                                            @foreach ($cart as $product)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">

                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-black mb-0">{{ $product->name }}</h6>
                                                    </div>

                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <a href="/cart/decrease/{{ $product->rowId }}"
                                                            class="btn">-</a>
                                                        <input min="0" name="quantity" value="{{ $product->qty }}"
                                                            class="form-control form-control-sm" />
                                                        <a href="/cart/increase/{{ $product->rowId }}"
                                                            class="btn">+</a>
                                                    </div>

                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">{{ $product->price }} EUR</h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="/cart/remove/{{ $product->rowId }}"
                                                            class="text-muted"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <hr class="my-4">

                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Subtotal</h5>
                                                <h5>
                                                    {{ $subtotal }}

                                                </h5>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">tax (21%)</h5>
                                                <h5>{{ $tax }}</h5>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5>{{ $total }}</h5>
                                                <input type="hidden" value="{{ $total }}" name="value">
                                            </div>
                                            @auth
                                                <button type="submit" class="btn btn-primary btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Pay</button>
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="btn btn-dark btn-block btn-lg">Login</a>
                                                <p>You must be logged in before checkout</p>
                                            @endauth


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-layout>
