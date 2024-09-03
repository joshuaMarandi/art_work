<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('artworks.index') }}">Artworks</a></li>
                <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Checkout</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Artwork</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->artwork->title }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $item->quantity * $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Place Order</button>
        </form>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Art & Culture E-Commerce</p>
    </footer>
</body>
</html>
