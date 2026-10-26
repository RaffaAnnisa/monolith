<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h1>Register</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <p><label>Nama<br><input type="text" name="name" value="{{ old('name') }}" required></label></p>
        <p><label>Email<br><input type="email" name="email" value="{{ old('email') }}" required></label></p>
        <p><label>Password<br><input type="password" name="password" required></label></p>
        <p><label>Konfirmasi Password<br><input type="password" name="password_confirmation" required></label></p>
        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
