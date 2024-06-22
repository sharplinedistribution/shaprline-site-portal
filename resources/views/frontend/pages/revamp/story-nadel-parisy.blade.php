@extends('layouts.revamp_scaffold')
@push('title')
Nadel Paris - Story
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
                    <h1 class="font-oswald text-color-primary">Nadel Paris</h1>
                    <img  src="{{ asset('assets/revamp/img/nadel.jpg') }}" class="img-fluid" alt="" style="width:100%">
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
                <p> Nadel Paris hails from the French capital of Paris but is
                    currently based in Los Angeles, California. She is a singer,
                    songwriter, producer, EDM (Electronic Dance Music) artist,
                    and dancer.
                </p>
                <p>The French artist’s rise to fame came along with her debut
                    album “Ooh La La La La”, which featured two singles that
                    scored on the Billboard Dance Chart, and brought her to the
                    public’s attention
                </p>
                <p> Nadel Paris’s success came after a partnership with <mark class="" style="background-color: rgba(0, 0, 0, 0); color:#FBDA03"><span><strong>Sharpline Distro</strong></span></mark><strong>, with whom the artist had collaborated in the past.
                    Sharpline Distro’s campaign helped the French artist chart on
                    the Billboard EDM Chart in 2018.</strong>
                </p>

                <center>
                    <img loading="lazy" src="{{ asset('assets/revamp/img/nadel2.jpg') }}" alt="" class="mt-3 img-fluid" width="500">
                </center>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Our Work & Results:</h1>
                <ul>
                    <li>We premiered her EP ‘OH LA LA LA’ on major music publications Billboard, The Guardian &amp; Noisey</li>
                    <li>‘OH LA LA LA’ was featured on major TV networks MTV &amp; VH1</li>
                    <li>Interview with Billboard &amp; Clash Magazine.</li>
                    <li>Her EP ‘OH LA LA LA’ was reviewed by Wonderland, and The Fader.</li>
                    <li>Her singles ‘OH LA LA LA’ were played on Choice FM, Pop Hits FM, XFM, Virgin Radio, BBC Radio 4, BBC Radio 1 and Capital Xtra In The UK</li>
                    <li> Her singles ‘OH LA LA LA’ were played on KEXP, KCRW, WXPN Philadelphia, Sirius FM, WRAS Atlanta In The United States </li>
                </ul>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Results:</h1>
                <ul>
                    <li>To date, we secured 100+ pieces of quality online coverage</li>
                    <li>The single premiere with Billboard generated 7k Plays in 24 hours</li>
                    <li>The remix premiere with The Guardian generated 3k Plays in 24 hours</li>
                    <li> The video for ‘OH LA LA LA’ which we premiered with Noisey, had 70k Views on YouTube</li>
                    <li> Her 2 singles 'OH LA LA LA' and 'TELL MAMA' hit the Billboard Dance Chart at number 31 and 38 respectively</li>
                    <li>Nadel Paris charted on Top 100 in Spotify EDM Charts in 5 countries including USA &amp; CANADA</li>
                </ul>
                <center>
                    <img src="{{ asset('assets/revamp/img/nadel-spotify.jpg') }}" class="mt-3 img-fluid" width="500">
                </center>
            </div>
        </div>
    </div>
</section>
@endsection
