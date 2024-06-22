@extends('layouts.revamp_scaffold')
@push('title')
Sharpline Distro | Global Music Distribution &amp; Marketing
@endpush
@push('styles')
<style>
.a {
    fill: none;
    stroke: ##DBDADE;
    stroke-linecap: round;
    stroke-linejoin: round;
}
.wd svg{
    height : 90px;
}
</style>
@endpush
@section('content')
<section class="home-main-banner pt-md-0 pt-5 pb-md-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-banner-content">
                        <h1 class="font-oswald text-color-primary">SELL & PROMOTE YOUR MUSIC & VIDEOS WORLDWIDE</h1>
                        <p>Sharpline Distro offers talented artists world class music & video distribution & marketing services to major streaming platforms. Sell your music on Spotify, Apple Music, VEVO, Deezer, SoundCloud, TikTok, YouTube, Google Play Music, and more. Enjoy exclusive Free marketing services on music blogs, playlists & much more.</p>

                        <a href="{{route('register')}}" class="btn btn-primary text-capitalize me-3 mt-2">START FREE TRIAL</a>
                        <a href="{{route('login')}}" class="btn btn-primary text-capitalize mt-2">SIGN IN</a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="main-banner-img mt-md-4 mt-0">
                        <img src="{{asset('assets/revamp/img/banner-image.png')}}" class="img-fluid h-auto" width="540" height="540" alt="">
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="music-marketing">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-9 col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="music-market-left">
                            <h2 class="font-oswald text-white">FREE MUSIC MARKETING</h2>
                            <div class="sharp-divider me-0 mb-4 ms-0 mt-3"></div>
                            <h4 class="font-oswald text-white mb-3">Featured in :</h4>
                            <img src="{{ asset('assets/revamp/img/Combined21.png') }}" class="img-fluid" width="349" height="175"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="music-market-right">
                            <h3 class="text-white font-oswald mb-5">RELEASING MUSIC WITH <span
                                    class="text-color-primary">SHARPLINE</span> IS FAST AND EASY</h3>

                            <h3 class="text-white font-oswald">WE PROMOTE EVERY SONG RELEASED UNDER <span
                                    class="text-color-primary">SHARPLINE</span> FOR <span
                                    class="text-color-primary">FREE</span> ON THE PRESS, SPOTIFY & SOCIAL MEDIA
                            </h3>

                            <p class=" mt-5">Sharpline Distro has been at the forefront in offering independent
                                artists & labels major record label services such as music distribution,
                                playlist promotion, music pr services & creative marketing campaigns in the
                                press</p>

                            <p class="mb-5 mt-4">In 2021 alone, over 50 artists affiliated to Sharpline Distro
                                earned over One Million Dollars In Royalties with hundreds earning over $50,000
                                in royalties during the same period.</p>

                            <a href="{{route('site.aboutUs')}}" class="btn btn-primary text-capitalize px-3 me-2">READ
                                MORE</a>
                            <a href="{{url('success-stories')}}" class="btn btn-primary text-capitalize px-3">SUCCESS
                                STORIES</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="font-oswald text-white">WHY CHOOSE SHARPLINE DISTRO</h1>
                <div class="sharp-divider  mt-3"></div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 col-sm-6  mb-3">
                <div class="why-details">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        class="ghostkit-svg-icon ghostkit-svg-icon-pe-7s"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="468.402px"
                        height="468.402px" viewBox="0 0 468.402 468.402"
                        style="enable-background:new 0 0 468.402 468.402;" xml:space="preserve">
                        <g>
                            <path fill="#FBDA03"
                                d="M234.2,0.002C105.061,0.002,0,105.061,0,234.202C0,363.341,105.061,468.4,234.2,468.4
                                c129.14,0,234.202-105.074,234.202-234.198C468.402,105.061,363.34,0.002,234.2,0.002z M234.2,444.861
                                c-116.153,0-210.65-94.512-210.65-210.65c0-116.157,94.497-210.659,210.65-210.659c116.151,0,210.65,94.493,210.65,210.65
                                C444.851,350.353,350.352,444.861,234.2,444.861z M234.2,153.504c-44.496,0-80.693,36.201-80.693,80.69
                                c0,44.495,36.197,80.698,80.693,80.698c44.494,0,80.689-36.195,80.689-80.698C314.89,189.706,278.694,153.504,234.2,153.504z
                                 M234.2,291.34c-31.512,0-57.142-25.636-57.142-57.146c0-31.504,25.629-57.138,57.142-57.138c31.515,0,57.138,25.634,57.138,57.138
                                C291.338,265.705,265.715,291.34,234.2,291.34z M412.09,187.408l-78.501,28.25l-7.983-22.153l78.506-28.254L412.09,187.408z
                                 M189.72,143.646l-40.563-82.547c0,0,34.017-31.448,102.055-21.187l-13.089,96.198C238.123,136.11,211.63,128.559,189.72,143.646z
                                 M310.963,58.775l-52.438,79.037l13.248-94.138C271.766,43.673,304.547,49.644,310.963,58.775z M173.644,305.691l-58.779,77.279
                                c-55.367-40.848-57.18-87.138-57.18-87.138l87.045-29.699C149.556,292.306,173.636,305.707,173.644,305.691z M132.057,394.844
                                l57.206-75.929l-18.801,92.976C159.464,413.811,132.057,394.844,132.057,394.844z"></path>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>

                    <h4 class="text-white font-oswald mt-4">UNLIMITED MUSIC DISTRIBUTION</h4>
                    <p class="mt-4">We get your music playing in over 150 digital stores including Spotify,
                        Apple Music, TikTok, YouTube, Tidal across 200+ countries worldwide. Our plans start at
                        $30.99/year and it includes other brilliant services to help push your career forward.
                        Start releasing your music to all major music platforms for free, without giving up your
                        rights</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6  mb-3">
                <div class="why-details wd">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="youtube"><g data-name="youtube youtuber video play"><path d="M30 12a5.71 5.71 0 0 0-5.31-5.7C18.92 6 13.06 6 7.33 6.28 4.51 6.28 2 9 2 12a43.69 43.69 0 0 0 0 8.72 5.32 5.32 0 0 0 5.28 5.33q4.35.24 8.72.24t8.67-.23A5.34 5.34 0 0 0 30 20.8a31.67 31.67 0 0 0 0-8.8Zm-2 8.63a.49.49 0 0 0 0 .12 3.36 3.36 0 0 1-3.39 3.34 166 166 0 0 1-17.28 0A3.36 3.36 0 0 1 4 20.65a42 42 0 0 1 0-8.47.45.45 0 0 0 0-.11 3.78 3.78 0 0 1 3.38-3.79c2.86-.13 5.74-.19 8.62-.19s5.76.06 8.62.19h.05c1.71 0 3.33 1.84 3.33 3.79a.76.76 0 0 0 0 .15 30.11 30.11 0 0 1 0 8.39Z" fill="#fbda03"/><path d="m20.79 15.51-7.14-3.68a1 1 0 1 0-.92 1.78l5.43 2.79-4 2.07V16.4a1 1 0 0 0-2 0v3.72a1 1 0 0 0 1 1 1 1 0 0 0 .46-.11l7.14-3.72a1 1 0 0 0 .54-.89 1 1 0 0 0-.51-.89Z" fill="#fbda03"/></g></svg>

                    <h4 class="text-white font-oswald mt-4">UNLIMITED MUSIC VIDEO DISTRIBUTION TO VEVO</h4>
                    <p class="mt-4">Set up an Official Vevo Channel, upload all of your music videos and keep 100% of the royalties you generate. With Sharpline Distro, it's easy to get your visuals live on Vevo and start earning even more from your music.. Distributing your music videos on VEVO will help you find new fans, generate more engagement, and increase the revenue you make from streaming royalties compared to uploading to YouTube alone plus VEVO pays 3X more revenue than YouTube.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6  mb-3">
                <div class="why-details">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        class="ghostkit-svg-icon ghostkit-svg-icon-pe-7s"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496 496" width="468.402px" height="468.402px"
                        style="enable-background:new 0 0 496 496;" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path fill="#FBDA03"
                                        d="M216,40c-97.048,0-176,78.952-176,176h16c0-88.224,71.776-160,160-160V40z">
                                    </path>
                                    <path fill="#FBDA03"
                                        d="M216,136c-44.112,0-80,35.888-80,80s35.888,80,80,80s80-35.888,80-80S260.112,136,216,136z M216,280
                                        c-35.288,0-64-28.712-64-64c0-35.288,28.712-64,64-64c35.288,0,64,28.712,64,64C280,251.288,251.288,280,216,280z">
                                    </path>
                                    <path fill="#FBDA03"
                                        d="M424.888,323.672C425.04,323.96,440,353.488,440,392c0,38.512-14.96,68.04-15.112,68.328l14.208,7.352
                                        C439.8,466.352,456,434.576,456,392s-16.2-74.352-16.896-75.68L424.888,323.672z"></path>
                                    <path fill="#FBDA03" d="M470.912,291.968l-13.832,8.064C457.32,300.424,480,339.936,480,392c0,51.848-22.688,91.584-22.912,91.976l13.832,8.056
                                        C471.936,490.272,496,448.344,496,392S471.936,293.728,470.912,291.968z">
                                    </path>
                                    <path fill="#FBDA03" d="M216,0C96.896,0,0,96.896,0,216s96.896,216,216,216c8.008,0,16.024-0.6,24-1.488V464h54.112l64,32H400V328.944
                                        c20.896-33.976,32-72.952,32-112.944C432,96.896,335.104,0,216,0z M288,448h-32v-16h16v-16h-16v-16h16v-16h-16v-16h16v-16h-16
                                        v-16h32V448z M352,475.056l-48-24V332.944l48-24V475.056z M384,480h-16V304h16V480z M358.112,288l-64,32H240v94.424
                                        c-7.968,0.952-15.992,1.576-24,1.576c-110.28,0-200-89.72-200-200S105.72,16,216,16s200,89.72,200,200
                                        c0,27.024-5.536,53.536-16,78.136V288H358.112z"></path>
                                    <path fill="#FBDA03" d="M216,200c8.816,0,16,7.176,16,16h16c0-17.648-14.352-32-32-32s-32,14.352-32,32s14.352,32,32,32
                                        c8.968,0,17.608-3.872,23.712-10.64l-11.872-10.72c-3.12,3.456-7.328,5.36-11.84,5.36c-8.824,0-16-7.176-16-16
                                        C200,207.176,207.176,200,216,200z"></path>
                                </g>
                            </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>

                    <h4 class="text-white font-oswald mt-4">MUSIC PROMOTION CAMPAIGN ON BLOGS</h4>
                    <p class="mt-4">Sharpline Distro offers headline-grabbing music publicity campaigns for
                        talented artists across all genres globally. We have a reputation for creative marketing
                        and music publicity campaigns. Our artists have been featured on major blogs such as
                        Complex, Billboard, Notion Magazine & more</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6  mb-3">
                <div class="why-details">
                    <svg width="1024px" height="1024px" viewBox="0 0 1024 1024"
                        xmlns="http://www.w3.org/2000/svg" class="ghostkit-svg-icon ghostkit-svg-icon-pe-7s">
                        <path fill="#FBDA03"
                            d="M417.534 310.746c154.872 4.207 274.084 22.042 384.678 78.14 15.627 8.013 34.46 19.433 40.67 33.859 5.81 13.424 2.404 41.473-7.413 48.484-13.824 10.018-41.673 14.826-56.099 7.413-113.8-58.905-235.013-77.738-360.634-72.729-50.288 2.004-100.777 11.42-150.265 21.037-32.257 6.411-58.904 2.805-68.32-30.454-10.218-35.262 14.826-53.294 44.879-58.904 67.518-12.02 135.839-21.237 172.503-26.847zm23.042 152.672c110.194 6.612 214.176 29.251 309.143 83.347 15.627 8.815 32.056 30.254 33.658 47.084 2.606 30.052-31.855 40.27-67.518 21.236-123.217-65.515-253.646-80.14-389.685-57.1-15.227 2.606-31.255 11.822-45.08 9.017-17.63-3.807-33.458-16.629-50.087-25.445 10.418-15.828 18.232-42.476 31.856-45.882 58.102-14.425 118.208-22.04 177.712-32.257zm-20.435 153.069c115.002 1.803 199.954 19.434 277.891 63.512 20.236 11.42 44.077 26.646 24.443 51.289-7.814 9.817-39.67 11.02-53.695 3.406C568.203 681 461.616 674.387 351.823 688.212c-18.232 2.204-36.465 10.418-53.895 8.615-16.63-1.803-32.257-13.023-48.286-20.034 11.019-13.424 20.236-36.063 33.659-38.868 53.294-11.82 107.99-17.23 136.84-21.438zM1024 512.104c0 141.248-50.089 262.062-150.064 362.036S653.348 1024.203 511.9 1024.203c-141.248 0-262.061-50.088-362.035-150.063S-.198 653.552-.198 512.104c0-141.248 50.088-262.062 150.063-362.036C250.041 50.092 370.653.005 511.901.005s262.062 50.088 362.036 150.063C973.913 250.044 1024 370.856 1024 512.104zm-64.109 0c0-124.018-43.675-229.603-131.027-316.955-87.153-87.354-192.939-131.03-316.957-131.03-123.818 0-229.604 43.677-316.957 131.029S63.921 388.086 63.921 512.104s43.677 230.004 131.029 317.959c87.354 87.955 192.938 132.032 316.956 132.032s229.604-44.077 316.956-132.032c87.354-87.955 131.029-193.941 131.029-317.959z">
                        </path>
                    </svg>

                    <h4 class="text-white font-oswald mt-4">SPOTIFY PLAYLIST PROMOTION</h4>
                    <p class="mt-4">Spotify is a perfect way to get your music to more listeners globally. Our
                        direct relationship with Spotify Curators and Influential Media Personalities help push
                        your single to a wider audience. Spotify curators ensure your music gets on spotify
                        playlists with millions of followers hence helping you get millions of streams on
                        Spotify. More Spotify Streams means more money for you.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-md-0 mb-3">
                <div class="why-details">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        class="ghostkit-svg-icon ghostkit-svg-icon-pe-7s"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#FBDA03"
                        width="169.063px" height="169.063px" viewBox="0 0 169.063 169.063"
                        style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve">
                        <g>
                            <path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
                                c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
                                c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
                                c17.455,0,31.656,14.201,31.656,31.655V122.407z"></path>
                            <path
                                d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
                                C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
                                c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z">
                            </path>
                            <path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
                                c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
                                C135.661,29.421,132.821,28.251,129.921,28.251z"></path>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>

                    <h4 class="text-white font-oswald mt-4">SOCIAL MEDIA MUSIC MARKETING</h4>
                    <p class="mt-4">Sharpline Distro works with hundreds of influencers on Instagram that will
                        help promote your music to their audience. In this era, social media is very useful and
                        having the right influencers push your single will massively blow your song. Our team
                        work on how we can get</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-md-0 mb-3">
                <div class="why-details">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ghostkit-svg-icon ghostkit-svg-icon-pe-7s"
                        aria-hidden="true" role="img" width="21" height="32" viewBox="0 0 21 32"
                        style="fill:#060">
                        <path
                            d="M10.667 7.467c-1.493 0-2.667 1.173-2.667 2.667s1.173 2.667 2.667 2.667c1.493 0 2.667-1.173 2.667-2.667s-1.173-2.667-2.667-2.667zM10.667 11.733c-0.907 0-1.6-0.693-1.6-1.6s0.693-1.6 1.6-1.6c0.907 0 1.6 0.693 1.6 1.6s-0.693 1.6-1.6 1.6z"
                            fill="currentColor"></path>
                        <path
                            d="M16 18.933c0-3.84 0-8.213 0-9.813 0-2.987-1.973-7.040-5.333-9.12-3.36 2.080-5.333 6.133-5.333 9.173 0 1.6 0 5.973 0 9.813l-5.333 6.613h21.333l-5.333-6.667zM5.333 24.533h-3.093l3.093-3.893v3.893zM14.933 24.533h-8.533v-15.36c0-2.4 1.493-5.867 4.267-7.893 2.773 2.027 4.267 5.44 4.267 7.893v15.36zM16 20.64l3.093 3.893h-3.093c0-0.907 0-2.293 0-3.893z"
                            fill="currentColor"></path>
                        <path d="M10.133 26.667h1.067v5.333h-1.067v-5.333z" fill="currentColor"></path>
                        <path d="M12.8 26.667h1.067v3.2h-1.067v-3.2z" fill="currentColor"></path>
                        <path d="M7.467 26.667h1.067v3.2h-1.067v-3.2z" fill="currentColor"></path>
                    </svg>

                    <h4 class="text-white font-oswald mt-4">FAST & TRANSPARENT PAYOUTS</h4>
                    <p class="mt-4">Keep 100% of what you make and get paid monthly to your PayPal or Bank
                        account. We offer transparent reporting including where streams and downloads came from,
                        how many streams you got and the amount you're owed. It's all out in the open.</p>
                </div>
            </div>

          
        </div>
    </div>
