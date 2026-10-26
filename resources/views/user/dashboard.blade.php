<!DOCTYPE html>
<html>
<head><title>User Dashboard</title></head>
<body>
    <h1>User Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
