<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artwork->title }}</title>
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
        <h1>{{ $artwork->title }}</h1>
        <div class="artwork-detail">
            <img src="{{ asset('storage/' . $artwork->image) }}" alt="{{ $artwork->title }}">
            <div class="artwork-info">
                <p>{{ $artwork->description }}</p>
                <p>Price: ${{ $artwork->price }}</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Art & Culture E-Commerce</p>
    </footer>
</body>
</html>
