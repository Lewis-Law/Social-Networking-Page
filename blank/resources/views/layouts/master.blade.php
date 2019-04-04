<html>
<head>
    <title>@yield('title')</title>
      <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{secure_asset('css/wp.css')}}">
</head>
<body>
    <a href="/post">home</a>
    @yield('content')
</body>
</html>