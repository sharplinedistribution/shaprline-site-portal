@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2">
                        {{isset($show) && !empty($show->first_name) ? $show->first_name : ''}}
                        {{isset($show) && !empty($show->last_name) ? $show->last_name : ''}}
                    </h4>
                    <hr class="hr-releases mb-2">
                    <p class="mb-2">Username - {{isset($show) && !empty($show->name) ? $show->name : '-'}}</p>
                    <p class="mb-2">Email - {{isset($show) && !empty($show->email) ? $show->email : '-'}}</p>
                    <!-- <p class="mb-2">Password -  {{isset($show) && !empty($show->name) ? $show->name : '-'}}</p> -->
                    <p class="mb-2">Subscription - {{isset($subscribtion) && !empty($subscribtion->package) ? $subscribtion->package : '-'}} (Expire date - {{isset($subscribtion) && !empty($subscribtion->expiry_at) ? getDateFormat($subscribtion->expiry_at) : '-'}})</p>
                    <p class="mb-2">Credit balance - ${{ currentStatus($show->id) }}</p>
                    <p class="mb-2">Request for Marketing - {{isset($show) && !empty($show->campaigns) ? $show->campaigns->count()  : ''}}</p>
                    <p class="mb-2">Support - {{isset($show) && !empty($show->supports) ? $show->supports->count()  : ''}} </p>
                    <hr class="hr-releases mt-2 mb-2">
                    <div class="row">
                        @if(isset($show->releases) && !empty($show->releases) && $show->releases->count()>0)
                        @foreach($show->releases as $index=>$item)
                        <div class="col-lg-4">
                            <div class="card card-product bg-dark" style="width: 18rem;" onclick="window.location.href='{{route('user.release.show', $item->id)}}'">
                                <img src="{{asset(config('upload_path.album_artwork').$item->album_artwork)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <strong style="color:#fbda03;">{{strtoupper($item->album_title)}}</strong>
                                    <p class="card-text">{{getFirstArtist($item->artist)}}</p>
                                    @if($item->status == 1)
                                    <p class="mb-0 text-success">Accepted - {{getDateFormat($item->approved_at)}}</p>
                                    @elseif($item->status == 2)
                                    <p class="mb-0 text-danger">Rejected - {{getDateFormat($item->approved_at)}}</p>
                                    @else
                                    <p class="mb-0 text-info">Pending</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statement</h4>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Statement </th>
                                    <th> Released Date</th>
                                    <th> Royalty Collection</th>
                                    <th>Download Statement (Zip)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($show->statements) && !empty($show->statements) && $show->statements->count()>0)
                                @foreach($show->statements as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> {{date('M Y' , strtotime($value->statement_month))}}</td>
                                    <td> {{getDateFormat($value->release_date)}}</td>
                                    <td> {{getDateFormat($value->collection_start_date)}} - {{getDateFormat($value->collection_end_date)}}</td>
                                    <td>
                                        @if(!empty($value->csv))
                                        <a href="{{asset(config('upload_path.csv') . $value->csv)}}">
                                            <i class="mdi mdi-arrow-down"></i> CSV
                                        </a> &nbsp;
                                        @endif

                                        @if(!empty($value->pdf))
                                        <a href="{{asset(config('upload_path.pdf') . $value->pdf)}}">
                                            <i class="mdi mdi-arrow-down"></i> PDF
                                        </a>
                                        @endif

                                    </td>

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
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Credit History</h4>
                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Amount($)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($show->credits) && !empty($show->credits) && $show->credits->count()>0)
                                @foreach($show->credits as $index=>$value)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>{{getDateFormat($value->date)}}</td>
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
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subscription History</h4>

                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Amount($)</th>
                                    <th>Subscrbtion Date</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($show->transactions) && !empty($show->transactions) && $show->transactions->count()>0)
                                @foreach($show->transactions as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td> ${{!empty($value->amount) ? $value->amount : 0}} - For {{isset($value->package) && !empty($value->package) ? $value->package : '-'}}</td>
                                    <td>{{getDateFormat($value->created_at)}}</td>
                                    <td>{{getDateFormat($value->expiry_at)}}</td>
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
</div>
@endsection