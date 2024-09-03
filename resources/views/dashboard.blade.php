<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art & Culture E-Commerce</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('artworks.index') }}">Artworks</a></li>
                <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to Art & Culture E-Commerce</h1>
        <section>
            <h2>Featured Artworks</h2>
            <div class="featured-artworks">
                @foreach ($featuredArtworks as $artwork)
                    <div class="artwork">
                        <a href="{{ route('artworks.show', $artwork->id) }}">
                            <img src="{{ asset('storage/' . $artwork->image) }}" alt="{{ $artwork->title }}">
                            <h3>{{ $artwork->title }}</h3>
                            <p>${{ $artwork->price }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Art & Culture E-Commerce</p>
    </footer>
</body>
</html>
