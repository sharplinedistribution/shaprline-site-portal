<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5GLTSRS');</script>
        <!-- End Google Tag Manager -->
        
        
     <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6JKCZCTKBN"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-6JKCZCTKBN');
        gtag('config', 'AW-10979779748');
        </script>
    <!-- Global site tag (gtag.js) - Google Ads: 10979779748 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack('title')</title>
    <link rel="icon" href="wp-content/uploads/2022/03/cropped-favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="wp-content/uploads/2022/03/cropped-favicon-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="wp-content/uploads/2022/03/cropped-favicon-180x180.png">
    @include('frontend.partials.revamp.styles')
    @stack('styles')
    <style>
    .navbar-toggler {
        border: var(--bs-border-width) solid #101010;
    }
  
    </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GLTSRS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1287772428430048');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=1287772428430048&ev=PageView&noscript=1"/>
    </noscript>
        <!-- End Meta Pixel Code -->
    <!--  Clickcease.com tracking-->
    <script type='text/javascript'>var script = document.createElement('script');
        script.async = true; script.type = 'text/javascript';
        var target = 'https://www.clickcease.com/monitor/stat.js';
        script.src = target;var elem = document.head;elem.appendChild(script);
    </script>
    <noscript>
        <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com/stats/stats.aspx' alt='ClickCease'/></a>
    </noscript>
    <!--  Clickcease.com tracking-->
    <main class="main-page">
        @include('frontend.partials.revamp.header')
        @yield('content')
        @include('frontend.partials.revamp.footer')
    </main>
    @include('frontend.partials.revamp.scritps')

    <script>
      function notify(message, type) {
         $.notify({
            message: message
         }, {
            animate: {
               enter: "animated fadeInUp",
               exit: "animated fadeOutDown"
            },
            type: type,
            timer: 400,
         });
      }
      @if(Session::has('success'))
      notify("{{Session::get('success')}}", "success");
      @endif
      @if(Session::has('error'))
      notify("{{Session::get('error')}}", "danger");
      @endif
   </script>
   
    @stack('scripts')
</body>
</html>
