@extends('layouts.revamp_scaffold')
@push('title')
    Contact Us
@endpush
@push('styles')
<style>
.form-control {
    background: #353535;
    border: 0;
    height: 44px;
    font-weight: 300;
    border-radius: 4px;
    color: #fff;
}

.btn-primary {
    font-size: 15px;
    font-weight: 600;
    font-family: 'Poppins';
    padding: 12px 40px;
    text-align: center;
    border-radius: 5px;
}
.auth-form .btn-primary {
    border-radius: 0 !important;
}

</style>
@endpush
@section('content')
<section class="faqs-main-headign">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12">
                <div class="our-work">
                    <h1 class="font-oswald text-color-primary mb-5 text-center">Get In Touch</h1>

                    <p class=" text-white  mb-3 text-center">For General Inquiries and Support. We will respond within 24 Hours.</p>
                </div>
            </div>
        </div>
        <form action="{{ route('contactUs') }}" method="POST">
            @csrf
            <div class="auth-form row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <input class="form-control custom-control" id="name" placeholder="Name" required="" maxlength="100" name="name" type="text" aria-required="true" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <input class="form-control custom-control" id="email" placeholder="Email" required="" maxlength="100" name="email" type="text" aria-required="true" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-4">
                        <input class="form-control custom-control" id="subject" placeholder="Subject" required="" maxlength="100" name="subject" type="text" aria-required="true" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-4">
                        <textarea name="message" id="message" cols="50" rows="10" class="form-control custom-control" placeholder="Message" style="height: 250px;" required></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary" style="float:right">SUBMIT INQUIRY</button>
                </div>
            </div>
        </form>

    </div>
</section>

<section class="contact-grid pt-0">
    <div class="container custom-container">
        <div class="row">
            <div class="col-xl-11 mx-auto">
                <div class="row text-center">
                    <div class="col-md-4 mb-md-0 mb-4">
                        <div class="addresses">
                            <svg class="svg-inline--fa fa-map-marker-alt fa-w-12 fa-2x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>

                            <h3 class="text-white font-oswald mt-2">Office Address</h3>
                            <p>128 City Road, London, United Kingdom,
                                EC1V 2NX</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-md-0 mb-4">
                        <div class="addresses">
                            <svg class="svg-inline--fa fa-envelope fa-w-16 fa-2x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>

                            <h3 class="text-white font-oswald mt-2">Customer Service</h3>
                            <p>Customer Service
                                <br>
                                <a href="mailto:support@sharplinedistribution.com">support@sharplinedistribution.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-md-0 mb-4">
                        <div class="addresses">
                            <svg class="svg-inline--fa fa-phone fa-w-16 fa-2x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>

                            <h3 class="text-white font-oswald mt-2">Business Inquiries</h3>
                            <p>Business Inquiries
                                <br>
                                <a href="mailto:business@sharplinedistribution.com">business@sharplinedistribution.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="addresses">
                            <svg class="svg-inline--fa fa-clock fa-w-16 fa-2x" aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>

                            <h3 class="text-white font-oswald mt-2">Customer service hours</h3>
                            <p>Monday-Friday 9:00am to 5:00pm (GMT)
                                <br>
                                We will aim to respond to you within one business day.
                                <br>
                                <small>(Note: If there is a public holiday, there might be a delay.)</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
