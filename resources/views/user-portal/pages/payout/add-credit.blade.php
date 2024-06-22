@extends('layouts.user_scaffold')
@push('title')
- Add Credit
@endpush
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="container-fluid d-flex align-items-center p-2">
      <h1 class="h1  mt-2">Credit Balance</h1>
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-4 grid-margin stretch-card rounded d-flex flex-column justify-content-center align-items-center text-center" style="border: 1px  solid#fbda03;">
      <div class="card-credit pt-5 pb-5">
        <h2 class="h2">
          <span>Credit Balance</span> <br>
          <span>${{ currentStatus(auth()->user()->id) }}</span>
        </h2>
        <div class="payout mt-3">
          <a href="{{route('user.banks.create')}}" class="btn btn-block btn-lg btn-dark" style="background-color:#fbda03; color: #333;;">
            PAY OUT</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">History</h4>
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
                @forelse ($credit as $index=>$item)
                <tr>
                  <td>{{++$index}}</td>
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
</div>
@endsection
@push('scripts')
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>
    
@endpush
