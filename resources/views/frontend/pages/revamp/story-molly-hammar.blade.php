@extends('layouts.revamp_scaffold')
@push('title')
    Molly Hammer - Story
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
                    <h1 class="font-oswald text-color-primary">Molly Hammar</h1>
                    <img  src="{{ asset('assets/revamp/img/molly.jpg') }}" alt="" class="img-fluid" style="width:100%">
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
                <p> Molly Hammar rose to fame in Sweden at just 16 years old as runner up on Swedish Idol. 7 years later at the age of 22, with 2 gold singles under her belt, the artist was ready to move away from a pure pop focus, to fulfil her dream of making soulful R&B music and to become known for her music outside of Sweden. She left her major record label to sign up with Sharpline Distro. Hypnotic lead single ‘No Place Like Me’ paired Molly’s sensual vocal with percussive beats, and a killer rap from UK Grime legend Big Narstie the track was followed up with dancefloor-friendly ‘WORDS’</p>
                <center>
                    <img loading="lazy" src="{{ asset('assets/revamp/img/molly2.jpg') }}" alt="" class="mt-3 img-fluid" width="500">
                </center>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Our Work & Results:</h1>
                <ul>
                    <li>‘No Place Like Me’ audio ran as Song Of The Day with the UK’s largest new music website The Fader on the day of release. </li>
                    <li>‘No Place Like Me’ video premiered with leading international urban lifestyle website COMPLEX</li>
                    <li>Interview with Wonderland Magazine. </li>
                    <li>Her single was reviewed by Billboard &amp; Noisey</li>
                    <li>Follow up single ‘Words’ premiered with Nylon Magazine</li>
                </ul>
                <h1 class="font-oswald text-color-primary mt-3 mb-3 ">Results:</h1>
                <ul>
                    <li>She has been streamed over 13 million times on all platforms</li>
                    <li>She has been featured on 20 Official Spotify Playlist Covers.</li>
                    <li>Charted on The Official UK Chart  </li>
                    <li>She has charted in the Top 100 Viral Hits in Spotify Charts in 5 countries including UK, Canada, France, Germany, &amp; Finland  </li>

                </ul>
                <center>
                    <img src="{{ asset('assets/revamp/img/molly-spotify.jpg') }}" class="mt-3 img-fluid" width="500">
                </center>
            </div>
        </div>
    </div>
</section>
@endsection