</section>

<section class="pb-0">
    <div class="container-fluid ">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="font-oswald text-white">OUR ARTISTS</h1>
                <div class="sharp-divider  mt-3"></div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6 p-0">
                <div class=" h-100">
                    <a href="{{route('site.storyIcyLando')}}">
                        <img src="{{ asset('assets/revamp/img/icy-lando') }}.jpg" width="696" height="464" class="img-fluid w-100" alt="">

                    </a>
                </div>
            </div>

            <div class="col-md-6 p-0">
                <div class=" h-100">
                    <a href="{{route('site.storymollyHammar')}}">
                        <img src="{{ asset('assets/revamp/img/molly.jpg') }}" width="696" height="464" class="img-fluid w-100" alt="">

                    </a>
                </div>
            </div>

            <div class="col-md-6 p-0 mb">
                <div class=" h-100">
                    <a href="{{route('site.nadelParis')}}">
                        <img src="{{ asset('assets/revamp/img/nadel.jpg') }}" width="696" height="464" class="img-fluid w-100" alt="">

                    </a>
                </div>
            </div>

            <div class="col-md-6 p-0 mb">
                <div class=" h-100">
                    <a href="{{route('site.storyFemme')}}">
                        <img src="{{ asset('assets/revamp/img/femme.jpg') }}" width="696" height="464" class="img-fluid w-100" alt="">

                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose packages">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="font-oswald text-white">Choose Your Plan</h1>
                <h5 class="font-oswald text-white mt-3">We’ve got you covered for every step of your artist journey.</h5>
            </div>
        </div>

        <div class="row mt-5">
            @include('frontend.partials.revamp.packages')
        </div>
    </div>
