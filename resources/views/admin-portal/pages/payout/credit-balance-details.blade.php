@extends('layouts.admin_scaffold')
@push('title')
    - Credit Balance Detail
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="d-flex  align-items-center">
                   <h4 class="card-title"><a href="{{route('admin.payout.addCredit')}}"><i class="mdi mdi-keyboard-return"></i></a>&nbsp; Credit Balance</h4>
                </div>


                <div class="table-responsive mt-4" >
                  <table class="table dataTables_wrapper dt-bootstrap4 no-footer"  id="example">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Full name </th>
                        <th> Email </th>
                        <th> Added  Balance ($)</th>
                        <th> Added Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($creditDetails as $index=>$item)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{isset($item->user) ? $item->user->name : '-'}}</td>
                                <td>{{isset($item->user) ? $item->user->email : '-'}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{getDateFormat($item->date)}}</td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection
