@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
@endpush
@push("styles")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <!-- user analytics -->
            <div class="card mb-4">
                <form action="{{route('admin.stream.storeAnalytics')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title mb-2">Stream Analytics: {{ getUserById(request('user')) }} <a href="{{route('admin.getLogin', request('user'))}}" target="_blank" class="btn btn-warning float-right mb-3">Login</a></h4>
                        <br>
                        <hr class="hr-releases mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alTitle">Date</label>
                                    <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alTitle">Stream Analytics</label>
                                    <input type="number" name="count" class="form-control" id="alTitle" placeholder="Enter count">
                                    <input type="hidden" name="user_id" value="{{request()->user}}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            <!-- user platforms -->
            <div class="card  mb-4">
                    <input type="hidden" name="user_id" value="{{request()->user}}">
                    <div class="card-body">
                        <h4 class="card-title"> Top Performing DSPs</h4>
                        <form method="POST" action="{{ route('admin.stream.topPlatforms',request('user')) }}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user" value="{{request()->user}}">
                                <div class="col-md-12">
                                    {{-- <label>Select upto 10 stores</label> --}}
                                    <select class="form-control topStores" multiple name="top_platforms[]" required >
                                        @if(isset($stores) && !empty($stores) && $stores->count()>0)
                                            @foreach($stores as $index=>$value)
                                                <option value="{{ $value->name }}" @if(!empty(userPlatforms(request('user')))) @if(in_array($value->name,userPlatforms(request('user')))) selected @endif @endif>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p></p>
                        @if(!empty(topPlatforms(request('user'))) )
                        <form action="{{route('admin.stream.storePlatforms')}}" method="POST">
                            @csrf

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> PLATFORM </th>
                                                <th> STREAM </th>
                                                {{-- <th> CHANGE </th> --}}
                                                {{-- <th> % SPLIT </th> --}}
                                                <!-- <th> Deadline </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(topPlatforms(request('user')) as $index=>$value)
                                            <input type="hidden" name="store_id[]" value="{{$value->id}}">
                                            <tr>
                                                <td class="py-1">
                                                    <span>{{isset($value->name) && !empty($value->name) ? $value->name : '-'}} </span>
                                                </td>
                                                <td>
                                                    <input type="number" name="platform_stream[]" class="form-control" step="any">
                                                    <input type="hidden" name="platform_change[]" class="form-control"  >
                                                    <input type="hidden" name="platform_split[]" class="form-control"  >
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            <input type="hidden" value="{{request('user')}}" name="user_id">
                        </form>
                        @endif
            </div>
            <!-- user top stores -->


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Performing Countries</h4>
                    <form method="POST" action="{{ route('admin.stream.topCountries',request('user')) }}">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user" value="{{request()->user}}">
                            <div class="col-md-12">
                                {{-- <label>Select Top Countries</label> --}}
                                <select class="form-control topCountries" multiple name="top_countries[]" required >
                                    @if(isset($countries) && !empty($countries) && $countries->count()>0)
                                        @foreach($countries as $index=>$value)
                                            <option value="{{ $value->id }}" @if(!empty(userCountries(request('user')))) @if(in_array($value->id,userCountries(request('user')))) selected @endif @endif>{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="icons-list row mt-4 mb-4 d-none">
                        @if(isset($countries) && !empty($countries) && $countries->count()>0)
                        @foreach($countries as $index=>$value)

                        <div class="col-6 col-md-3">
                            <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="country" data-country_id="{{$value->id}}" class="form-check-input country_check">
                                    <i class="input-helper w-auto"></i></label>
                            </div> <i class="{{isset($value->flag) && !empty($value->flag) ? $value->flag : ''}}" title="{{isset($value->code) && !empty($value->code) ? $value->code : '-'}}" id="{{isset($value->code) && !empty($value->code) ? $value->code : '-'}}"></i> {{isset($value->code) && !empty($value->code) ? ucwords($value->code) : '-'}}
                        </div>


                        @endforeach
                        @endif
                    </div>


                    <button type="button" class="btn btn-success mb-4 d-none" id="select_country">Select</button>
                    @if(!empty(topCountries(request('user'))) )
                    <form action="{{ route('admin.stream.streamByCountries',request('user')) }}" method="POST">
                        @csrf
                        <div class="table-responsive mb-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> COUNTRY </th>
                                        <th> STREAM </th>
                                        <th> CHANGE </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach(topCountries(request('user')) as $index=>$value)
                                        <input type="hidden" name="country_id[]" value="{{$value->id}}">
                                        <tr>
                                            <td>
                                                <i class="{{ $value->flag }} pt-1 mr-2" title="ad" id="ad"></i> {{ $value->name }}
                                            </td>
                                            <td> <input type="number" class="form-control" id="alTitle" placeholder="" name="topCountry_stream[]" step="any"> </td>
                                            <td>
                                                <input type="number" class="form-control" id="alTitle" placeholder=""  name="topCountry_change[]" step="any">
                                            </td>
                                        </tr>

                                    @endforeach





                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    @endif




                </div>
            </div>


            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <h4 class="card-title">Revenue Analytics </h4>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                        <form method="POST" action="{{ route('admin.stream.topStores',request('user')) }}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user" value="{{request()->user}}">
                                <div class="col-md-12">
                                    {{-- <label>Select upto 10 stores</label> --}}
                                    <select class="form-control topStores" multiple name="top_stores[]" required >
                                        @if(isset($stores) && !empty($stores) && $stores->count()>0)
                                            @foreach($stores as $index=>$value)
                                                <option value="{{ $value->name }}" @if(!empty(userStores(request('user')))) @if(in_array($value->name,userStores(request('user')))) selected @endif @endif>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                                </div>
                            </div>
                        </form>

                    <p></p>
                    @if(!empty(topStores(request('user'))) )
                    <form action="{{route('admin.stream.storeTopStores'  )}}" method="POST">
                        @csrf

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="d-none">
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label d-none">
                                                        <input type="checkbox" id="parent_checkbox" class="form-check-input">
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </th>
                                            <th> PLATFORM </th>
                                            {{-- <th> % SPLIT </th> --}}
                                            <th> AMOUNT </th>
                                            <!-- <th> Deadline </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(topStores(request('user')) as $index=>$value)
                                        <input type="hidden" name="store_id[]" value="{{$value->id}}">
                                        <tr>
                                            <td class="d-none">
                                                <div class="form-check form-check-muted m-0 ">
                                                    <label class="form-check-label">
                                                        <!-- <input type="hidden" name="is_top[{{$index}}]" value="off"> -->
                                                        <input type="checkbox" name="is_top[{{$index}}]" data-store-id="{{$value->id}}" class="form-check-input child_checkbox">
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="py-1">
                                                <span>{{isset($value->name) && !empty($value->name) ? $value->name : '-'}} </span>
                                            </td>
                                            <td>
                                                <input type="number" name="topStore_amount[]" class="form-control" id="alTitle" placeholder=" " step="any">
                                                <input type="hidden" name="topStore_split[]" class="form-control" id="alTitle" placeholder=" ">
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        <input type="hidden" value="{{request('user')}}" name="user_id">
                    </form>
                    @endif

        </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('admin/js/chart.js')}}"></script>
