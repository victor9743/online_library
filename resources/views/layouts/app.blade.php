<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Biblioteca')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="py-4">
<div class="container">
  <h1 class="mb-4">@yield('title', 'Biblioteca')</h1>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @yield('content')
</div>
</body>
</html>
