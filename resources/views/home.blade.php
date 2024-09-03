@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to Art & Culture E-Commerce</h1>

    <section>
        <h2>Featured Artworks</h2>
        <div class="artwork-list">
            @foreach ($featuredArtworks as $artwork)
                <div class="artwork-card">
                    <img src="{{ $artwork->image_url }}" alt="{{ $artwork->title }}">
                    <h3>{{ $artwork->title }}</h3>
                    <p>{{ $artwork->description }}</p>
                    <p>${{ $artwork->price }}</p>
                    <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-primary">View Details</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
