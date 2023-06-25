<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <main class="py-4">
            @include('partials.fenavbar')
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>   
</body>

<footer class="py-3 my-4 border-top mt-auto">
    <div class="col-md-12">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <span class="mb-3 mb-md-0 text-muted">© 2023 Blog Mamacado.ro</span>
    </div>
</footer>

</html>