</section>

<section class="counter why-choose">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-md-0 mb-3">
                <div class="count text-center">
                    <h1 class="text-color-primary font-oswald">1588</h1>
                    <p class="text-white">SONGS RELEASED</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-md-0 mb-3">
                <div class="count text-center">
                    <h1 class="text-color-primary font-oswald">25M</h1>
                    <p class="text-white">STREAMS</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-md-0 mb-3">
                <div class="count text-center">
                    <h1 class="text-color-primary font-oswald">$65K+</h1>
                    <p class="text-white">REVENUE GENERATED FOR ARTISTS</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-md-0 mb-3">
                <div class="count text-center">
                    <h1 class="text-color-primary font-oswald">625</h1>
                    <p class="text-white">ARTISTS</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="font-oswald text-center text-white">GET SIGNED BY OUR RECORD LABEL</h1>
                <div class="sharp-divider  mt-3"></div>
                <p class="mt-5">Our label team uses the music consumption data flowing through our distribution service to discover, sign and build rising talent. We partner with select artists that we believe in, offering tailored, flexible deals that can include advances from $5000 to $500K as well support services such as: Spotify Playlist Promotion, Music Blog Placements, Music PR, Artist Development & Branding.</p>
            </div>
        </div>
    </div>
</section>

<section class="testimonail">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="testimonial-slider">
                    <div class="test-slide text-center">
                        <div class="sharp-divider my-5"></div>
                        <p class="text">“Sharpline is so easy to use. The reports are very detailed and they promoted all my release on the press including billboards and rolling Stones”</p>
                        <p class="mt-5">NADAL PARIS</p>
                    </div>

                    <div class="test-slide text-center">
                        <div class="sharp-divider my-5"></div>
                        <p class="text">“Sharpline is so easy to use. The reports are very detailed and they promoted all my release on the press including billboards and rolling Stones”</p>
                        <p class="mt-5">NADAL PARIS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="music-store">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="font-oswald text-center text-white">MUSIC STORES</h1>
                <div class="sharp-divider  mt-3"></div>
            </div>
        </div>

        <div class="row mt-5 align-items-center">
            <div class="col-md-12 col-sm-12 mt-5">
                <img src="{{ asset('assets/revamp/img/services-group.png') }}" class="img-fluid" width="" height="" alt="" style="width:100%">
            </div>
        </div>
    </div>
</section>
@endsection
