<div class="msb" id="msb">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header position-relative">
            <span class="close menu-toggle  d-lg-none d-block"><i class="fa-solid fa-xmark"></i></span>
            <div class="brand-wrapper">
                <!-- Brand -->
                <div class="brand-name-wrappers">
                    <a class="navbar-brand" href="{{route('user.dashboard')}}">
                       <img src="{{asset('images/logoSharpline.png')}}" width="180" alt="">
                    </a>
                </div>

            </div>

        </div>

        <!-- Main Menu -->
        <div class="side-menu-container w-100" >
            <ul class="nav navbar-nav">
                <li><a href="javascript:;" class="btn  border-0 d-none">Hi, {{auth()->user()->name}}</a></li>
                <li><a href="{{route('user.dashboard')}}" class="btn @if(URL::current() == route('user.dashboard')) active @endif">Home</a></li>
                <li><a href="{{route('user.release.create')}}" class="btn @if(URL::current() == route('user.release.create')) active @endif">Create Release</a></li>
                <li><a href="{{route('user.create-bulk-release')}}" class="btn @if(URL::current() == route('user.create-bulk-release')) active @endif">Create Bulk Release</a></li>
                <li><a href="{{route('user.referralProgram')}}" class="btn @if(URL::current() == route('user.referralProgram')) active @endif">Referral Program</a></li>
                <li><a href="{{route('user.video-release.create')}}" class="btn @if(URL::current() == route('user.video-release.create')) active @endif">Free Video Distribution</a></li>
                <li><a href="{{route('user.royalty-splits.index')}}" class="btn @if(URL::current() == route('user.royalty-splits.index') || URL::current() == Route::is('user.royalty-splits.share')) active @endif">Royalty Splits</a></li>
                <li><a href="{{route('user.rightsHolders.index')}}" class="btn @if(URL::current() == route('user.rightsHolders.index') || Route::is('user.rightsHolders.detail')) active @endif">Rights Holders</a></li>


                <li><a href="{{route('user.campaigns.create')}}" class="btn @if(URL::current() == route('user.campaigns.create') || URL::current() == Route::is('user.campaigns.index') || URL::current() == Route::is('user.campaigns.edit') || URL::current() == Route::is('user.campaigns.show')) active @endif">Free Marketing Campaign</a></li>
                <li><a href="{{route('user.release.index')}}" class="btn @if(URL::current() == route('user.release.index') || URL::current() == Route::is('user.release.show')) active @endif">My Releases</a></li>
                <li><a href="{{route('user.video-release.index')}}" class="btn @if(URL::current() == route('user.video-release.index') ) active @endif">My Videos</a></li>
                <li><a href="{{route('user.payout.creditBalance')}}" class="btn @if(URL::current() == route('user.payout.creditBalance') || URL::current() == route('user.banks.create')) active @endif">Credit Balance</a></li>
                <li><a href="{{route('user.accounts.editMyAccount')}}" class="btn @if(URL::current() == route('user.accounts.editMyAccount') || URL::current() == route('user.accounts.renewplans')) active @endif">My Accounts</a></li>
                <li><a href="{{route('user.supports.create')}}" class="btn @if(URL::current() == route('user.supports.index') || URL::current() == route('user.supports.create') || URL::current() == Route::is('user.supports.show')) active @endif">Support</a></li>
                <li><a href="{{route('user.faqs.index')}}" class="btn @if(URL::current() == route('user.faqs.index')) active @endif">FAQ</a></li>
                {{-- <li><a href="{{route('user.analytics.index')}}" class="btn @if(URL::current() == route('user.analytics.index') || URL::current() == Route::is('user.top')) active @endif">Analytics</a></li> --}}
                <li><a href="{{route('user.statements.index')}}" class="btn @if(URL::current() == route('user.statements.index')) active @endif">Statements</a></li>
                <li>
                    <a  href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>



            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
