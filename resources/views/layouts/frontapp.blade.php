<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LLC8XBCHXF"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-LLC8XBCHXF');
    </script>
    
    <!-- GetYourGuide Analytics -->
    <script async defer src="https://widget.getyourguide.com/dist/pa.umd.production.min.js" data-gyg-partner-id="228UN0Y"></script>

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

    <!-- fancybox css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @include('cookie-consent::index')

</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <main>
            @include('partials.fenavbar')
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();

            //display images from post as a gallery via fancybox->add the link dynamically for each img
            $( ".article-body img" ).each(function( index ) {
                var img_src = $( this ).attr('src');
                $( this ).wrap( "<a href='" + img_src + "' data-fancybox='gallery' ></a>" );
            });
        });
    </script>   
</body>

<footer class="py-3 my-4 border-top mt-auto">
    <a style="height: 90px; width: 700px; max-width: 100%;" 
        href="https://event.2performant.com/events/click?ad_type=banner&unique=2df8ddfa1&aff_code=a9b395de2&campaign_unique=39849df4a" 
        target="_blank" rel="nofollow"><img src="https://img.2performant.com/system/paperclip/banner_pictures/pics/210674/original/210674.jpg" 
        alt="sabon.ro" title="sabon.ro" border="0" height="60px" width="468px" style="max-width: 100%;" />
    </a>
    <div class="col-md-12">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <span class="mb-3 mb-md-0 text-muted">© 2023 Blog Mamacado.ro</span>
    </div>
</footer>

</html>
