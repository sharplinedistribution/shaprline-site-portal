@extends('layouts.admin_scaffold')
@push('title')
- Dashboard
@endpush
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="container-fluid d-flex justify-content-between align-items-center p-2">
      <h1 class="h1 mb-5 mt-2">Welcome to Sharpline</h1>

    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$users_count}}</h2>
              </div>
              <h6 class="text-muted font-weight-normal">Number of user</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-account text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$payout_count}}</h2>
              </div>
              <h6 class="text-muted font-weight-normal"> Request for Payment</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-cash-usd text-danger ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$release_count}}</h2>
              </div>
              <h6 class="text-muted font-weight-normal">Number of release</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-headset text-success ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$campaign_count}}</h2>
              </div>
              <h6 class="text-muted font-weight-normal">Marketing Campaign</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-highway text-danger ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$support_count}}</h2>
              </div>
              <h6 class="text-muted font-weight-normal">Support</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-message text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0" >
                    <a href="{{ route('admin.takedown.index') }}" style="text-decoration: none; color:white ">A {{$takedown_count}}</a>&nbsp;&nbsp;|&nbsp;
                    <a href="{{ route('admin.Videotakedown.index') }}" style="text-decoration: none; color: white">V {{ $video_takedown_count }}</a>
                </h2>
                </div>
                <h6 class="text-muted font-weight-normal">Takedown Requests</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-arrow-down-drop-circle text-warning ml-auto"></i>
              </div>
            </div>
          </a>
          </div>
        </div>
      </div>
  </div>


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<!-- partial -->
@endsection
@push('scripts')

@endpush
