<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title ?? 'Welcome' }} | {{ env('APP_NAME') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito" >
    <link rel="stylesheet" href="@asset('assets/css/snow-framework.css')">
</head>
<body>
    @yield('content')
</body>

</html>