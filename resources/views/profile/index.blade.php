@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Your Profile</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('profile.edit') }}">Edit Profile</a>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')
        <input type="password" name="password" placeholder="Confirm your password to delete account" required>
        <button type="submit">Delete Account</button>
    </form>
@endsection
