@extends('layouts.site_scaffold')
@push('title')
Story - Icy Lando
@endpush
@push('styles')
<style id='global-styles-inline-css'>
   body {
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--color--skylith-gold: #b9a186;
      --wp--preset--color--skylith-yellow: #fbda03;
      --wp--preset--color--skylith-light-green: #00ffa2;
      --wp--preset--color--skylith-green: #2bb569;
      --wp--preset--color--skylith-light-blue: #148ff3;
      --wp--preset--color--skylith-blue: #3202ff;
      --wp--preset--color--skylith-blue-violet: #5223e9;
      --wp--preset--color--skylith-dark-violet: #480086;
      --wp--preset--color--skylith-violet: #8536ce;
      --wp--preset--color--skylith-light-violet: #a074dc;
      --wp--preset--color--skylith-violet-pink: #d086d3;
      --wp--preset--color--skylith-pink: #ea2f5c;
      --wp--preset--color--skylith-red: #cc1139;
      --wp--preset--color--skylith-black: #000;
      --wp--preset--color--skylith-white: #fff;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
      --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
      --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
      --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
      --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
      --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
      --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
      --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
      --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
   }

   .has-black-color {
      color: var(--wp--preset--color--black) !important;
   }

   .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
   }

   .has-white-color {
      color: var(--wp--preset--color--white) !important;
   }

   .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
   }

   .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
   }

   .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
   }

   .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
   }

   .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
   }

   .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
   }

   .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
   }

   .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
   }

   .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
   }

   .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
   }

   .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
   }

   .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
   }

   .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
   }

   .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
   }

   .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
   }

   .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
   }

   .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
   }

   .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
   }

   .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
   }

   .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
   }

   .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
   }

   .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
   }

   .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
   }

   .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
   }

   .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
   }

   .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
   }

   .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
   }

   .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
   }

   .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
   }

   .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
   }

   .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
   }

   .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
   }

   .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
   }

   .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
   }

   .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
   }

   .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
   }

   .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
   }

   .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
   }

   .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
   }

   .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
   }

   .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
   }

   .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
   }

   .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
   }

   .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
   }

   .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
   }

   .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
   }

   .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
   }

   .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
   }

   .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
   }
</style>
<style>
   img.wp-smiley,
   img.emoji {
      display: inline !important;
      border: none !important;
      box-shadow: none !important;
      height: 1em !important;
      width: 1em !important;
      margin: 0 0.07em !important;
      vertical-align: -0.1em !important;
      background: none !important;
      padding: 0 !important;
   }
