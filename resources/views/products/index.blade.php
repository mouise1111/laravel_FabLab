<x-layout>
    <style>
        #pagination svg {
            width: 30px;
        }

        #pagination nav div:nth-of-type(2) div {
            margin-top: 20px;
        }
    </style>
    <div class="container py-5 h-100">
        <div style="    text-align-last: center;">
            @if (session('succes'))
                <div class="alert alert-success">
                    {{ session('succes') }}
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center mt-5"
            style="display: flex; gap:4em; justify-content:center; flex-flow:wrap; text-align:center;">
            {{-- for a user that is not logged in show products --}}
            @foreach ($products as $product)
                <x-product.card :product="$product">
                </x-product.card>
            @endforeach
        </div>

        <div class="p-3 m-3" id="pagination">
            {{ $products->links() }}
        </div>
</x-layout>
