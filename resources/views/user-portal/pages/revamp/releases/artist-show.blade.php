@extends('layouts.portal_revamp_scaffold')
@push('title')
    My Releases -
@endpush
@push('styles')
    <!-- Event snippet for Page conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-10979779748/amflCMDZ_8EZEKTJyPMo'
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
@endpush
@section('content')
    <style>
        .blur-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            filter: blur(5px);
            background-size: cover;
            background-position: center;
        }

        .card {
            z-index: 1;
        }
    </style>
    <script>
        var labels = [];
        var dataset = [];
    </script>
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid align-items-center p-2">
                <div class="row mb-4 w-100">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-12" style="position: relative; overflow: hidden; max-width: 500px;">
                            <div class="blur-background"
                                style="background-image: url('{{ asset('uploads/album_artwork/' . $release_data->album_artwork) }}');">
                            </div>
                            <div class="card"
                                style="position: relative; z-index: 1; background: none; border-radius: 15px; padding: 20px;">
                                <div class="grid grid-span-1">
                                    <div class="text-center mt-5">
                                        <h5 style="margin-bottom: 0; color: white;">Release Delivery in Progress</h5>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/album_artwork/' . $release_data->album_artwork) }}"
                                            alt="Album Artwork"
                                            style="width: 150px;
                                                   height: 150px;
                                                   border-radius: 20%;
                                                   margin: auto;
                                                   display: block;">
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <!-- inject:js -->
    <script src="{{ asset('portal/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('portal/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('portal/assets/js/misc.js') }}"></script>
    <script src="{{ asset('portal/assets/js/settings.js') }}"></script>
    <script src="{{ asset('portal/assets/js/todolist.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('portal/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Adding Charst to sharplinedistro -->
    <script src="{{ asset('portal/assets/js/chart.js') }}"></script>
    <script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>
@endpush
