@extends('layouts.portal_revamp_scaffold')
@push('title') Dashboard @endpush
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
<style>
.apexcharts-canvas{
    color: black !important;
}
@media (max-width: 991px){
    .apexcharts-xaxis{
        display:none;
    }
}
</style>
@endpush
@push('button')
<div class="col-12 text-end mt-4">
    <a href="{{route('user.release.create')}}"><button class="btn btn-primary rounded">Create Release</button></a>
</div>
@endpush
@section('content')
@if(settings()->is_analytic_note == 1)
<div class="row">
    <div class="col-md-12 text-center">
       <span style="background:#FFF301; color:black; padding:5px; font-size:11px">Dashboard Upgrade Ongoing. Some Features Might Be Paused.</span>
    </div>
</div>
@endif
<div class="row px-lg-4 px-0 mt-3">
    <div class="col-12">
        <div class="card @if($analytics == false) p-3 @endif">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle bg-transparent"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(request('last_days')) {{request('last_days')}} @else Last 7 Days @endif
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;" onClick="lastdays('Last 7 Days')">Last 7 Days</a></li>
                                <li><a class="dropdown-item" href="javascript:;" onClick="lastdays('Last 15 Days')">Last 15 Days</a></li>
                                <li><a class="dropdown-item" href="javascript:;" onClick="lastdays('Last 45 Days')">Last 45 Days</a></li>
                                <li><a class="dropdown-item" href="javascript:;" onClick="lastdays('Last 60 Days')">Last 60 Days</a></li>
                            </ul>
                        </div>
                    </div>
                    <div style="float:right">
                    Total Streams : {{number_format($streamAnalyticsCount)}}
                    </div>

                    <div class="d-none">
                        <div class="dropdown">
                            <button class="btn btn-secondary bg-transparent border-0" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Last 15 Days</a></li>
                                <li><a class="dropdown-item" href="#">Last 45 Days</a></li>
                                <li><a class="dropdown-item" href="#">Last 60 Days</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if($analytics == true)
                <div id="dash_chart"></div>
                @else
                <center><span style="background:#FFF301; color:black; padding:5px; font-size:11px">Song Analytics Unavailable for {{ request('last_days') ? request('last_days') : 'Last 7 Days' }}.</span></center>
                @endif


            </div>
        </div>
    </div>

</div>

<div class="row px-lg-4 px-0 mt-4">
    <div class="col-12">
        <h2 class="section-heading">Top Performing DSPs</h2>
    </div>
</div>

<section class="streames">
    <div class="row px-lg-4 px-0 mt-3">
        <div class="streams">
            @include('user-portal.pages.revamp.components.dashboard-number')
        </div>
    </div>
    <div class="row px-lg-4 px-0">
        <div class="col-12 text-end mt-4">
            <a href="{{route('user.top','streams-by-number')}}"><button type="button" class="btn btn-primary rounded">View More</button></a>
        </div>
    </div>

    <div class="row px-lg-4 px-0 mt-4">
        <div class="col-12">
            <h2 class="section-heading">Top Performing Countries</h2>
        </div>
    </div>

    <div class="row px-lg-4 px-0 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0">
                    <div class="card-header text-end bg-transparent border-0 py-0 d-none">
                        <div class="dropdown mb-n4 d-lg-block d-none">
                            <button class="btn btn-secondary bg-transparent border-0" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Last 15 Days</a></li>
                                <li><a class="dropdown-item" href="#">Last 45 Days</a></li>
                                <li><a class="dropdown-item" href="#">Last 60 Days</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <table class="table px-4 mb-0 home-table">
                            <tr>
                                <th class="ps-4">Streams By Country</th>
                                <th class="pe-4 text-center">Streams By Count</th>
                            </tr>
                            @php $count = 1;  @endphp
                            @forelse(countriesTotals() as $key=>$value)
                            @if($count <= 6)
                            <tr>
                                <td class="ps-4 py-3">
                                    <img src="https://flagcdn.com/w80/{{countryCode($key)}}.png" width="25" class="me-2" alt="">
                                    <span>{{$key}}</span>
                                </td>
                                <td class="pe-4 py-3 text-center">
                                    {{$value}}
                                </td>
                            </tr>
                            @endif
                            @php $count++; @endphp
                            @empty
                            <tr>
                                <td colspan="2" class="text-center">
                                    <br>
                                    <center><span style="background:#FFF301; color:black; padding:1px">No record found</span></center>
                                    <br>
                                </td>
                            </tr>
                            @endforelse

                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="row px-lg-4 px-0">
        <div class="col-12 text-end mt-4">
            <a href="{{route('user.top','streams-by-country')}}"><button type="button" class="btn btn-primary rounded">View More</button></a>
        </div>
    </div>

