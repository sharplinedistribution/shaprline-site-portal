@extends('layouts.user_scaffold')
@push('title')
 - {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="container-fluid d-flex align-items-center p-2">
      <h1 class="h1 mb-5 mt-2">Payout</h1>
    </div>
  </div>
  <div class="row d-flex">
    <div class="col-lg-4 grid-margin stretch-card rounded d-flex flex-column justify-content-center align-items-center text-center" style="border: 1px  solid#fbda03;">
      <div class="card-credit pt-5 pb-5">
        <h2 class="h2">
          <span>Credit Balance</span> <br>
          <span>${{currentStatus(auth()->user()->id)}}</span>
        </h2>

      </div>
    </div>
    @if(!isset($bank) && empty($bank) && empty($bank->id))
    <div class="mt-5  mb-5 col-lg-6 ">
      <h2 style="color:yellow;" class="mb-4">Add bank account to withdraw</h2>
      <a href="{{route('user.banks.create')}}" class="btn btn-lg btn-dark" style="background-color:#fbda03; color: #333;;">Add New Bank</a>
    </div>
    @endif
  </div>
  @if(isset($bank) && !empty($bank) && !empty($bank->id))
  <div class="row ">
    <div class="col-12 col-md-6 col-lg-4 grid-margin">
      <div class="card">

        <div class="card-body">
          <h4 class="card-title"><span style="color: #fbda03;">Account</span> Information</h4>
          <p class="mb-2">Account holder - {{isset($bank) && !empty($bank->account_holder) ? $bank->account_holder : '-'}} </p>
          <p class="mb-2">Street and nr. - {{isset($bank) && !empty($bank->street) ? $bank->street : '-'}}</p>
          {{-- <p class="mb-2"> ZIP code - {{isset($bank) && !empty($bank->zip_code) ? $bank->zip_code : '-'}}</p> --}}
          {{-- <p class="mb-2">Location - {{isset($bank) && !empty($bank->location) ? $bank->location : '-'}} </p> --}}
          <p class="mb-2"> Country - {{isset($bank) && !empty($bank->country) ? $bank->country : '-'}}</p>
          <p class="mb-2">Account Number - {{isset($bank) && !empty($bank->account_number) ? $bank->account_number : '-'}} </p>
          <p class="mb-2">Routing Number - {{isset($bank) && !empty($bank->routing_number) ? $bank->routing_number : '-'}} </p>
          {{-- <p class="mb-2">SWIFT-Code / BIC - {{isset($bank) && !empty($bank->switf_code) ? $bank->switf_code : '-'}} </p> --}}
          <p class="mb-2">IBAN - {{isset($bank) && !empty($bank->iban) ? $bank->iban : '-'}} </p>
          <hr class="hr-releases mt-2 mb-2">
          <h4 class="card-title mt-4"><span style="color: #fbda03;">Bank </span> Information</h4>
          <p class="mb-2">Bank name - {{isset($bank) && !empty($bank->bank_name) ? $bank->bank_name : '-'}} </p>
          {{-- <p class="mb-2"> Street and nr. - {{isset($bank) && !empty($bank->bank_street) ? $bank->bank_street : '-'}}</p> --}}
          {{-- <p class="mb-2"> Zip code - {{isset($bank) && !empty($bank->bank_zip_code) ? $bank->bank_zip_code : '-'}}</p> --}}
          {{-- <p class="mb-2">Location - {{isset($bank) && !empty($bank->bank_location) ? $bank->bank_location : '-'}} </p> --}}
          <p class="mb-2">
            <hr class="hr-releases mt-2 mb-2">
          <div>
            <button type="button" class="btn btn-success payoutbalance" @if(!empty($bank->id)) data-id="{{$bank->id}}" @endif>Payout Request</button> &nbsp;
            <a type="button" class="btn btn-info  " href="{{route('user.banks.edit', $bank->id)}}">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Statement</h4>

          <div class="table-responsive">
            <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="table">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Request Date </th>
                  <th> Amount($)</th>
                  <th> Bank Name</th>
                  <th>Account Number</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($statement as $index=>$item)
                <tr>
                  <td>{{++$index}} </td>
                  <td>{{getDateFormat($item->date)}}</td>
                  <td>{{number_format($item->amount)}}</td>
                  <td>{{isset($item->bank) ? $item->bank->bank_name : -''}}</td>
                  <td>{{isset($item->bank) ? $item->bank->account_number : -''}}</td>
                  <td class=" align-items-center">
                    {!! status($item->status) !!}
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

</div>

<div class="modal fade " id="payoutbalance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-modal="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"> Request Amount</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="hidden" id="payout_id">
            <label for="recipient-name" class="col-form-label">Add Amount ($):</label>
            <input type="text" class="form-control text-white" id="amount" name="amount">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onClick="storePayoutRequest($(this))">Submit</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

  $('.payoutbalance').click(function() {
    $("#payoutbalance").modal('show');
    var id = $(this).attr('data-id');
    $("#payout_id").val(id);

  });

  function storePayoutRequest(elm) {
    var id = $("#payout_id").val();
    var amount = $("#amount").val();
    var totalCreditAmount = "{{currentStatus(auth()->user()->id)}}";
    if (amount == "") {
      notify('Amount is required', 'danger');
    }

    if (amount <= parseInt(totalCreditAmount)) {
      if (amount != "") {
        $.ajax({
          type: "POST",
          url: "{{route('user.payout.request')}}",
          data: {
            "_token": "{{csrf_token()}}",
            'id': id,
            'amount': amount,
          },
          beforeSend: function(res) {
            $('.loader').show();
          },
          success: function(res) {
            if (res.success == true) {
              $('.loader').hide();
              notify('Request Sent to Admin', 'success');
              setTimeout(function() {
                location.reload(true);
              }, 1000);
            } else {
              notify('Something Went Wrong', 'danger');
            }

          },
          error: function(res) {
            $('.loader').hide();
            notify('Something Went Wrong', 'danger');

          }
        });
      }
    } else {
      notify(amount + ' is exceeding your total Credit', 'danger');
    }
  }
</script>
@endpush
