@php

$packages = \App\Models\Package::with('details')->get();
@endphp

<div class="wp-block-nk-awb nk-awb  alignfull ghostkit-custom-Z2abSJt" id="pricing">
    <div class="nk-awb-wrap" data-awb-type="color" data-awb-parallax="scroll" data-awb-parallax-speed="0.8" data-awb-parallax-mobile="false">
        <div class="nk-awb-overlay" style="background-color: #181818;"></div>
    </div>
    <h2 class="has-text-align-center h1 ghostkit-custom-ZPVsi3" data-ghostkit-sr="fade-up;distance:10px">Choose Your Plan</h2>
    <p class="has-text-align-center ghostkit-custom-ZMBtUs has-skylith-white-color has-text-color" data-ghostkit-sr="fade-up;distance:10px">We&#8217;ve got you covered for every step of your artist journey.</p>
    <div class="ghostkit-pricing-table ghostkit-pricing-table-gap-md ghostkit-pricing-table-items-2 ghostkit-pricing-table-align-vertical-center ghostkit-pricing-table-align-horizontal-center ghostkit-pricing-table-variant-skylith-alt-1 ghostkit-custom-1wVuQR">
        <div class="ghostkit-pricing-table-inner">
            @if(isset( $packages ) && !empty( $packages) && $packages->count()>0 )
            @foreach( $packages as $index=>$value)
            <div class="ghostkit-pricing-table-item-wrap ghostkit-custom-Z1js0pQ" data-ghostkit-sr="fade-up;distance:10px">
                <div class="ghostkit-pricing-table-item">
                    <h3 class="ghostkit-pricing-table-item-title">For {{isset($value->name) && !empty($value->name) ? $value->name : '-'}}</h3>
                    <div class="ghostkit-pricing-table-item-price"><span class="ghostkit-pricing-table-item-price-currency">$</span><span class="ghostkit-pricing-table-item-price-amount">{{isset($value->price) && !empty($value->price) ? $value->price : '0'}}</span></div>
                    <div class="ghostkit-pricing-table-item-description">Per Year</div>
                    <ul class="ghostkit-pricing-table-item-features">
                        @if(!empty($value->details) && $value->details->count()>0)
                        @foreach($value->details as $i=>$v)
                        <li>⧫ {{isset($v->feature) && !empty($v->feature) ? $v->feature : '-'}}</li>
                        @endforeach
                        @endif

                    </ul>
                    <div class="ghostkit-pricing-table-item-button-wrapper">
                        <div class="ghostkit-button-wrapper ghostkit-button-wrapper-gap-md ghostkit-button-wrapper-align-center">
                            <div class="ghostkit-button-wrapper-inner">
                                <a class="ghostkit-button ghostkit-button-md ghostkit-custom-216yd5" href="{{route('subscribe', strtolower($value->name))}}"><span class="ghostkit-button-text">Sign up</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <!-- <div class="ghostkit-pricing-table-item-wrap ghostkit-custom-1m35cF" data-ghostkit-sr="fade-up;distance:10px;delay:200">
                <div class="ghostkit-pricing-table-item">
                    <h3 class="ghostkit-pricing-table-item-title">For Labels</h3>
                    <div class="ghostkit-pricing-table-item-price"><span class="ghostkit-pricing-table-item-price-currency">$</span><span class="ghostkit-pricing-table-item-price-amount">60.99</span></div>
                    <div class="ghostkit-pricing-table-item-description">Per Year</div>
                    <ul class="ghostkit-pricing-table-item-features">
                        <li>⧫ Free Marketing On Every Song Release</li>
                        <li>⧫ Unlimited Music Releases</li>
                        <li>⧫ Release Music In 10 Days</li>
                        <li>⧫ 100% Royalties</li>
                        <li>⧫ 24hr Support</li>
                        <li>⧫ Youtube Content ID</li>
                        <li>⧫ Pre-Save</li>
                        <li>⧫ Schedule Release Date</li>
                        <li>⧫ Monthly Payouts</li>
                        <li>⧫ Major Streaming Stores</li>
                        <li>⧫ Unlimited Music releases For Multiple Artists</li>
                        <li>⧫ Custom Record Label</li>
                    </ul>
                    <div class="ghostkit-pricing-table-item-button-wrapper">
                        <div class="ghostkit-button-wrapper ghostkit-button-wrapper-gap-md ghostkit-button-wrapper-align-center">
                            <div class="ghostkit-button-wrapper-inner">
                                <a class="ghostkit-button ghostkit-button-md ghostkit-custom-2iNshO" href="sign-up/index.htm"><span class="ghostkit-button-text">SIGN UP</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