</section>

<div class="row px-lg-4 px-0 mt-4">
    <div class="col-12">
        <h2 class="section-heading">Revenue Analytics</h2>
    </div>
</div>

<section class="revenue">
    <div class="row px-lg-4 px-0 mt-3">
        <div class="streams">
            @include('user-portal.pages.revamp.components.dashboard-revenue')
        </div>
    </div>
    <div class="row px-lg-4 px-0">
        <div class="col-12 text-end mt-4">
            <a href="{{route('user.top','streams-by-revenue')}}"><button type="button" class="btn btn-primary rounded">View More</button></a>
        </div>
    </div>

</section>

<div class="row px-lg-4 px-0 mt-4">
    <div class="col-12">
        <h2 class="section-heading">Top Performing Releases</h2>
    </div>
</div>

<section class="performing">
    <div class="row px-lg-4 px-0 mt-3">
        <div class="streams">
            @php $count  = 1;  @endphp
            @forelse (releaseStreamsTotals(auth()->user()->id) as $key=>$value)
            @if($count <= 4)
                @php $r = releaseById($key); @endphp
                <div class="card stream-card">
                    <div class="card-body py-5">
                        <img src="{{asset(config('upload_path.album_artwork').$r->album_artwork)}}" width="74" height="74" alt=""
                            class="d-block">
                        <h4 class="mt-4 mb-1">{{isset($r) ? $r->album_title : '-'}}</h4>
                        <span class="d-block">{{isset($r->user) ? $r->user->name : '-'}}</span>
                        <p class="mt-4">{{$value}} Streams</p>
                    </div>
                </div>
                @endif
            @php $count++; @endphp
            @empty
                <center><span style="background:#FFF301; color:black; padding:5px">No record found</span></center>

            @endforelse

        </div>

    </div>
</section>

<div class="row px-lg-4 px-0">
    <div class="col-12 text-end mt-4">
        <a href="{{route('user.top','top-performing-releases')}}"><button type="button" class="btn btn-primary rounded">View More</button></a>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    $(document).ready(function () {

        setTimeout(() => {
            var options = {
                colors: ['#fbda03'],
                series: [{
                    name: 'Streams',
                    data: @if(!empty($graphDataCounts))  <?php echo $graphDataCounts; ?> @else   '[]' @endif
                }],
                chart: {
                    height: 350,
                    width: '100%',
                    type: 'area',
                    foreColor: 'white',
                    toolbar: {
                        show: false
                    }
                },
                grid: {
                    borderColor: '#303030',
                    //   strokeDashArray: 7,
                    show: false, // you can either change hear to disable all grids
                    xaxis: {
                        lines: {
                            show: true //or just here to disable only x axis grids
                        }
                    },
                    yaxis: {
                        lines: {
                            show: false //or just here to disable only y axis
                        }
                    },
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.8,
                        gradientToColors: 'transparent',
                        opacityFrom: 0.6,
                        opacityTo: 0.2,
                        stops: [0, 90, 100]
                    }
                },
                stroke: {
                    curve: 'smooth',
                     width: 2,
                },
                xaxis: {
                    type: 'date',
                    categories: @if(!empty($graphDataDates))  <?php echo $graphDataDates; ?> @else   '[]' @endif,
                    crosshairs: {
                      show: false
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            var val = Math.abs(value)
                            if (val >= 1000) {
                                val = (val / 1000).toFixed(0) + ' K'
                            }
                            return val
                        }
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#dash_chart"), options);
            chart.render();
        }, 200);

        $('.streams').slick({
            dots: false,
            infinite: false,
            // centerMode: true,
            // // centerPadding: '50px',
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3.2,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2.2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1.2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

    });

    function lastdays(value){
        var url = "{{route('user.dashboard')}}";
        window.location.href = url+'?last_days='+value;
    }
</script>
@endpush
