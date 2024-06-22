<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg bg-transparent navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('assets/revamp/img/logoSharpline.png') }}" width="171"
                                height="73" alt=""></a>
                        <button class="navbar-toggler hideNav" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse hideNav" id="navbarSupportedContent" >
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('site.aboutUs')}}">ABOUT US</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('site.successStories')}}">SUCCESS STORIES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('site.pricing')}}">PRICING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('site.faqs')}}">FAQ's</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('site.contact')}}">CONTACT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('register')}}">SIGN UP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3" aria-current="page"
                                        href="{{route('login')}}">SIGN IN</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
