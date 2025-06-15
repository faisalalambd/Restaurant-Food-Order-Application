<html>
<title>Admin Dashboard Page</title>

<body>

    <h1>Admin Dashboard</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif

    @if (Session::has('error'))
        <li>{{ Session::get('error') }}</li>
    @endif

    @if (Session::has('success'))
        <li>{{ Session::get('success') }}</li>
    @endif

    <a href="{{ route('admin.logout') }}">Logout</a>

</body>

</html>
