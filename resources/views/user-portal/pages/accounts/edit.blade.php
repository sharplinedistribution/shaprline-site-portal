{{-- @extends('layouts.user_scaffold') --}}
@extends('layouts.portal_revamp_scaffold')
@push('title')
{{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="container-fluid d-flex  align-items-center p-2">
            <h1 class="h1 mb-2 mt-2"> <span class="user" style="color: #fbda03;">My Account</span>
            </h1><br>

        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <p class="mb-2">First Name - {{isset($user->first_name) && !empty($user->first_name) ? $user->first_name : '-'}}</p>
            <p class="mb-2">Last Name - {{isset($user->last_name) && !empty($user->last_name) ? $user->last_name : '-'}}</p>
            <p class="mb-2">Email - {{isset($user->email) && !empty($user->email) ? $user->email : '-'}}</p>
            <p class="mb-2">Subscription -
                {{ isset($latest_package->package) && !empty($latest_package->package) ? ucfirst($latest_package->package) : '-' }}
                (Expire date -
                {{ isset($latest_package->expiry_at) && !empty($latest_package->expiry_at) ? date('d/m/Y' , strtotime($latest_package->expiry_at)) : '-' }}
                )
            </p>
            <a class="btn btn-lg mt-3" href="{{route('user.accounts.renewplans')}}" style="background-color:#fbda03; color:#333;">Renew Now</a>
        </div>
    </div>
    @if($errors->any())
    @foreach($errors->all() as $value)
    <span class="text-danger" style="font-size:15px;"> {{$value}} </span><br>
    @endforeach

    @endif
    <!-- Setting Password - Sharplinedistro -->
    <div class="container-fluid bg-gray-dark p-5">
        <h2 style="color: #fbda03 ;">New Password</h2>
        <form action="{{route('user.accounts.updatePassword')}}" class="setting__account" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="oldPassword">Old Password</label>
                        <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Old Password" required>
                        @error("old_password") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="password1">New Password</label>
                        <input type="password" class="form-control" name="password" id="password1" placeholder="New Password" required>
                        @error("password") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                        @error("password_confirmation") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg" style="background-color:#fbda03; color:#333;">Update Password</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subscription History</h4>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="transactions">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Amount($)</th>
                                    <th> Customer ID</th>
                                    <th> Status </th>
                                    <th> Date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($payments) && !empty($payments) && $payments->count()>0)
                                @foreach($payments as $index=>$value)
                                <tr>
                                    <td> 1 </td>
                                    <td> {{isset($value->amount) && !empty($value->amount) ? $value->amount : 0 }}</td>
                                    <td> {{isset($value->customer_id) && !empty($value->customer_id) ? $value->customer_id : 0 }}</td>
                                    <td> {{isset($value->status) && !empty($value->status) ? $value->status : 0 }}</td>
                                    <td> {{date('d/m/Y' , strtotime($value->expiry_at))}}</td>
                                </tr>
                                @endforeach
                                @endif


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Music Plateforms -->



    <!-- partial -->
</div>


@endsection
@push("scripts")
<script src="{{asset('web/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('web/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#transactions').DataTable();
    });
</script>
@endpush