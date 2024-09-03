<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Navigation -->
    </header>

    <main>
        <h1>Edit Profile</h1>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </main>
</body>
</html>
