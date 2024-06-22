<!DOCTYPE html>
<html lang="en">
   <head>
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
      <title>@stack('title') Sharpline Distribution</title>
      <link rel="icon" type="image/x-icon" href="{{asset('web/images/sharpline.png')}}">
      <link rel="stylesheet" href="{{asset('assets/portal-revamp/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      <link rel="stylesheet" href="{{asset('assets/portal-revamp/css/style.css')}}">
      @stack('styles')
      <style>
        .btn-primary:hover {
            background-color: #FFF301;
            color: black;
            border: 1px solid black;
        }
    </style>
   </head>
   <body>
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
        @yield('content')
        <script src="{{asset('assets/portal-revamp/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/portal-revamp/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/portal-revamp/js/custom.js')}}"></script>
        @stack('scripts')


   </body>
</html>
