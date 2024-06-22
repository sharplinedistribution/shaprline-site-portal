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
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Sharpline @stack('title') </title>
   @include('user-portal.partial.styles')
   <style>
      .alert {
         width: 300px !important;
      }

      .loader {
         position: fixed;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background: url('http://edsapps.com/sharp-line//public/loader/loader.gif') 50% 50% no-repeat rgb(255, 255, 255, 0.5);
         background-size: 120px
      }

      input:focus {
         /* background-color: black; */
         color: white !important;
      }

   </style>
   @stack('styles')
</head>

<body>
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
   <div class="loader" style="display: none">
    <div id="loaderMsg" class="text-center" style="margin-top:35rem !important; color: black; font-wieght:bold">
    </div>
   </div>
   <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
         <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{route('user.dashboard')}}"><img src="{{asset('portal/assets/images/logoSharpline.png')}}" alt="logo" class="img__logo" /></a>
         </div>
         @include('user-portal.partial.nav')
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
         <!-- partial:partials/_navbar.html -->
         <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
               <a class="navbar-brand brand-logo-mini" href="#index.html"><img src="{{asset('portal/assets/images/logoSharpline.png')}}" alt="logo" /></a>
            </div>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
               <span class="mdi mdi-format-line-spacing"></span>
            </button>
         </nav>
         <!-- partial -->
         <div class="main-panel">
            @yield('content')
         </div>
         <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   </div>
   <!-- container-scroller -->
   @include('user-portal.partial.scripts')

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
