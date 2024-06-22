@extends('layouts.revamp_scaffold')
@push('title')
    Femme - Story
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
                    <h1 class="font-oswald text-color-primary">Femme</h1>
                    <img  src="{{ asset('assets/revamp/img/femme.jpg') }}" alt="" class="img-fluid" style="width:100%">
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
                <p> The initial brief for FEMME’s marketing campaign was to find premiere partners for each track on her ‘Covers’ EP. Sharpline Distro were taken on, on a full time basis, with the plan to broaden FEMME out of the smaller and niche areas she was popular online already, reaching new and bigger audiences, while always keeping things very…FEMME…stylish, sexy, kitsch, fun, pop. </p>
                <center>
                    <img loading="lazy" src="{{ asset('assets/revamp/img/femme2.jpg') }}" alt="" class="mt-3 img-fluid" width="500">
                </center>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Our Work & Results:</h1>
                <ul>
                    <li>‘Covers’ EP – we premiered each of these tracks on a wide variety of sites which included Billboard, Los Angeles Weekly, Lyrical Lemonade and Complex</li>
                    <li>Interview with Vogue Magazine &amp; Wonderland Magazine. </li>
                    <li>Her EP ‘Covers’ was reviewed by Elevator, Noisey, EDM, IGGY Magazine and more. </li>
                    <li>Her singles ‘Vogue’ and ‘Killer’ were played on Choice FM, Pop Hits FM, XFM, Virgin Radio, BBC Radio 4, Heat Radio, Absolute Radio, BBC Radio 1 and Capital Xtra In The UK</li>
                    <li>Follow up single ‘Words’ premiered with Nylon Magazine</li>

                </ul>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Results:</h1>
                <ul>
                    <li>‘Covers EP' has been streamed over 3 million times on all platforms</li>
                    <li>Toured US with Charli XCX alongside Justin Martin </li>
                    <li>Covers EP charted in the Top 100 Viral Hits in Spotify Charts in 5 countries including UK, Canada, France, Germany, &amp; Finland.</li>

                </ul>
                <center>
                    <img src="{{ asset('assets/revamp/img/femme-spotify.jpg') }}" class="mt-3 img-fluid" width="500">
                </center>
            </div>
        </div>
    </div>
</section>
@endsection
