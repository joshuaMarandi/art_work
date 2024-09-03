<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Art & Culture E-Commerce</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Navigation Bar -->
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('artworks.index') }}">Artworks</a></li>
                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                @auth
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    @if (Auth::user()->isAdmin())
                        <li><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Art & Culture E-Commerce. All rights reserved.</p>
    </footer>
</body>
</html>
