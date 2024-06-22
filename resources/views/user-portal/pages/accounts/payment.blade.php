@extends('layouts.portal_revamp_scaffold')
@push('styles')
<style>
    .error {
        color: red;
    }
    .header-dark-card {
        background-color: #101010;
        border: 1px solid #fbda03;
    }
</style>
@endpush
@push('title')
Subscribe {{ucwords($package_name)}} -
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="h2 text-white">Renew Your Plan</h2>
                </div>
                <div class="col-md-2">
                    <div class="spinner-border text-light d-none" id="loader" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header header-dark-card">
                    <h3 class="h3 text-white">{{ucwords($package_name)}} Package</h3>
                    <div class="d-flex justify-content-between text-white">
                        <span>Price</span>
                        <span>${{$price}} Per Year</span>
                    </div>
                </div>
            </div>

            <div class="card mt-5 d-none">
                <div class="card-header header-dark-card">
                    <d class="flex flex-direction-column">
                        <p class="text-white">Pay with PayPal</p>
                    </d>
                    <center>
                     <div id=""></div>
                     </center>
                </div>
            </div>
            <center style="margin-top:40px;" class="d-none">
                <span class="text-white">OR</span>
            </center>

            <div class="card mt-5 header-dark-card p-3 mb-5">
                <d class="flex flex-direction-column">
                    <p class="text-white">Pay with Credit Card</p>
                    <div class="d-flex" style="padding:35px;">
                        <img src="{{asset('web/images/Visa.png')}}" alt="" class="img-pay">
                        <img src="{{asset('web/images/MasterCard.png')}}" alt="" class="img-pay">
                        <img src="{{asset('web/images/Amex.png')}}" alt="" class="img-pay">
                        <img src="{{asset('web/images/Discover.png')}}" alt="" class="img-pay">
                    </div>
                </d>
                <form method="POST" id="form" class="mt-3">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="cardName">Name on Card</label>
                                    <input type="text" name="name" id="cardName" class="form-control" required>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="cardType">Card Type</label>
                                    <select class="form-control">
                                        <option>Visa</option>
                                        <option>MasterCard</option>
                                        <option>American Express</option>
                                        <option>Discover</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="cardNumber">Card Number</label>
                                    <input type="text" id="card_number" name="card_number" class="form-control" placeholder="1234-1234-1234-1234" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exprationDate">
                                        <span style="display: block;">Expiration</span>
                                        <span style="font-size: 10px; color:#eee;">MM/YYYY</span>
                                    </label>
                                    <input type="text" name="card_expiry" class="form-control" placeholder="MM / YYYY" id="exprationDate" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="expCode">
                                        <span style="display: block;">Security Code</span>
                                        <span style="font-size: 10px; color:#eee;">3 or 4 numbers on the back
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="CVS" id="card_cvc" name="card_cvc" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" required class="form-control" id="country" onchange="print_state('state',this.selectedIndex);">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="zipCode">Postal code</label>
                                    <input type="text" name="zip_code" required class="form-control" id="zipCode">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center mt-5">
                                <button type="submit" id="submit_btn" class="btn btn-lg btn-block text-center btn-block" style="color:#333; background-color: #fbda03;">Renew</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('web/js/payment-related.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT')}}&currency=USD&disable-funding=credit,card"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{(int)$price}}'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {

                $.ajax({
                    type: "POST",
                    url: "{{ route('user.accounts.payWithPaypal') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": data.orderID,
                        "response" : data,
                        "package" : "{{$package_name}}",
                    },
                    beforeSend: function(res) {
                        $('#loader').removeClass('d-none');
                        $("#submit_btn").attr("disabled", true);
                    },
                    success: function(res) {
                        $('#loader').addClass('d-none');
                        if (res.success == true) {
                            $("#submit_btn").attr("disabled", true);
                            $.notify(res.msg, 'success');
                            window.location.href = "{{url('user/dashboard')}}";
                        } else if (res.success == false) {
                            $.notify(res.msg, 'error');
                            $("#submit_btn").attr("disabled", false);
                        } else {
                            $.notify('Something Went Wrong', 'error');
                            $("#submit_btn").attr("disabled", false);
                        }
                    },
                    error: function(res) {
                        console.log(res);
                        $.notify('Something Went Wrong', 'error');
                        $("#submit_btn").attr("disabled", false);
                    }
                })
            });
        }


    }).render('#paypal-button-container');
    $(".paypal-button").remove();

</script>
<script>
    print_country("country");
    $(document).ready(function() {
        $("#form").validate({});
    });
    $(function() {
        $("#card_number").mask("9999-9999-9999-9999");
        $("#card_cvc").mask("999");
        $("#exprationDate").mask("99/9999");
    });

    $("#form").submit(function(e) {
        e.preventDefault();
        var formData = $("#form").serialize();
        $.ajax({
            type: "POST",
            url: "{{route('user.accounts.updatePlan',$package_name)}}",
            data: formData,
            beforeSend: function(res) {
                $('#loader').removeClass('d-none');
                $("#submit_btn").attr("disabled", true);
            },
            success: function(res) {
                $('#loader').addClass('d-none');
                if (res.success == true) {
                    $("#submit_btn").attr("disabled", true);
                    $.notify(res.msg, 'success');
                    window.location.href = "{{route('user.dashboard')}}";
                } else if (res.success == false) {
                    $.notify(res.msg, 'error');
                    $("#submit_btn").attr("disabled", false);
                } else {
                    $.notify('Something Went Wrong', 'error');
                    $("#submit_btn").attr("disabled", false);
                }
            },
            error: function(res) {
                // $('.loader').hide();
                $.notify('Something Went Wrong', 'error');
                $("#submit_btn").attr("disabled", false);
            }
        });
    });
</script>
@endpush
