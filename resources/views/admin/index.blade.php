<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-bg-3 text-center">
                <h2>
                    <a class="nav-link" href="/admin/users">Users</a>
                </h2>
            </div>
            <div class="col-bg-3 text-center">
                <h2>
                    <a class="nav-link" href="/admin/products">Products</a>
                </h2>
            </div>
            <div class="col-bg-3 text-center">
                <h2>
                    <a class="nav-link" href="/admin/payments">Payments</a>
                </h2>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

</x-layout>
