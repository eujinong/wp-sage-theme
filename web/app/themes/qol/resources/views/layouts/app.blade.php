<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="{{ App\asset('/dist/styles/main.css') }}">
  <link rel="shortcut icon" href="{{ App\asset('/dist/media/brands/favicon.ico') }}"/>
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29717765-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-29717765-2');
  </script>
  <!-- End Google Analytics -->
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '387209718810218'); 
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" 
  src="https://www.facebook.com/tr?id=387209718810218&ev=PageView
  &noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
  {{ wp_head() }}
  <title><?php wp_title(); ?></title>
</head>
<body class="{{ implode(' ', get_body_class()) }}">
<div class="site">
  @include('layouts.partials.header')
  <div class="site-content">
    @yield('content')
  </div>
  @include('layouts.partials.footer')
</div>
<app-tent class="site-tent"></app-tent>
{{ wp_footer() }}

<script type="text/javascript" src="{{ App\asset('/dist/scripts/polyfills.js') }}"></script>
<script type="text/javascript" src="{{ App\asset('/dist/scripts/main.js') }}"></script>
@stack('scripts')

</body>
</html>
