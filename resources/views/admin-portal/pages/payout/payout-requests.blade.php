@extends('layouts.admin_scaffold')
@push('title')
    - Payout Reqeusts
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Payout Request</h4>

                <div class="table-responsive" >
                  <table class="table dataTables_wrapper dt-bootstrap4 no-footer"  id="example">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Full name </th>
                        <th> Email </th>
                        <th> Request Amount ($) </th>
                        <th> Request Date </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($requests as $index=>$item)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{isset($item->user) ? $item->user->name : '-'}}</td>
                            <td>{{isset($item->user) ? $item->user->email : '-'}}</td>
                            <td>{{number_format($item->amount)}}</td>
                            <td>{{getDateFormat($item->date)}}</td>
                            <td class=" align-items-center">
                               <a href="{{route('admin.payout.payoutDetails', $item->id)}}"> <button class="btn btn-outline-primary"  >View</button></a>&nbsp;&nbsp; {!! status($item->status) !!}
                            </td>
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
@push('scripts')
    <script>
        $(document).ready(function () { $('#example').DataTable(); });
    </script>
@endpush
