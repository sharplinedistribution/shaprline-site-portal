@extends('layouts.revamp_scaffold')
@push('title')
    Success Stories
@endpush
@section('content')
<section class="py-0 stories">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="our-work">
                    <h1 class="font-oswald text-color-primary text-capitalize mb-3">Our Work</h1>
                    <p>Sharpline Distro has been at the forefront in offering independent artists & labels major record label services such as music distribution, playlist promotion, music pr services & creative marketing campaigns in the press</p>
                    <p>In 2021 alone, over 50 artists affiliated to Sharpline Distro earned over One Million Dollars In Royalties with hundreds earning over $50,000 in royalties during the same period.</p>
                    <p>We make it our mission to help talent shine while keeping 100% control of their copyrights. Over the last 10 years, we’ve worked with thousands of artists and bands. We’re passionate about every project, from seeding campaigns and single launches through to major collaborations and album amplification.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="previous-success  pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="font-oswald text-color-primary mb-4">Below Are Our Previous Successful Campaigns</h2>
            </div>

            <div class="col-md-4 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/icy-lando.jpg')}}" alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">1. Icy Lando</h2>
                    <p>UK Based Kenyan Rapper Icy Lando, is a talent which has been scouted by Universal Music and Atlantic Records for so many years....</p>

                    <a href="{{route('site.storyIcyLando')}}" class="btn btn-primary text-capitalize my-3">Read More</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/molly.jpg')}}"alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">2. Molly Hammar</h2>
                    <p>Molly Hammar rose to fame in Sweden at just 16 years old as runner up on Swedish Idol. 7 years later at the age of 22 with 2 gold....</p>

                    <a href="{{route('site.storymollyHammar')}}" class="btn btn-primary text-capitalize my-3">Read More</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/nadel.jpg')}}"alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">3. Nadel Paris</h2>
                    <p>Nadel Paris hails from the French capital of Paris but is currently based in Los Angeles, California. She is a singer, songwriter, producer, EDM...</p>

                    <a href="{{route('site.nadelParis')}}" class="btn btn-primary text-capitalize my-3">Read More</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="tiers-grid">
                    <img src="{{asset('assets/revamp/img/femme.jpg')}}"alt="" class="w-100 img-fluid mb-2">
                    <h2 class="font-oswald text-color-primary mb-3 mt-2">4. Femme</h2>
                    <p>The initial brief for FEMME’s marketing campaign was to find premiere partners for each track on her ‘Covers’ EP. After a successful short campaign....</p>

                    <a href="{{route('site.storyFemme')}}" class="btn btn-primary text-capitalize my-3">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
