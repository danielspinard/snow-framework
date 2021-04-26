<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link 
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        crossorigin="anonymous"
    >

    @stack('style')

    <title>{{ $title_page ?? env('APP_NAME') }}</title>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"
    >
    </script>

    @stack('script')
</body>

</html>