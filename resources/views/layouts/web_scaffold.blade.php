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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack('title') Sharpline</title>
    <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/sharpline.png')}}">
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
    <div class="container-fluid header-bg">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{url('/')}}"><img src="{{asset('web/images/logoSharpline.png')}}" alt="Sharpline LOGO" class="header-logo"></a>
            @auth
                <div class="button-header">
                    {{-- <a href="" class="btn btn-sm btn-cst text-white">{{auth()->user()->email}}</a> --}}
                    <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-cst bg-yellow">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @stack('scripts')
    <script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

</body>

</html>
