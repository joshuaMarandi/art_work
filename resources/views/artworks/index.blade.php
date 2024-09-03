<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks Listing</title>
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
        <h1>Artworks Listing</h1>
        <div class="artworks-list">
            @foreach ($artworks as $artwork)
                <div class="artwork">
                    <a href="{{ route('artworks.show', $artwork->id) }}">
                        <img src="{{ asset('storage/' . $artwork->image) }}" alt="{{ $artwork->title }}">
                        <h3>{{ $artwork->title }}</h3>
                        <p>${{ $artwork->price }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Art & Culture E-Commerce</p>
    </footer>
</body>
</html>
