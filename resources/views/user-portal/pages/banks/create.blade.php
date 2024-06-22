@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
@push('styles')
<style>
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #FBDA03;
    border-bottom: 2px solid #FBDA03;
    font-weight: 500;
    background-color:#000;
}
.nav-pills .nav-link {
    border: none;
}
.a{
    color:white;
    font-weight:600;
}
.bg-yellow{
    background: #fbda03;
    color:black !important;
    font-weight: 500;
    border: 1px solid #fbda03;
}
.form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
    height: 49px;
    background: #0D0D0D;
    color: white;
    border: 1px solid #fbda03;
}
.form-control:focus, .asColorPicker-input:focus, .dataTables_wrapper select:focus, .jsgrid .jsgrid-table .jsgrid-filter-row input:focus[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select:focus, .jsgrid .jsgrid-table .jsgrid-filter-row input:focus[type=number], .select2-container--default .select2-selection--single:focus, .select2-container--default .select2-selection--single .select2-search__field:focus, .typeahead:focus, .tt-query:focus, .tt-hint:focus {
    border: 1px solid #fbda03;
    background-color: #151515;
}
label {
    color: white;
    font-size: 18px;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    background: #0D0D0D;
}
a:hover {
    color: #fbda03;
    text-decoration: underline;
    border-bottom: 2px solid #FBDA03 !important;
}
</style>
@endpush
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3><span style="color: #fbda03;">Payout</span></h3>
            <h4>Current Balance : <b style="color: #fbda03;">USD {{ currentStatus(auth()->user()->id) }}</b></h4>
        </div>

    </div>
    <div class="section__campaignForm mt-5">
        <div class="mb-3">
            @if($errors->any())
            @foreach($errors->all() as $value)
            <span class="text-danger" style="font-size:15px;"> {{$value}} </span><br>
            @endforeach
            @endif
        </div>
        <div class="container-fluid bg-dark p-2">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link a active paymentM" aria-current="page" href="#" id="paypal" onclick="paymentMethod($(this),'paypal')">Paypal</a>
                <a class="nav-link a paymentM" href="#" id="usa" onclick="paymentMethod($(this),'usa')">USA BANK Payout</a>
                <a class="nav-link a paymentM" href="#" id="uk" onclick="paymentMethod($(this),'uk')">UK BANK Payout</a>
                <a class="nav-link a paymentM" href="#" id="euro" onclick="paymentMethod($(this),'euro')">Euro BANK Payout</a>
              </nav>

              <form method="POST" action="{{ route('user.storeBank',['method' => 'paypal']) }}">
                @csrf
                    <div class="row p-4" id="paypalBank" >
                        <div class="col-md-12 mt-4">
                            <h3><span style="color: #fbda03;">Paypal</span></h3>
                            <span style="color:white; font-size:18px;" >Amount to be paid</span>
                        </div>
                        <div class="col-md-1 mt-2">
                            <button class="btn btn-primary btn-lg bg-yellow">USD</button>
                        </div>
                        <div class="col-md-11 mt-2  pl-5">
                            <input type="text" name="amount" class="form-control input-lg" placeholder="0.00" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Your Paypal email</label>
                            <input name="email" type="text" class="form-control" placeholder="Your Paypal email" value="{{ isset(bankAccount($bank,'paypal')->email) ? bankAccount($bank,'paypal')->email : null }}" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Confirm Paypal email</label>
                            <input name="confirm_email" type="text" class="form-control" placeholder="Confirm Paypal email" value="{{ isset(bankAccount($bank,'paypal')->confirm_email) ? bankAccount($bank,'paypal')->confirm_email : null }}" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Sharpline Distro Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Password" value="{{ isset(bankAccount($bank,'paypal')->password) ? bankAccount($bank,'paypal')->password : null }}" required>
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-lg btn-primary bg-yellow float-right">Execute</button>
                        </div>
                  </div>
              </form>

              <form method="POST" action="{{ route('user.storeBank',['method' => 'usa']) }}">
                @csrf
                <div class="row p-4" id="usaBank" style="display:none">
                    <div class="col-md-12 mt-4">
                        <h3><span style="color: #fbda03;">USA Bank Account</span></h3>
                        <span style="color:white; font-size:18px;" >Amount to be paid</span>
                    </div>
                    <div class="col-md-1 mt-2">
                        <button class="btn btn-primary btn-lg bg-yellow">USD</button>
                    </div>
                    <div class="col-md-11 mt-2  pl-5">
                        <input name="amount" type="text" class="form-control input-lg" placeholder="0.00" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Name on Account</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{ isset(bankAccount($bank,'usa')->name) ? bankAccount($bank,'usa')->name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Address of Account Holder</label>
                        <input name="address" type="text" class="form-control" placeholder="Address" value="{{ isset(bankAccount($bank,'usa')->address) ? bankAccount($bank,'usa')->address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Account Number</label>
                        <input name="account_number" type="text" class="form-control" placeholder="Account Numnber" value="{{ isset(bankAccount($bank,'usa')->account_number) ? bankAccount($bank,'usa')->account_number : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Routing Number</label>
                        <input name="routing_number" type="text" class="form-control" placeholder="Routing Number" value="{{ isset(bankAccount($bank,'usa')->routing_number) ? bankAccount($bank,'usa')->routing_number : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Bank Name</label>
                        <input name="bank_name" type="text" class="form-control" placeholder="Bank Name" value="{{ isset(bankAccount($bank,'usa')->bank_name) ? bankAccount($bank,'usa')->bank_name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Bank Address</label>
                        <input name="bank_address" type="text" class="form-control" placeholder="Bank Address" value="{{ isset(bankAccount($bank,'usa')->bank_address) ? bankAccount($bank,'usa')->bank_address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Sharpline Distro Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Sharpline Distro Pasword" value="{{ isset(bankAccount($bank,'usa')->password) ? bankAccount($bank,'usa')->password : null }}" required>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-lg btn-primary bg-yellow float-right">Execute</button>
                    </div>
                  </div>
              </form>


              <form method="POST" action="{{ route('user.storeBank',['method' => 'uk']) }}">
                @csrf
                <div class="row p-4" id="ukBank" style="display:none">

                    <div class="col-md-12 mt-4">
                        <h3><span style="color: #fbda03;">UK Bank Account</span></h3>
                        <span style="color:white; font-size:18px;" >Amount to be paid</span>
                    </div>
                    <div class="col-md-1 mt-2">
                        <button class="btn btn-primary btn-lg bg-yellow">USD</button>
                    </div>
                    <div class="col-md-11 mt-2  pl-5">
                        <input name="amount" type="text" class="form-control input-lg" placeholder="0.00" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Name on Account</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{ isset(bankAccount($bank,'uk')->name) ? bankAccount($bank,'uk')->name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Address of Account Holder</label>
                        <input name="address" type="text" class="form-control" placeholder="Address" value="{{ isset(bankAccount($bank,'uk')->address) ? bankAccount($bank,'uk')->address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Account Number</label>
                        <input name="account_number" type="text" class="form-control" placeholder="Account Numnber" value="{{ isset(bankAccount($bank,'uk')->account_number) ? bankAccount($bank,'uk')->account_number : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Sort Code</label>
                        <input name="sort_code" type="text" class="form-control" placeholder="Sort code" value="{{ isset(bankAccount($bank,'uk')->sort_code) ? bankAccount($bank,'uk')->sort_code : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">IBAN</label>
                        <input name="iban" type="text" class="form-control" placeholder="IBAN"  value="{{ isset(bankAccount($bank,'uk')->iban) ? bankAccount($bank,'uk')->iban : null }}" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Bank Name</label>
                        <input name="bank_name" type="text" class="form-control" placeholder="Bank Name" value="{{ isset(bankAccount($bank,'uk')->bank_name) ? bankAccount($bank,'uk')->bank_name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Bank Address</label>
                        <input name="bank_address" type="text" class="form-control" placeholder="Bank Address" value="{{ isset(bankAccount($bank,'uk')->bank_address) ? bankAccount($bank,'uk')->bank_address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Sharpline Distro Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Sharpline Distro Pasword" value="{{ isset(bankAccount($bank,'uk')->password) ? bankAccount($bank,'uk')->password : null }}" required>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-lg btn-primary bg-yellow float-right">Execute</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('user.storeBank',['method' => 'euro']) }}">

                @csrf
                <div class="row p-4" id="euroBank" style="display:none">

                    <div class="col-md-12 mt-4">
                        <h3><span style="color: #fbda03;">Euro Bank Account</span></h3>
                        <span style="color:white; font-size:18px;" >Amount to be paid</span>
                    </div>
                    <div class="col-md-1 mt-2">
                        <button class="btn btn-primary btn-lg bg-yellow">USD</button>
                    </div>
                    <div class="col-md-11 mt-2  pl-5">
                        <input name="amount" type="text" class="form-control input-lg" placeholder="0.00" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Name on Account</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{ isset(bankAccount($bank,'euro')->name) ? bankAccount($bank,'euro')->name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Address of Account Holder</label>
                        <input name="address" type="text" class="form-control" placeholder="Address" value="{{ isset(bankAccount($bank,'euro')->address) ? bankAccount($bank,'euro')->address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Account Number</label>
                        <input name="account_number" type="text" class="form-control" placeholder="Account Numnber" value="{{ isset(bankAccount($bank,'euro')->account_number) ? bankAccount($bank,'euro')->account_number : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">BIC</label>
                        <input name="bic" type="text" class="form-control" placeholder="BIC" value="{{ isset(bankAccount($bank,'euro')->bic) ? bankAccount($bank,'euro')->bic : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">IBAN</label>
                        <input name="iban" type="text" class="form-control" placeholder="IBAN" value="{{ isset(bankAccount($bank,'euro')->iban) ? bankAccount($bank,'euro')->iban : null }}" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Bank Name</label>
                        <input name="bank_name" type="text" class="form-control" placeholder="Bank Name" value="{{ isset(bankAccount($bank,'euro')->bank_name) ? bankAccount($bank,'euro')->bank_name : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Bank Address</label>
                        <input name="bank_address" type="text" class="form-control" placeholder="Bank Address" value="{{ isset(bankAccount($bank,'euro')->bank_address) ? bankAccount($bank,'euro')->bank_address : null }}" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Sharpline Distro Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Sharpline Distro Pasword" value="{{ isset(bankAccount($bank,'euro')->password) ? bankAccount($bank,'euro')->password : null }}" required>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-lg btn-primary bg-yellow float-right">Execute</button>
                    </div>
                  </div>
            </form>



        </div>
    </div>





    <!-- Music Plateforms -->



    <!-- partial -->
</div>


@endsection
@push("scripts")
<!-- inject:js -->
<script src="{{asset('web/js/off-canvas.js')}}"></script>
<script src="{{asset('web/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('web/js/misc.js')}}"></script>
<script src="{{asset('web/js/settings.js')}}"></script>
<script src="{{asset('web/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('web/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('web/js/chart.js')}}"></script>
<script type="">
    $(document).ready(function () {
        $('#example').DataTable();
        $(".nav-item").removeClass('active');
    });
    function paymentMethod(elm,type){
        $('.paymentM').removeClass('active');
        $('#'+type).addClass('active');
        if(type == 'paypal'){
            $("#paypalBank").show();
            $("#ukBank").hide();
            $("#usaBank").hide();
            $("#euroBank").hide();
        }
        else if(type == 'usa'){
            $("#paypalBank").hide();
            $("#ukBank").hide();
            $("#usaBank").show();
            $("#euroBank").hide();
        }
        else if(type == 'uk'){
            $("#paypalBank").hide();
            $("#ukBank").show();
            $("#usaBank").hide();
            $("#euroBank").hide();
        }
        else if(type == 'euro'){
            $("#paypalBank").hide();
            $("#ukBank").hide();
            $("#usaBank").hide();
            $("#euroBank").show();
        }
    }
</script>

@endpush
