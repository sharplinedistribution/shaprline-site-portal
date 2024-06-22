@extends('layouts.site_scaffold')
@push('title')
About us
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
   .wp-block-navigation:not(.has-background) .wp-block-navigation__responsive-container.is-menu-open {
   background-color:black !important;
   color:#cbcbcb !important;
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
            <div class="ghostkit-grid ghostkit-grid-gap-md ghostkit-grid-justify-content-center ghostkit-custom-ZJKeOQ">
               <div class="ghostkit-grid-inner">
                  <div class="ghostkit-col ghostkit-col-lg-12 ghostkit-col-10">
                     <div class="ghostkit-col-content">
                        <h2 class="ghostkit-custom-YVi2R" style="font-size:62px">Our Story</h2>
                        <div style="height:22px" aria-hidden="true" class="wp-block-spacer"></div>
                        <p data-ghostkit-sr="">Sharpline Distro is the world’s leading music distribution and marketing company. Rated as the best music distribution agency by top media & entertainment publications such as Los Angeles Weekly & The Source Magazine, Sharpline has been at the forefront in offering independent artists & labels major record label services such as music distribution, playlist promotion, music pr services & creative marketing campaigns in the press. </p>
                        <p data-ghostkit-sr="">Sharpline Distro has had massive success where their current & previous artists have charted on the Billboard Hot 100 & Hot 200, featured on Clash Magazine, LA Weekly and Complex Magazine while also amassing hundreds of millions of streams on major streaming platforms such as Spotify, Tidal & Apple Music. </p>
                        <p data-ghostkit-sr="">In 2021 alone, over 50 artists affiliated to Sharpline Distro earned over One Million Dollars In Royalties with hundreds earning over $50,000 in royalties during the same period.  </p>
                        <p data-ghostkit-sr="">Our Plans start at $30.99 per year for unlimited music releases where our team will make sure your next hit single will feature on the main press publications, promoted on spotify playlists & social media for FREE. We Are The only music distribution company comprised of music marketing experts who will bring modern marketing techniques to artists globally.</p>
                        
                        {{-- <p data-ghostkit-sr="fade-up;distance:10px"> He found that the music industry&#8217;s complexity and legacy structures made it practically impossible for independent artists in these countries to get their music out into the world. The music industry was broken, so he decided to fix it .</p>
                        <p data-ghostkit-sr="fade-up;distance:10px"> Since the beginning of your journey, we&#8217;ve built a community of hundreds of thousands of user, been backed by some of the world&#8217;s leading music tech venture funds, and launched cutting-edge services like Fast Forward and Sharpline Distro Pro .</p>
                        <p data-ghostkit-sr="fade-up;distance:10px"> As the music industry changed, so did we, and gradually, Sharpline went from reimagined record label to a worldwide, digital artists services company, dedicated to empower the exploding global community of independent artists .</p>
                        <p data-ghostkit-sr="fade-up;distance:10px"> At the same time, the music industry continues to shift and transform, and we plan on changing with it. It can be said that a veritable revolution is taking place in the music world, with artists at the heart of it.</p> --}}
                     </div>
                  </div>
               </div>
            </div>
            <figure class="wp-block-image size-large is-resized"><img loading="lazy" src="https://sharplinedistro.co/wp-content/uploads/2022/03/final1-2-1024x576.jpg" alt="" class="wp-image-632" width="1140" height="641" srcset="../wp-content/uploads/2022/03/final1-2-1024x576.jpg 1024w, ../wp-content/uploads/2022/03/final1-2-300x169.jpg 300w, ../wp-content/uploads/2022/03/final1-2-768x432.jpg 768w, ../wp-content/uploads/2022/03/final1-2-1536x864.jpg 1536w, ../wp-content/uploads/2022/03/final1-2-500x281.jpg 500w, ../wp-content/uploads/2022/03/final1-2-800x450.jpg 800w, ../wp-content/uploads/2022/03/final1-2-1280x720.jpg 1280w, ../wp-content/uploads/2022/03/final1-2-1920x1080.jpg 1920w, ../wp-content/uploads/2022/03/final1-2-48x27.jpg 48w, ../wp-content/uploads/2022/03/final1-2-128x72.jpg 128w, ../wp-content/uploads/2022/03/final1-2-256x144.jpg 256w, ../wp-content/uploads/2022/03/final1-2-512x288.jpg 512w, ../wp-content/uploads/2022/03/final1-2-600x338.jpg 600w, ../wp-content/uploads/2022/03/final1-2.jpg 2048w" sizes="(max-width: 1140px) 100vw, 1140px"></figure>
            <div class="wp-block-nk-awb nk-awb  alignfull ghostkit-custom-1BYO9O">
               <div class="nk-awb-wrap" data-awb-type="color">
                  <div class="nk-awb-overlay" style="background-color: #101010;"></div>
               </div>
               <h2 class="ghostkit-custom-1KwqTs has-large-font-size">The three tiers of Shrpline Distro</h2>
               <div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
               <div class="ghostkit-grid ghostkit-grid-gap-md">
                  <div class="ghostkit-grid-inner">
                     <div class="ghostkit-col ghostkit-col-lg-12 ghostkit-col-4">
                        <div class="ghostkit-col-content">
                           <figure class="wp-block-image size-full"><img loading="lazy" width="992" height="992" src="https://sharplinedistro.co/wp-content/uploads/2022/03/final2.jpg" alt="" class="wp-image-629" srcset="../wp-content/uploads/2022/03/final2.jpg 992w, ../wp-content/uploads/2022/03/final2-300x300.jpg 300w, ../wp-content/uploads/2022/03/final2-150x150.jpg 150w, ../wp-content/uploads/2022/03/final2-768x768.jpg 768w, ../wp-content/uploads/2022/03/final2-500x500.jpg 500w, ../wp-content/uploads/2022/03/final2-800x800.jpg 800w, ../wp-content/uploads/2022/03/final2-48x48.jpg 48w, ../wp-content/uploads/2022/03/final2-128x128.jpg 128w, ../wp-content/uploads/2022/03/final2-256x256.jpg 256w, ../wp-content/uploads/2022/03/final2-512x512.jpg 512w, ../wp-content/uploads/2022/03/final2-600x600.jpg 600w, ../wp-content/uploads/2022/03/final2-100x100.jpg 100w" sizes="(max-width: 992px) 100vw, 992px"></figure>
                           <h2 class="ghostkit-custom-ZO0ih3">1. Digital Distribution</h2>
                           <p>Hundreds of thousands of artists across the globe use the Sharpline Distro to release their music to all major streaming services. Artists keep 100% of their royalties and rights.</p>
                        </div>
                     </div>
                     <div class="ghostkit-col ghostkit-col-lg-12 ghostkit-col-4">
                        <div class="ghostkit-col-content">
                           <figure class="wp-block-image size-full"><img loading="lazy" width="992" height="992" src="https://sharplinedistro.co/wp-content/uploads/2022/03/final5.jpg" alt="" class="wp-image-626" srcset="../wp-content/uploads/2022/03/final5.jpg 992w, ../wp-content/uploads/2022/03/final5-300x300.jpg 300w, ../wp-content/uploads/2022/03/final5-150x150.jpg 150w, ../wp-content/uploads/2022/03/final5-768x768.jpg 768w, ../wp-content/uploads/2022/03/final5-500x500.jpg 500w, ../wp-content/uploads/2022/03/final5-800x800.jpg 800w, ../wp-content/uploads/2022/03/final5-48x48.jpg 48w, ../wp-content/uploads/2022/03/final5-128x128.jpg 128w, ../wp-content/uploads/2022/03/final5-256x256.jpg 256w, ../wp-content/uploads/2022/03/final5-512x512.jpg 512w, ../wp-content/uploads/2022/03/final5-600x600.jpg 600w, ../wp-content/uploads/2022/03/final5-100x100.jpg 100w" sizes="(max-width: 992px) 100vw, 992px"></figure>
                           <h2 class="ghostkit-custom-TCKwi">2. Premium Features</h2>
                           <p>Fast Forward let&#8217;s you advance yourself up to 6 months of your upcoming royalties and Sharpline Distro gives self-releasing artists and their teams the latest functionality to manage their music careers.</p>
                        </div>
                     </div>
                     <div class="ghostkit-col ghostkit-col-lg-12 ghostkit-col-4">
                        <div class="ghostkit-col-content">
                           <figure class="wp-block-image size-full"><img loading="lazy" width="992" height="992" src="https://sharplinedistro.co/wp-content/uploads/2022/03/final4.jpg" alt="" class="wp-image-627" srcset="../wp-content/uploads/2022/03/final4.jpg 992w, ../wp-content/uploads/2022/03/final4-300x300.jpg 300w, ../wp-content/uploads/2022/03/final4-150x150.jpg 150w, ../wp-content/uploads/2022/03/final4-768x768.jpg 768w, ../wp-content/uploads/2022/03/final4-500x500.jpg 500w, ../wp-content/uploads/2022/03/final4-800x800.jpg 800w, ../wp-content/uploads/2022/03/final4-48x48.jpg 48w, ../wp-content/uploads/2022/03/final4-128x128.jpg 128w, ../wp-content/uploads/2022/03/final4-256x256.jpg 256w, ../wp-content/uploads/2022/03/final4-512x512.jpg 512w, ../wp-content/uploads/2022/03/final4-600x600.jpg 600w, ../wp-content/uploads/2022/03/final4-100x100.jpg 100w" sizes="(max-width: 992px) 100vw, 992px"></figure>
                           <h2 class="ghostkit-custom-1uUMxh">3. Artist services</h2>
                           <p>Our Distribution team uses the data from our distribution services when it comes to promoting artists on playlists &amp; Press from all over the world.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ghostkit-grid ghostkit-grid-gap-md">
               <div class="ghostkit-grid-inner">
                  <div class="ghostkit-col ghostkit-col-md-12 ghostkit-col-6">
                     <div class="ghostkit-col-content">
                        <figure class="wp-block-image size-large"><img loading="lazy" width="768" height="1024" src="https://sharplinedistro.co/wp-content/uploads/2022/03/final3-768x1024.png" alt="" class="wp-image-628" srcset="../wp-content/uploads/2022/03/final3-768x1024.png 768w, ../wp-content/uploads/2022/03/final3-225x300.png 225w, ../wp-content/uploads/2022/03/final3-1152x1536.png 1152w, ../wp-content/uploads/2022/03/final3-500x667.png 500w, ../wp-content/uploads/2022/03/final3-800x1067.png 800w, ../wp-content/uploads/2022/03/final3-1280x1707.png 1280w, ../wp-content/uploads/2022/03/final3-48x64.png 48w, ../wp-content/uploads/2022/03/final3-128x171.png 128w, ../wp-content/uploads/2022/03/final3-256x341.png 256w, ../wp-content/uploads/2022/03/final3-512x683.png 512w, ../wp-content/uploads/2022/03/final3-600x800.png 600w, ../wp-content/uploads/2022/03/final3.png 1536w" sizes="(max-width: 768px) 100vw, 768px"></figure>
                     </div>
                  </div>
                  <div class="ghostkit-col ghostkit-col-md-12 ghostkit-col-6">
                     <div class="ghostkit-col-content">
                        <h2 class="ghostkit-custom-1DuRaU" style="font-size:90px">Pushing Your Music Forward</h2>
                        <div style="height:41px" aria-hidden="true" class="wp-block-spacer"></div>
                        <p>Out with the old, in with the new. Say what you will about the music industry, but the shift that&#8217;s happening all over the globe is undeniable. Everywhere you look, modern artists are striving for independence. Gone are the days of simply putting out a tune or two, and being content with that.</p>
                        <p>minds. Everything in the industry is made hard and tricky to understand on purpose, so that the artists require a middle-man. But that&#8217;s changing. Nowadays, artists want to build their brand and run their business &#8211; on their own terms. We&#8217;re focusing on building a passion economy, and pushing culture forward by unearthing new ways to promote music.</p>
                        <p>he future of music being shaped now, by a new generation, with limitless possibilities at their fingertips. Our free digital music distribution and smooth artist marketing services are made for them.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="wp-block-nk-awb nk-awb ghostkit-custom-Z29Dt7v">
               <div class="nk-awb-wrap" data-awb-type="color" data-awb-parallax="scroll" data-awb-parallax-speed="0.8" data-awb-parallax-mobile="false">
                  <div class="nk-awb-overlay" style="background-color: #101010;"></div>
               </div>
               <div class="ghostkit-grid ghostkit-grid-gap-md ghostkit-grid-justify-content-center">
                  <div class="ghostkit-grid-inner">
                     <div class="ghostkit-col ghostkit-col-md-12 ghostkit-col-lg-10 ghostkit-col-8">
                        <div class="ghostkit-col-content">
                           <div class="wp-block-lazyblock-skylith-zigzag-divider lazyblock-skylith-zigzag-divider-Z2o2NHh">
                              <div class="nk-divider-2 nk-divider-2-color-main mb-25" style="color: #fbda03;"></div>
                           </div>
                           <h2 class="has-text-align-center ghostkit-custom-aK8Hx has-medium-font-size">For the artists and the Pros.</h2>
                           <div style="height:3px" aria-hidden="true" class="wp-block-spacer"></div>
                           <p class="has-text-align-center ghostkit-custom-21hB84 has-skylith-white-color has-text-color">Basically, Sharpline makes releasing, marketing and managing music smoother and easier than ever, used by hundreds of thousands of artists &#8211; from Manila to New York. Unlike the old record labels, we work to make things as easy as can be, through our smart services, in order to boost artists independance.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- packages here  -->
            @include('frontend.partials.packages')
            <!-- packages here  -->
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