<script type="">
    $(".topStores").select2({
        // maximumSelectionLength: 10
    });
    $(".topCountries").select2({
    });
    $(document).ready(function () {
    //    $(".child_checkbox").attr('value', true);
        $("#parent_checkbox").click(function () {
            $(".child_checkbox").prop('checked', $(this).prop('checked'));

        });

    });
        $(".child_checkbox").on('change', function() {
        // if ($(this).is(':checked')) {
        //     $(this).attr('value', true);
        //     $(this).val(Store_id);
        // } else {
        //     $(this).attr('value', false);
        // }

        });
        $(".country_check").on('change', function() {
            var favorite = [];
            $.each($("input[name='country']:checked"), function(){
                favorite.push($(this).attr('data-country_id'));
            });
            if(favorite.length == 10 ){
                notify(favorite.length, "success");
                notify("Limit Exceeds, you can not select more ", "danger");
                $(".country_check").attr("disabled",true);
            }
            console.log(favorite);
        });
        $("#select_country").click(function(){
            $(".country_check").attr("disabled",false);
            var checked  = $("input[name='country']:checked");
            console.log("checked"+ checked);
                $.each(checked, function( index, value ) {
                    alert( value );
                });
                $('.loader').fadeIn();
                var favorite = [];
                setTimeout(function() {
                    $.each($("input[name='country']:checked"), function(){
                        favorite.push($(this).attr('data-country_id'));
                        $('.loader').fadeOut();
                    });
                    $(".country_check").attr("disabled",true);
                }, 2000);
                console.log(favorite);
                $.ajax({
                    url : "{{route('admin.stream.fetchCountries')}}",
                    method: "POST",
                    data:{
                        _token : "{{csrf_token()}}",
                        array : favorite,
                    },
                    beforeSend:function(){
                        $('.loader').fadeIn();
                    },
                    success:function(res){
                        $('.loader').fadeOut();
                        console.log(res);
                    },
                    error:function(res){
                        console.log(res);
                }
            });

        });

    </script>
@endpush
