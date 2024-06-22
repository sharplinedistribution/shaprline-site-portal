@extends('layouts.user_scaffold')
@push('title')
- Dashboard
@endpush
@section('content')
<script>
   var labels = [];
   var dataset = [];
   // var weight = [];
</script>
<div class="content-wrapper">
   <div class="row">
      <div class="container-fluid d-flex align-items-center p-2">
         <div class="row mb-4 w-100">
            <div class="col-md-6">
               <h1 class="h1  mt-2">Welcome, <span class="user" style="color: #fbda03;">{{auth()->user()->name}}</span></h1>
               @if(auth()->user()->is_subscribed != 1){!! trialExpiry() !!} @else {!! subscriptionExpiry() !!} @endif
            </div>
            <div class="col-md-6 text-left text-md-right">
               <a href="{{route('user.release.create')}}" class="btn btn-lg text-dark" style="background-color:#fbda03;">Create
                  Release</a>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Stream Analytics</h4>

               @if($analytics == true)
               <div id="chart_div" style="width: 100%; height: 500px;"></div>
               @else
               <center><span style="background:#FBDA03; color:black; padding:5px">Song Analytics Unavailable Because This Is A New Account</span></center>
               @endif

            </div>
         </div>
      </div>
      <!-- Music Plateforms -->
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Platforms</h4>
               <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
               </p>
               <div class="table-responsive">
                  <table class="table table-striped" width="100%" id="topPlatforms">
                     <thead>
                        <tr>
                           <th  width="50%"> PLATFORMS </th>
                           <th width="50%" class="text-center"> STREAMS </th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse(platformsTotals() as $key=>$value)
                           <tr>
                              <td class="py-1">
                                    <span>{{isset($key) ? $key : '-' }}</span>
                              </td>
                              <td class="text-center"> {{isset($value) ? $value : '-'}} </td>


                           </tr>
                        @empty
                           <tr>
                              <td colspan="4" class="text-center">No Record Found</td>
                           </tr>
                        @endforelse

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row mt-3">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Stream By Country</h4>
               <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table class="table striped" width="100%" id="topCountries">
                            <thead>
                                <tr>
                                    <th width="50%">Countries</th>
                                <th width="50%" class="text-center">STREAMS</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if(!empty(topCountries(auth()->user()->id)))
                                    @forelse (topCountries(auth()->user()->id) as $item)
                                        <tr>
                                        <td >
                                            <i class="{{ $item->flag }}"></i>&nbsp;&nbsp;{{ $item->code }}
                                        </td>
                                        <td class="text-center"> {{ countriesTotalStreams($item->id) }} </td>
                                        </tr>

                                    @empty

                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No record found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row mt-5">
    <div class="col-12">
       <div class="card">
          <div class="card-body">
             <h4 class="card-title">Top Stores By Revenue</h4>
             <div class="row">
                <div class="col-md-12">
                   <div class="table-responsive">
                    <table class="table table-striped" width="100%" id="topStores">
                        <thead>
                            <tr>
                                <th width="50%">STORES</th>
                                <th width="50%" class="text-center">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty(topStores(auth()->user()->id)))
                                @forelse (topStores(auth()->user()->id) as $value)
                                    <tr>
                                        <td class="py-1">{{isset($value->name) && !empty($value->name) ? $value->name : '-'}}</td>
                                        <td class="text-center"> ${{ StoresTotalAmount($value->id) }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            @else
                            <tr>
                                <td colspan="3" class="text-center">No record found</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
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
<script src="{{asset('portal/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('portal/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('portal/assets/js/misc.js')}}"></script>
<script src="{{asset('portal/assets/js/settings.js')}}"></script>
<script src="{{asset('portal/assets/js/todolist.js')}}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('portal/assets/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('portal/assets/js/chart.js')}}"></script>
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>


<script type="">
   $(document).ready(function () {
    $('#topPlatforms').DataTable({
      paging: false,
      info: false,
      searching: false,
      "order": [[ 1, "desc" ]],

    });

    $('#topCountries').DataTable({
      paging: false,
      info: false,
      searching: false,
      "order": [[ 1, "desc" ]],
    });


    $('#topStores').DataTable({
      paging: false,
      info: false,
      searching: false,
      "order": [[ 1, "desc" ]],
    });


    });

 </script>


<script type="text/javascript">

      var visitor = <?php echo $chart; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable(visitor);;

        var options = {
          title: 'Stream Analytics',
          hAxis: {title: 'Dates', titleTextStyle: {color: '#000'}},
          colors: ['#000'],
          backgroundColor: '#FBDA03',
          legendTextStyle: { color: '#000' },
          titleTextStyle: { color: '#000' },
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>
<script type="">
   const colors = {
    purple: {
    default: "rgba(149, 76, 233, 1)",
    half: "rgba(149, 76, 233, 0.5)",
    quarter: "rgba(149, 76, 233, 0.25)",
    zero: "rgba(149, 76, 233, 0)"
    },
    indigo: {
    default: "rgba(80, 102, 120, 1)",
    quarter: "rgba(80, 102, 120, 0.25)"
    }
    };

    const weight = [600, 1000, 100, 300];

   //  const labels = [
   //  "1 July",
   //  "7 July",
   //  "14 July",
   //  "21 July",

   //  ];

    const ctx = document.getElementById("canvas").getContext("2d");
    ctx.canvas.height =133;

    gradient = ctx.createLinearGradient(0, 25, 0, 300);
    gradient.addColorStop(0, colors.purple.half);
    gradient.addColorStop(0.35, colors.purple.quarter);
    gradient.addColorStop(1, colors.purple.zero);

    const options = {
    type: "line",
    data: {
    labels: labels,
    datasets: [
      {
        fill: true,
        backgroundColor: gradient,
        pointBackgroundColor: colors.purple.default,
        borderColor: colors.purple.default,
        data: weight,
        lineTension: 0.2,
        borderWidth: 2,
        pointRadius: 3
      }
    ]
    },
    options: {
    layout: {
      padding: 10
    },
    responsive: true,
    legend: {
      display: false
    },

    scales: {
      xAxes: [
        {
          gridLines: {
            display: false
          },
          ticks: {
            padding: 10,
            autoSkip: false,
            maxRotation: 15,
            minRotation: 15,
            maxTicksLimit: 5
          },
    gridLines: {
    display: false,
    }
        }
      ],
      yAxes: [
        {
          scaleLabel: {
            display: true,
            labelString: "",
            padding: 10
          },
          gridLines: {
            display: true,
            color: colors.indigo.quarter
          },
          ticks: {
            beginAtZero: false,
            max: 1000,
            min: 0,
            padding: 10,
            maxTicksLimit: 6
          },
    gridLines: {
    display: false,
    }
        }
      ]
    }
    }
    };

    window.onload = function () {
    window.myLine = new Chart(ctx, options);
    Chart.defaults.global.defaultFontColor = colors.indigo.default;
    Chart.defaults.global.defaultFontFamily = "Fira Sans";
    };

 </script>
@endpush
