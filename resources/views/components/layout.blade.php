<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FabLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/129f3f8807.js" crossorigin="anonymous"></script>
</head>
<style>
    #admin-manage {
        color: white;
        border: 1px solid red;
    }
</style>

<body>
    <header style="color: white;">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-3">
            <a routerLink="/" class="navbar-brand" href="/">FabLab</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <span class="m-1" style="border-right: 1px solid; "></span>
                @role('administrator')
                    <li class="nav-item" id="admin-manage">
                        <a class="nav-link" href="/admin">
                            Manage
                        </a>
                    </li>
                @endrole
                @auth
                    <li class="nav-item ms-2" style="align-self: center">Welcome {{ Auth::user()->name }}</li>
                    {{-- <li class="nav-item ms-2" style="align-self: center">Card: {{ Auth::user()->card->value }}</li> --}}
                    <li class="nav-item ms-2" style="align-self: center">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    <main class="p-3">
        @auth
            @role('user')
                <div style="display:flex; justify-content:space-between;">
                    <div>
                        <a href="/card/{{ Auth::user()->card->id }}">
                            <i class="fa-solid fa-id-card-clip pe-1"></i> {{ Auth::user()->card->value }} EUR
                        </a>
                    </div>
                    <div>
                        <a href="/cart" style="text-decoration: none">
                            <i class="fa-solid fa-cart-shopping pe-1">
                            </i>
                            {{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}
                        </a>
                    </div>
                </div>
            @endrole
        @endauth
        {{ $slot }}
    </main>

    @include('partials._footer')
</body>

</html>