</style>
<style id='ghostkit-blocks-content-custom-css-inline-css'>
   .ghostkit-custom-68K4Q {
      margin-top: -22px;
   }

   .ghostkit-custom-Z2eKMaz {
      padding-bottom: 50px;
      padding-right: 20px;
      margin-top: 48px;
   }

   .ghostkit-custom-Z2eKMaz {
      color: white;
   }

   .ghostkit-custom-ZJKeOQ {
      padding-top: 50px;
      padding-bottom: 60px;
   }

   .ghostkit-custom-1BYO9O {
      padding-top: 80px;
      padding-bottom: 60px;
      padding-left: 0px;
      padding-right: 0px;
   }

   .ghostkit-custom-Z29Dt7v {
      padding-left: 0px;
      padding-right: 0px;
      padding-top: 50px;
   }

   .ghostkit-custom-Z2abSJt {
      padding-top: 100px;
      padding-bottom: 80px;
      padding-left: 0px;
      padding-right: 0px;
   }

   .ghostkit-custom-Z2abSJt {
      text-align: center;
   }

   .ghostkit-custom-YVi2R {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-1KwqTs {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-ZO0ih3 {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-TCKwi {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-1uUMxh {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-1DuRaU {
      color: #fbda03 !important;
      font-family: Oswald !important;
      font-weight: 500 !important;
   }

   .ghostkit-custom-aK8Hx {
      font-family: Oswald;
      font-weight: 500;

   }

   .ghostkit-custom-21hB84 {
      margin-top: 15px;
   }

   .ghostkit-custom-ZPVsi3 {
      margin-bottom: 30px;
   }

   .ghostkit-custom-ZPVsi3 {
      font-family: Oswald !important;
      font-weight: 500 !important;

   }

   .ghostkit-custom-ZMBtUs {
      font-family: Oswald !important;
      font-weight: 500 !important;
      font-size: 21px !important;
   }

   .ghostkit-custom-Z19CdsX {
      margin-top: 30px;
   }

   .ghostkit-custom-14gbvI {
      margin-top: -29px;
   }

   .ghostkit-custom-14gbvI {}

   .ghostkit-custom-1m35cF {
      text-align: center;
   }

   .ghostkit-custom-216yd5 {
      --gkt-button__background-color: #fbda03;
      --gkt-button__color: #000;
      --gkt-button__border-radius: 0px;
      --gkt-button-hover__background-color: #000;
      --gkt-button-focus__background-color: #000;
   }

   .ghostkit-custom-2iNshO {
      --gkt-button__background-color: #fbda03;
      --gkt-button__color: #000;
      --gkt-button__border-radius: 0px;
      --gkt-button-hover__background-color: #000;
      --gkt-button-focus__background-color: #000;
   }
   .ghostkit-custom-1BYO9O {
      padding-bottom: 0px !important;
       padding-top: 0px !important;

   }
</style>
@endpush
@section('content')
<!-- Sharpline -->
<div id="primary" class="content-area container">
   <main id="main" class="site-main" role="main">
      <article id="post-819" class="post-819 page type-page status-publish has-post-thumbnail hentry">
         <div class="entry-content">
            @include('frontend.partials.nav')
            <div class="wp-block-nk-awb nk-awb  alignfull ghostkit-custom-1BYO9O">
               <div class="ghostkit-grid-inner">
                  <div class="ghostkit-col ghostkit-col-lg-12 ghostkit-col-10">
                     <div class="ghostkit-col-content">

                        <h2 class="ghostkit-custom-YVi2R" style="font-size: 70px;">Nadel Paris</h2>

                     </div>
                  </div>
               </div>
            </div>
            <figure class="wp-block-image size-large is-resized"><img loading="lazy" src="{{asset('images/nadel.jpg')}}" alt="" class="wp-image-632" width="1140" height="641" srcset="{{asset('images/nadel.jpg')}}" sizes="(max-width: 1140px) 100vw, 1140px"></figure>

   


<h2 class="ghostkit-custom-1KwqTs has-large-font-size">The Plan:</h2>
<p > Nadel Paris hails from the French capital of Paris but is
currently based in Los Angeles, California. She is a singer,
songwriter, producer, EDM (Electronic Dance Music) artist,
and dancer. </p>
<p >The French artist’s rise to fame came along with her debut
album “Ooh La La La La”, which featured two singles that
scored on the Billboard Dance Chart, and brought her to the
public’s attention </p>
<p > Nadel Paris’s success came after a partnership with <mark class="has-inline-color has-skylith-yellow-color" style="background-color: rgba(0, 0, 0, 0);"><span ><strong>Sharpline Distro</mark>, with whom the artist had collaborated in the past.
Sharpline Distro’s campaign helped the French artist chart on
the Billboard EDM Chart in 2018.</p>
<center>
    <figure class="wp-block-image size-large is-resized"><img loading="lazy" src="{{asset('images/nadel2.jpg')}}" alt="" class="wp-image-632" width="500" height="641" srcset="{{asset('images/nadel2.jpg')}}" sizes="(max-width: 500px) 100vw, 500px"></figure>
    
</center>
<h2 class="ghostkit-custom-1KwqTs has-large-font-size">Our Work & Results: </h2>
<p>
    <ul>
        <li>We premiered her EP ‘OH LA LA LA’ on major music
publications Billboard, The Guardian &amp; Noisey</li>
        <li>‘OH LA LA LA’ was featured on major TV networks MTV &amp;
VH1</li>
        <li>Interview with Billboard &amp; Clash Magazine.</li>
        <li>Her EP ‘OH LA LA LA’ was reviewed by Wonderland, and
The Fader.</li>
        <li>Her singles ‘OH LA LA LA’ were played on Choice FM, Pop
Hits FM, XFM, Virgin Radio, BBC Radio 4, BBC Radio 1 and
Capital Xtra In The UK</li>
<li>
Her singles ‘OH LA LA LA’ were played on KEXP, KCRW,
WXPN Philadelphia, Sirius FM, WRAS Atlanta In The
United States
</li>
    </ul>
</p>

<h2 class="ghostkit-custom-1KwqTs has-large-font-size">Results: </h2>
<p>
    <ul>
        <li>To date, we secured 100+ pieces of quality online
coverage</li>
        <li>The single premiere with Billboard generated 7k Plays in
24 hours</li>
        <li>The remix premiere with The Guardian generated 3k
Plays in 24 hours</li>
<li>
The video for ‘OH LA LA LA’ which we premiered with
Noisey, had 70k Views on YouTube
</li>
<li>
Her 2 singles &#39;OH LA LA LA&#39; and &#39;TELL MAMA&#39; hit the
Billboard Dance Chart at number 31 and 38 respectively
</li>
<li>Nadel Paris charted on Top 100 in Spotify EDM Charts in
5 countries including USA &amp; CANADA</li>
    </ul>
</p>
<center>

    <figure class="wp-block-image size-large is-resized"><img loading="lazy" src="{{asset('images/nadel-spotify.jpg')}}" alt="" class="wp-image-632" width="500" height="641" srcset="{{asset('images/nadel-spotify.jpg')}}" sizes="(max-width: 500px) 100vw, 500px"></figure>
</center>

            
    
      
           
            <div class="clearfix"></div>
         </div>
         <!-- .entry-content -->
      </article>
      <!-- #post-## -->
   </main>
   <!-- .site-main -->
</div>
<link href="{{asset('cssnew.css')}}" rel="stylesheet">
<!-- .content-area -->
@endsection
