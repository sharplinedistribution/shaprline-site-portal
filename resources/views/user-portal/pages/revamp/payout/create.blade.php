@extends('layouts.portal_revamp_scaffold')
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="d-flex justify-content-between mb-2">
    <div>
        <h2 class="user-name mb-1">
            <span>Payout</span>
        </h2>
        <h2 class="user-name mb-0">
            Current Balance: <span class="fw-bold">USD {{ currentStatus(auth()->user()->id) }}</span>
        </h2>
        <p style="color:white">
            Withdrawal Pending: <span class="fw-bold" style="color:var(--primary)">USD {{$pending}}</span>
            <br>
            Withdrawal Completed: <span class="fw-bold" style="color:var(--primary)">USD {{$completed}}</span>
        </p>
    </div>

</div>
<div class="col-12">
        <div class="auth-form">
            <div class="card">
                <div class="card-body px-0">
                    <div class="row">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-paypal-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-paypal" type="button"
                                    role="tab" aria-controls="nav-paypal"
                                    aria-selected="true">Paypal</button>
                                <button class="nav-link" id="nav-usa-bank-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-usa-bank" type="button" role="tab"
                                    aria-controls="nav-usa-bank" aria-selected="false">USA Bank
                                    Payout</button>
                                <button class="nav-link" id="nav-uk-bank-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-uk-bank" type="button" role="tab"
                                    aria-controls="nav-uk-bank" aria-selected="false">UK Bank
                                    Account</button>
                                <button class="nav-link" id="nav-euro-bank-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-euro-bank" type="button" role="tab"
                                    aria-controls="nav-euro-bank" aria-selected="false">Euro Bank
                                    Account</button>
                            </div>
                        </nav>
                    </div>
                    <div class="row mt-4 px-lg-4 px-2">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-paypal" role="tabpanel"
                                aria-labelledby="nav-paypal-tab">
                                <form method="POST" action="{{ route('user.storeBank',['method' => 'paypal']) }}" id="paypal">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="tab-title mt-0 mb-lg-4 mb-3 ms-2">Paypal</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label mb-0">Amount to be
                                                    Paid</label>
                                            </div>

                                            <div
                                                class="d-flex justify-content-between gap-3 align-items-center">
                                                <div class="mb-lg-4 mb-3">
                                                    <span class="currency-btn">
                                                        USD
                                                    </span>
                                                </div>
                                                <div class="mb-lg-4 mb-3 w-100">

                                                    <input type="number" name="amount" required placeholder="0.00"
                                                        class="form-control custom-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Your PayPal
                                                    email</label>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Your PayPal email"
                                                    class="form-control custom-control" value="{{ isset(bankAccount($bank,'paypal')->email) ? bankAccount($bank,'paypal')->email : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Confirm PayPal
                                                    email</label>
                                                <input type="email" name="confirm_email" id="email_confirmation"
                                                    placeholder="Confirm PayPal email"
                                                    class="form-control custom-control" value="{{ isset(bankAccount($bank,'paypal')->confirm_email) ? bankAccount($bank,'paypal')->confirm_email : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Sharpline Distro
                                                    password</label>
                                                <input type="password"
                                                    placeholder="Sharpline Distro password"
                                                    class="form-control custom-control"  name="password" value="{{ isset(bankAccount($bank,'paypal')->password) ? bankAccount($bank,'paypal')->password : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12 text-end">
                                            <button type="submit"
                                                class="btn btn-primary rounded">Execute</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-usa-bank" role="tabpanel"
                                aria-labelledby="nav-usa-bank-tab">
                                <form method="POST" action="{{ route('user.storeBank',['method' => 'usa']) }}" id="usa">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="tab-title mt-0 mb-lg-4 mb-3 ms-2">USA Bank Account</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label mb-0">Amount to be
                                                    Paid</label>
                                            </div>

                                            <div
                                                class="d-flex justify-content-between gap-3 align-items-center">
                                                <div class="mb-lg-4 mb-3">
                                                    <span class="currency-btn">
                                                        USD
                                                    </span>
                                                </div>
                                                <div class="mb-lg-4 mb-3 w-100">

                                                    <input type="number" name="amount" placeholder="0.00" class="form-control custom-control" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Name on Account</label>
                                                <input name="name" type="text" placeholder="Name on Account" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->name) ? bankAccount($bank,'usa')->name : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Address of Account Holder</label>
                                                <input type="text" name="address" placeholder="Address of Account Holder" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->address) ? bankAccount($bank,'usa')->address : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Account Number</label>
                                                <input type="text" name="account_number" placeholder="Account Number" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->account_number) ? bankAccount($bank,'usa')->account_number : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Routing Number</label>
                                                <input name="routing_number" type="text" placeholder="Routing Number" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->routing_number) ? bankAccount($bank,'usa')->routing_number : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Name</label>
                                                <input type="text" name="bank_name" placeholder="Bank Name" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->bank_name) ? bankAccount($bank,'usa')->bank_name : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Address</label>
                                                <input type="text" name="bank_address" placeholder="Bank Address" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->bank_address) ? bankAccount($bank,'usa')->bank_address : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Postal Code</label>
                                                <input type="text" name="postal_code" placeholder="Postal Code" class="form-control custom-control" value="{{ isset(bankAccount($bank,'usa')->postal_code) ? bankAccount($bank,'usa')->postal_code : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Sharpline Distro password</label>
                                                <input type="password"  name="password"  placeholder="Sharpline Distro password" class="form-control custom-control" required>
                                            </div>
                                        </div>

                                        <div class="col-12 text-end">
                                            <button type="submit"
                                                class="btn btn-primary rounded">Execute</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-uk-bank" role="tabpanel"
                                aria-labelledby="nav-uk-bank-tab">
                                <form method="POST" action="{{ route('user.storeBank',['method' => 'uk']) }}" id="uk">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="tab-title mt-0 mb-lg-4 mb-3 ms-2">UK Bank Account</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label mb-0">Amount to be
                                                    Paid</label>
                                            </div>

                                            <div
                                                class="d-flex justify-content-between gap-3 align-items-center">
                                                <div class="mb-lg-4 mb-3">
                                                    <span class="currency-btn">
                                                        USD
                                                    </span>
                                                </div>
                                                <div class="mb-lg-4 mb-3 w-100">

                                                    <input name="amount" type="number" placeholder="0.00" class="form-control custom-control" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Name on Account</label>
                                                <input type="text" name="name" placeholder="Name on Account" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->name) ? bankAccount($bank,'uk')->name : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Address of Account Holder</label>
                                                <input type="text"  name="address" placeholder="Address of Account Holder" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->address) ? bankAccount($bank,'uk')->address : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Account Number</label>
                                                <input type="text" name="account_number" placeholder="Account Number" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->account_number) ? bankAccount($bank,'uk')->account_number : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Sort Code</label>
                                                <input type="text" name="sort_code" placeholder="Sort Code" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->sort_code) ? bankAccount($bank,'uk')->sort_code : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">IBAN</label>
                                                <input type="text" name="iban"  placeholder="IBAN" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->iban) ? bankAccount($bank,'uk')->iban : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Name</label>
                                                <input type="text" name="bank_name" placeholder="Bank Name" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->bank_name) ? bankAccount($bank,'uk')->bank_name : null }}" required>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Address</label>
                                                <input type="text" name="bank_address" placeholder="Bank Address" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->bank_address) ? bankAccount($bank,'uk')->bank_address : null }}" required >
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Postal Code</label>
                                                <input type="text" name="postal_code" placeholder="Postal Code" class="form-control custom-control" value="{{ isset(bankAccount($bank,'uk')->postal_code) ? bankAccount($bank,'uk')->postal_code : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Sharpline Distro password</label>
                                                <input type="password" name="password"  placeholder="Sharpline Distro password" class="form-control custom-control" required>
                                            </div>
                                        </div>

                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary rounded">Execute</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-euro-bank" role="tabpanel"
                                aria-labelledby="nav-euro-bank-tab">
                                <form method="POST" action="{{ route('user.storeBank',['method' => 'euro']) }}" id="euro">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="tab-title mt-0 mb-lg-4 mb-3 ms-2">Euro Bank Account</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label mb-0">Amount to be
                                                    Paid</label>
                                            </div>

                                            <div
                                                class="d-flex justify-content-between gap-3 align-items-center">
                                                <div class="mb-lg-4 mb-3">
                                                    <span class="currency-btn">
                                                        USD
                                                    </span>
                                                </div>
                                                <div class="mb-lg-4 mb-3 w-100">

                                                    <input name="amount" type="number" placeholder="0.00" class="form-control custom-control" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Name on Account</label>
                                                <input  name="name" type="text" placeholder="Name on Account" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->name) ? bankAccount($bank,'euro')->name : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Address of Account Holder</label>
                                                <input type="text" name="address"  placeholder="Address of Account Holder" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->address) ? bankAccount($bank,'euro')->address : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Account Number</label>
                                                <input type="text" name="account_number"   placeholder="Account Number" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->account_number) ? bankAccount($bank,'euro')->account_number : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">BIC</label>
                                                <input name="bic" type="text" placeholder="BIC" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->bic) ? bankAccount($bank,'euro')->bic : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">IBAN</label>
                                                <input name="iban" type="text" placeholder="IBAN" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->iban) ? bankAccount($bank,'euro')->iban : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Name</label>
                                                <input type="text" name="bank_name"  placeholder="Bank Name" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->bank_name) ? bankAccount($bank,'euro')->bank_name : null }}" required>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Bank Address</label>
                                                <input type="text" name="bank_address"  placeholder="Bank Address" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->bank_address) ? bankAccount($bank,'euro')->bank_address : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Postal Code</label>
                                                <input type="text" name="postal_code" placeholder="Postal Code" class="form-control custom-control" value="{{ isset(bankAccount($bank,'euro')->postal_code) ? bankAccount($bank,'euro')->postal_code : null }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-lg-4 mb-3">
                                                <label for="" class="form-label">Sharpline Distro password</label>
                                                <input type="password" name="password" placeholder="Sharpline Distro password" class="form-control custom-control" required>
                                            </div>
                                        </div>

                                        <div class="col-12 text-end">
                                            <button type="submit"
                                                class="btn btn-primary rounded">Execute</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
</div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#paypal").validate({
                rules: {
                    email: {
                        required: true,
                        minlength: 8
                    },
                    confirm_email: {
                        required: true,
                        equalTo: "#email"
                    }
                }
            });
            $("#usa").validate({});
            $("#uk").validate({});
            $("#euro").validate({});

        });
    </script>
@endpush
