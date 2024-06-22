@extends('layouts.revamp_scaffold')
@push('title')
About us
@endpush
@section('content')
<section class="our-story">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="font-oswald text-color-primary">Our Story</h1>

                <p class="mt-5">Sharpline Distro is the world’s leading music distribution and marketing company. Rated as the best music distribution agency by top media & entertainment publications such as Los Angeles Weekly & The Source Magazine, Sharpline has been at the forefront in offering independent artists & labels major record label services such as music distribution, playlist promotion, music pr services & creative marketing campaigns in the press.</p>

                <p>Sharpline Distro has had massive success where their current & previous artists have charted on the Billboard Hot 100 & Hot 200, featured on Clash Magazine, LA Weekly and Complex Magazine while also amassing hundreds of millions of streams on major streaming platforms such as Spotify, Tidal & Apple Music.</p>

                <p>In 2021 alone, over 50 artists affiliated to Sharpline Distro earned over One Million Dollars In Royalties with hundreds earning over $50,000 in royalties during the same period.</p>

                <p>Our Plans start at $30.99 per year for unlimited music releases where our team will make sure your next hit single will feature on the main press publications, promoted on spotify playlists & social media for FREE. We Are The only music distribution company comprised of music marketing experts who will bring modern marketing techniques to artists globally.</p>
            </div>
        </div>
    </div>
</section>

<section class="about-img py-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{asset('assets/revamp/img/about-big-img.jpg')}}" alt="" class="img-fluid w-100">
            </div>
        </div>
    </div>
</section>

<section class="tiers">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="font-oswald text-color-primary mb-4">The Three Tiers of Sharpline Distro</h2>
            </div>

            <div class="col-md-4 mb-md-0 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/final2.jpg')}}" alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">1. Digital Music Distribution</h2>
                    <p>Hundreds of thousands of artists across the world use the Sharpline Distro to release their music to all major streaming services from Spotify to Apple Music Plus 200 other major stores very fast & easy. Artists keep 100% of their royalties and rights and access exclusive marketing services that other music distributors do not offer</p>
                </div>
            </div>

            <div class="col-md-4 mb-md-0 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/final5.jpg')}}" alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">2. Music Promotion & Marketing</h2>
                    <p>We offer music promotion campaigns for talented artists across all genres globally. Other distributors offer distribution services alone; however, Sharpline offers music distribution & marketing at no additional cost in any package you pick. We have a reputation for creative marketing and music publicity campaigns. Our artists have been featured on major blogs such as Complex, Billboard, Notion Magazine & more</p>
                </div>
            </div>

            <div class="col-md-4 mb-md-0 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/final4.jpg')}}" alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">3. Record Label Services</h2>
                    <p>Our label team uses the music data flowing through our distribution service to discover, sign and build rising talent. We partner with select artists that we believe in, offering tailored, flexible deals that can include advances from $5000 to $500k as well support services such as: Spotify Playlist Promotion, Music Blog Placements, Music PR, Artist Development & Branding.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pushing-forward pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-md-0 mb-3">
                <div class="forward-img">
                    <img src="{{asset('assets/revamp/img/pushing-forward.png')}}" alt="" class="w-100 img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="forward-content">
                    <h3 class="font-oswald text-color-primary mb-4">Pushing Your Music Forward</h3>

                    <p>Out with the old, in with the new. Say what you will about the music industry, but the shift that’s happening all over the globe is undeniable. Everywhere you look, modern artists are striving for independence. Gone are the days of simply putting out a tune or two, and being content with that.</p>

                    <p>minds. Everything in the industry is made hard and tricky to understand on purpose, so that the artists require a middle-man. But that’s changing. Nowadays, artists want to build their brand and run their business – on their own terms. We’re focusing on building a passion economy, and pushing culture forward by unearthing new ways to promote music.</p>

                    <p>he future of music being shaped now, by a new generation, with limitless possibilities at their fingertips. Our free digital music distribution and smooth artist marketing services are made for them.</p>
                </div>
            </div>
        </div>

        <div class="row mt-5 text-center">
            <div class="col-md-8 mx-auto">
                <div class="why-details">
                    <div class="sharp-divider mb-3"></div>
                    <h4 class="font-oswald text-white">For the artists and the Pros.</h4>
                    <p class="text-white mt-4">
                        Basically, Sharpline makes releasing, marketing and managing music smoother and easier than ever, used by hundreds of thousands of artists – from Manila to New York. Unlike the old record labels, we work to make things as easy as can be, through our smart services, in order to boost artists independance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
