@extends('layouts.portal_revamp_scaffold')
@push('title')
    My Account
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
@endpush
@section('content')
<div class="row px-lg-4">
    <div class="col-12 mb-2">
        <div class="d-flex justify-content-between mt-1">
            <div>
                <h2 class="user-name">
                    <span>My Account</span>
                </h2>
            </div>

        </div>

        <div class="d-flex justify-content-between mt-4">
            <div>
                <p class="tag my-account mb-1">First Name -  {{isset($user->first_name) && !empty($user->first_name) ? $user->first_name : '-'}}</p>
                <p class="tag my-account mb-1">Last Name - {{isset($user->last_name) && !empty($user->last_name) ? $user->last_name : '-'}}</p>
                <p class="tag my-account mb-1">Email - {{isset($user->email) && !empty($user->email) ? $user->email : '-'}}</p>
                <p class="tag my-account mb-1">Subscription -  {{ isset($latest_package->package) && !empty($latest_package->package) ? ucfirst($latest_package->package) : '-' }}
                    (Expire date -
                    {{ isset($latest_package->expiry_at) && !empty($latest_package->expiry_at) ? date('d/m/Y' , strtotime($latest_package->expiry_at)) : '-' }}
                    )</p>
            </div>

        </div>

        <div class="d-flex justify-content-between mt-3">
            <div>
                <a href="{{route('user.accounts.renewplans')}}">
                    <button class="btn btn-primary rounded">Renew Now</button>
                </a>
            </div>
            
        </div>
    </div>
    <div class="col-12">
        @if($errors->any())
            @foreach($errors->all() as $value)
            <span class="text-danger" style="font-size:15px;"> {{$value}} </span><br>
            @endforeach

        @endif
        <form action="{{route('user.accounts.updatePassword')}}" class="setting__account" method="POST">
            @csrf
            @method("PUT")
            <div class="auth-form">
                <div class="card">
                    <div class="card-body py-4 px-lg-4 px-2">
                        <div class="row px-0">
                            <div class="col-12 ">
                                <p class="tab-title mt-0 mb-4 ms-2">New Password</p>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Old Password</label>
                                    <input type="password" name="old_password" placeholder="Old Password" class="form-control custom-control" id="oldPassword"  placeholder="Old Password" required>
                                    @error("old_password") <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">New Password</label>
                                    <input type="password" name="password"  placeholder="New Password" class="form-control custom-control" id="password1" placeholder="New Password" required>
                                    @error("password") <span class="text-danger">{{$message}}</span> @enderror

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-lg-4 mb-3">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control custom-control" id="confirmPassword"  placeholder="Confirm Password" required>
                                    @error("password_confirmation") <span class="text-danger">{{$message}}</span> @enderror

                                </div>  
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded">Update Password</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>

<div  class="row px-lg-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body px-0">

                <div class="col-12 px-3">
                    <p class="tab-title mt-0 mb-4 ms-2">Subscription History</p>
                </div>
                <div class="table-responsive">
                    <table id="example" class="datatables-basic table">
                        <thead>
                          <tr>
                            <th class="ps-4">#</th>
                            <th>Amount($)</th>
                            <th>Customer ID</th>
                            <th>Status</th>
                            <th class="pe-4">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                            @if(isset($payments) && !empty($payments) && $payments->count()>0)
                            @foreach($payments as $index=>$value)
                            <tr>
                                <td class="ps-4 py-4"> {{++$index}} </td>
                                <td class="py-4"> {{isset($value->amount) && !empty($value->amount) ? $value->amount : 0 }}</td>
                                <td class="py-4"> {{isset($value->customer_id) && !empty($value->customer_id) ? $value->customer_id : 0 }}</td>
                                <td class="py-4"> {{isset($value->status) && !empty($value->status) ? $value->status : 0 }}</td>
                                <td class="pe-4 py-4"> {{date('d/m/Y' , strtotime($value->expiry_at))}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                      </table>
                </div>
                <div class="row mt-4 mb-2 px-lg-4 d-none">
                    <div class="d-sm-flex justify-content-between align-items-center text-center">
                        <div>
                            <p class="m-0">
                                Showing 1 to 1 of 1 entries
                            </p>
                        </div>
                        <div class="d-flex gap-3 align-items-center justify-content-center mt-sm-0 mt-3">
                            <span class="pagination-btn d-block">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                            <span>1/12</span>
                            <span class="pagination-btn d-block">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();

    });
</script>
@endpush