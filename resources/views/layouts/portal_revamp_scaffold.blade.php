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
    <title>@stack('title') Sharpline</title>
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/sharpline.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    @include('user-portal.partial.revamp.styles')
    @stack('styles')
    <style>
        .btn-primary:hover {
            background-color: #FFF301;
            color: black;
            border: 1px solid black;
        }
        .msb .navbar {
            margin-top: -50px !important;
        }
        .msb .navbar-header {
            padding-bottom: 0px;
        }

        .swal2-popup {
            border: #FFF301 solid 1px !important;
        }

        .swal2-styled.swal2-confirm {
            background-color: #FFF301 !important;
            color: black !important;
        }


        .swal2-popup {
            width: auto;

        }


        .loader {
         position: fixed;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background: url('/loader/loader.gif') 50% 50% no-repeat rgb(225 222 136 / 50%);
         background-size: 120px
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
    <div class="loader" style="display:none"></div>
    <main>
        <!--msb: main sidebar-->
        @include('user-portal.partial.revamp.nav')
        <div class="overlay d-none"></div>
        <!--main content wrapper-->
        <div class="mcw">
            <!--navigation here-->
            <!--main content view-->
            <div class="container-fluid pb-4">
                <div class="row pt-4 pb-4 px-lg-4 px-2">
                    <div class="col-12 d-flex justify-content-between align-items-center res-header">

                        <div class="ps-3 d-lg-none d-inline-block">
                            <a href="#" id="msbo" class="menu-toggle"><img src="{{ asset('assets/portal-revamp/img/menu.png')}}" width="20"
                                    alt=""></a>
                        </div>

                        <div class="logo d-lg-none d-inline-block">
                            <img src="{{ asset('assets/portal-revamp/img/logoSharpline.png')}}" alt="">
                        </div>
                        <div class="search mx-auto d-lg-block d-none">
                            <form action="">
                                <div class="position-relative search-icon">
                                    <input type="text" placeholder="Search" class="form-control search">
                                    <i class="fa fa-search"></i>
                                </div>

                            </form>
                        </div>

                        <div class="profile-dropdown">
                            <div class="dropdown  d-inline-block">
                                <button class="btn btn-secondary dropdown-toggle bg-transparent border-0 px-0"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://sharplinedistribution.com/assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg" style="height:50px; width:50px;">
                                </button>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="{{route('user.accounts.editMyAccount')}}">My Account</a></li>
                                    <li>

                                        <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">Logout</a>
                                        <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>


                    <div class="d-flex justify-content-between mt-4 align-items-center">
                        <div>
                            <h2 class="user-name">
                                Hi, <span>{{auth()->user()?->name??''}}</span>
                            </h2>
                            @if(auth()?->user()?->is_subscribed != 1){!! trialExpiry() !!} @else {!! subscriptionExpiry() !!} @endif
                        </div>
                        <div class="mt-sm-0 mt-3">
                            @stack('button')
                        </div>

                    </div>
                    <div class="mt-sm-0 mt-3">
                        @stack('buttonContent')
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </main>
    @include('user-portal.partial.revamp.scripts')

    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        function notify(message, type) {
           $.notify(message,type);
        }
        @if(Session::has('success'))
        notify("{{Session::get('success')}}", "success");
        @endif
        @if(Session::has('error'))
        // notify("{{Session::get('error')}}", "error");
            Swal.fire({
                icon: 'error',
                text: '{{Session::get("error")}}',
            })
        @endif


        @if(Session::has('Success'))
        // notify("{{Session::get('error')}}", "error");
            Swal.fire({
                icon: 'success',
            text: '{{Session::get("Success")}}',
            })
        @endif

        function closeModal(elm){
            $('.modal').modal('hide');
        }
     </script>
</body>

</html>
