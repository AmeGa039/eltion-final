<!DOCTYPE html>
<html>
<head>
    <title>Event App</title>
</head>
<body>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @auth
        <p>Logged in as {{ auth()->user()->name }} | <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    @endauth

    <hr>

    @yield('content')
</body>
</html>
