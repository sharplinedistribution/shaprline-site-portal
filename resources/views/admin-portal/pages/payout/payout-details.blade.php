@extends('layouts.admin_scaffold')
@push('title')
    - User Payout Details
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2"><a href="{{route('admin.payout.requests')}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; {{ isset($payout->user->name)? $payout->user->name : null }}</h4>
                        <hr class="hr-releases mb-2">
                        <p class="mb-2">Full Name  - {{isset($payout->user) ? $payout->user->name : '-'}}</p>
                        <p class="mb-2">Email  - {{isset($payout->user) ? $payout->user->email : '-'}}</p>
                        <p class="mb-2">Request for Amount  - ${{number_format($payout->amount)}}</p>
                        <hr class="hr-releases mt-2 mb-2">
                        <h4 class="card-title mt-4"><span style="color: #fbda03;">{{ strtoupper($payout->method) }} ACCOUNT</span></h4>
                        <hr class="hr-releases mt-2 mb-2">
                        @include('admin-portal.pages.payout.'.$payout->method,['bank' => $bank,'method' => $payout->method])
                        <div>
                            @if($payout->status == 1)
                                <button type="button" class="btn btn-primary" disabled>Completed</button><br>
                                Completed - {{getDateFormat("$payout->approved_at")}}
                            @else
                                <button type="button" class="btn btn-success" onClick="completePayout({{$payout->id}})">Complete</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function completePayout(id){
            var conf = confirm('Are you sure?');
            if(conf == true){
                $.ajax({
                    type : "POST",
                    url  : "{{route('admin.payout.completePayout')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id'     : id,
                    },
                    beforeSend : function(res){
                        $(".loader").show();
                    },
                    success : function(res){
                        $(".loader").hide();
                        if(res.success == true){
                            notify('Amount Debited','success');
                            location.reload();
                        }
                        else{
                            notify('Something Went Wrong','danger');
                        }
                    },
                    error : function(res){
                        $(".loader").hide();
                        notify('Something Went Wrong','danger');
                    }
                });
            }
        }
    </script>
@endpush
