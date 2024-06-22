@extends('layouts.revamp_scaffold')
@push('title')
    Icy Lando - Story
@endpush
@push('styles')
    <style>
        .our-work h1 {
            font-size: 65px;
        }
    </style>
@endpush
@section('content')
<section class="py-0 stories">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="our-work">
                    <h1 class="font-oswald text-color-primary">Icy Lando Featuring Sean Kingston</h1>
                    <img  src="{{ asset('assets/revamp/img/icy-lando.jpg') }}" alt="" style="width:100%">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="previous-success  pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1 class="font-oswald text-color-primary ">The Plan:</h1>
                <p> UK Based Kenyan Rapper Icy Lando, is a talent which has been scouted by Universal Music and Atlantic Records for so many years. Icy Lando chose to work with Sharpline Distro instead to further promote &amp; distribute his single ‘Options’ Featuring Sean Kingston, and also can keep 100% of his rights &amp; royalties. We ran marketing campaigns in the US, UK and Europe through online and radio exposure. We worked on his other singles for ‘Truth Or Dare’ and ‘Get With U’ among others. </p>
                <center>
                    <img loading="lazy" src="{{ asset('assets/revamp/img/rollingout.jpg') }}" alt="" class="mt-3 img-fluid" width="500">
                </center>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Our Work & Results:</h1>
                <ul>
                    <li>‘Options' was featured by online music blogs &amp; publications such as Hip Hop Weekly, Clash Magazine, Notion Magazine, Link Up Tv, Top 40 Charts, Dummy Magazine, Earmilk, The Fader and 10 more. This is exposure to an audience of over 1 million people </li>
                    <li>‘Options’ was featured on UK’s own station BT TV’s FRESH Music landing page.  </li>
                    <li>Interview with Hip Hop Weekly Magazine &amp; The Source Magazine. </li>
                    <li>His single ‘Truth Or Dare’ was reviewed by Elevator, The Word Is Bond, Mystic Sons, IGGY Magazine and more. </li>
                    <li>His single ‘Truth Or Dare’ airplayed on BBC 1xtra, BBC Radio 1 and Capital Xtra</li>

                </ul>
                <center>
                    <img src="{{ asset('assets/revamp/img/icy-lando2.png') }}" class="mt-3 img-fluid" width="500">
                </center>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Results:</h1>
                <ul>
                    <li>‘Options' has been streamed over 2 million times on all platforms combined with Spotify leading with 350K streams followed closely by Apple music at 300K streams</li>
                    <li>‘Truth Or Dare’ has been streamed over 500K times on all platforms combined with Spotify leading with 200K streams</li>
                    <li>Icy Lando charted on Top 100 in Spotify Charts in 5 countries including UK, Germany &amp; Finland  </li>

                </ul>
                <center>
                    <img src="{{ asset('assets/revamp/img/icy-lando-spotify.jpg') }}" class="mt-3 img-fluid" width="500">
                </center>
            </div>
        </div>
    </div>
</section>
@endsection
