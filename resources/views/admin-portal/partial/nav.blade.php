<ul class="nav">
  <li class="nav-item profile">
    <div class="profile-desc">
      <div class="profile-pic">
        <div class="count-indicator">
          <img class="img-xs rounded-circle " src="{{asset('portal/assets/images/liamgareth.webp')}}" alt="">
          <span class="count bg-success"></span>
        </div>
        <div class="profile-name">
          <h5 class="mb-0 font-weight-normal">{{getAdminAuth()->name}}</h5>
          <span>Co. founder</span>
        </div>
      </div>
      <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
      <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">

        <a href="{{route('admin.settings')}}" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-onepassword  text-info"></i>
            </div>
          </div>
          <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small" >Settings</p>
          </div>
        </a>

        <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-onepassword  text-info"></i>
            </div>
          </div>
          <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small" >Logout</p>
            <form id="logout-form2" action="{{ route('admin.logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </a>
      </div>
    </div>
  </li>
  <li class="nav-item nav-category">
    <span class="nav-link">Your Dashboard</span>
  </li>

  <!-- Sharpline Side Dashboard start  -->

  <li class="nav-item menu-items @if(URL::current() == route('admin.dashboard')) active @endif ">
    <a class="nav-link" href="{{route('admin.dashboard')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-home"></i>
        </span> -->
      <span class="menu-title">Dashboard</span>
    </a>
  </li>


  <!-- Sharpline Side Dashboard End  -->
  <li class="nav-item menu-items   @if(URL::current() == route('admin.admins.index')) active @endif">
    <a class="nav-link " href="{{route('admin.admins.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Admins</span>
    </a>
  </li>
  <li class="nav-item menu-items   @if(URL::current() == route('admin.users.index')) active @endif">
    <a class="nav-link " href="{{route('admin.users.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Users</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.packages.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Packages </span>
    </a>
  </li>
  <li class="nav-item menu-items @if(URL::current() == route('admin.stream.index')) active @endif">
    <a class="nav-link" href="{{route('admin.stream.index')}}">
      <span class="menu-title">Stream Data</span>
    </a>
  </li>
  <li class="nav-item menu-items @if(URL::current() == route('admin.stream.manageStreamData')) active @endif">
    <a class="nav-link" href="{{route('admin.stream.manageStreamData')}}">
      <span class="menu-title">Manage Stream Data</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.release.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Release</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.video-release.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Video Release</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.takedown.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Audio Takedown Releases</span>
    </a>
  </li>

  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.royaltySplit.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Audio Royalty Split</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.royaltySplit.videoIndex')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Video Royalty Split</span>
    </a>
  </li>



  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.Videotakedown.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Video Takedown Releases</span>
    </a>
  </li>
  <li class="nav-item menu-items @if(URL::current() == route('admin.payout.addCredit')) active @endif">
    <a class="nav-link" href="{{route('admin.payout.addCredit')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title"> Add Credit Balance</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.payout.requests')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Payout Request</span>
    </a>
  </li>
  <li class="nav-item menu-items @if(URL::current() == route('admin.campaigns.index')) active @endif">
    <a class="nav-link" href="{{route('admin.campaigns.index')}}">
      <!-- <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span> -->
      <span class="menu-title">Marketing Campaign</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.supports.index')}}">
      <span class="menu-title">Support</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="{{route('admin.inquiries')}}">
      <span class="menu-title">Inquiries</span>
    </a>
  </li>
  <li class="nav-item menu-items @if(URL::current() == route('admin.unsubscribe.index')) active @endif">
    <a class="nav-link" href="{{route('admin.unsubscribe.index')}}">
      <span class="menu-title">Un Subscribe Users</span>
    </a>
  </li>

  <li class="nav-item menu-items">
    <a class="nav-link @if(URL::current() == route('admin.statements.index'))) active @endif " href="{{route('admin.statements.index')}}">
      <span class="menu-title">Statements</span>
    </a>
  </li>

  <li class="nav-item menu-items">
    <a class="nav-link" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="menu-title">Logout</span>
    </a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </li>
</ul>
