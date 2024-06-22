@extends('layouts.admin_scaffold')
@push('title')
- Add Credit
@endpush
@section('content')
<div class="content-wrapper">
  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title">Add Credit Balance</h4>
            <a href="{{route('admin.payout.creditDetail')}}" class="btn btn-lg btn-dark" style="background-color:#fbda03; color: #333;;">History</a>
          </div>


          <div class="table-responsive mt-4">
            <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="table">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Full name </th>
                  <th> Email </th>
                  <th> Last Added Balance ($)</th>
                  <th> Last Added Date</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $index=>$item)
                <tr>
                  <td>{{++$index}}</td>
                  <td>{{isset($item->name) && !empty($item->name) ? $item->name : '-'}}</td>
                  <td>{{isset($item->email) && !empty($item->email) ? $item->email : '-'}}</td>
                  <td @if(!empty($item->id)) id="last_balance_{{$item->id}}" @endif> @if(!empty(getLastCredit($item->id))) {{getLastCredit($item->id)->amount ? getLastCredit($item->id)->amount : 0}} @endif</td>
                  <td @if(!empty($item->id)) id="last_date_{{$item->id}}" @endif> @if(!empty(getLastCredit($item->id))) {{getLastCredit($item->id) ? getDateFormat(getLastCredit($item->id)->date) : '-'}} @endif</td>
                  <td>
                    <button class="btn btn-lg btn-info" @if(!empty($item->id)) onClick="addCredit({{$item->id}},'{{$item->name}}')" @endif>Add</button>
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

<div class="modal fade " id="addcreditbalance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-modal="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"> Niral Malani</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id">
        <input type="hidden" id="name">
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Add Amount ($):</label>
          <input type="number" class="form-control text-white" id="amount" required name="amount">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onClick="storeCredit($(this))">Submit</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });

  function addCredit(id, name) {
    $("#id").val(id);
    $("#name").val(name);
    $("#ModalLabel").html(name);
    $("#addcreditbalance").modal('show');
  }

  function storeCredit() {
    var id = $("#id").val();
    var name = $("#name").val();
    var amount = $("#amount").val();

    if (amount == "") {
      notify('Please add Credit Amount', 'danger');
    }

    if (amount != "") {
      $.ajax({
        type: "POST",
        url: "{{route('admin.payout.storeCredit')}}",
        data: {
          '_token': "{{csrf_token()}}",
          'id': id,
          'amount': amount,
        },
        beforeSend: function(res) {
          $('.loader').show();
        },
        success: function(res) {
          $('.loader').hide();
          if (res.success == true) {
            $("#addcreditbalance").modal('hide');
            $("#last_balance_" + id).html(amount);
            $("#last_date_" + id).html("{{getDateFormat(date('Y-m-d'))}}");
            notify(res.msg, 'success');
          } else if (res.success == false) {
            notify(res.msg, 'danger');
          }
        },
        error: function(res) {
          $('.loader').hide();
          notify('Something Went Wrong', 'success');

        }
      });
    }
  }
</script>
@endpush