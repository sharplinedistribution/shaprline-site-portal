@extends('layouts.portal_revamp_scaffold')
@push('title')
    Referral Program -
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<style>


input[type=text] {
  border: 0;
  background-color: transparent;
  color: #fff;
  font-size: .9em;
  padding: 0.4em;
  width: 80%;
}

input[type=submit] {
  background-color: #FBDA03;
  border: 0;
  border-radius: 4px;
  color: black;
  float: right;
  padding: 0.5em;
  text-transform: uppercase;
}

.copy-link-container {
  width: 100%;
}

.copy-link-container:not(:first-of-type) {
  margin-top: 1em;
}

.copy-link {
  background-color: #0C0B0B;
  border-radius: 0 0 6px 6px;
  color: #fff;
  padding: .8em;
  overflow: hidden;
}

.copy-link-icon {
  position: relative;
  left: 15px;
  top: 11px;
}

.copy-link-inner {
  background-color: #151515;
  border: 0;
  border-radius: 5px;
  padding: 0.5em;
  float: right;
  width: 100%;
}

.copy-header {
  background-color: #151515;
  border-radius: 6px 6px 0 0;
  height: 30px;
}
</style>
@endpush
@section('content')
<div  class="row px-lg-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body px-0">

                <div class="col-12 px-3">
                    <h2 class="page-title">Sharpline Distro Referral Program</h2>
                    <p class="tab-title   mt-3">Invite other musicians and earn Money on your Credit Balance for FREE!</p>
                    <p >Share your unique link with other musicians you know. You'll get paid every time one of them signs up to a paid account.</p>


                    <div class="copy-link-container">
                        <div class="copy-link">
                          <div class="copy-link-inner">
                            <form data-copy=true>
                              <input type="text" value="{{ route('register',['memref' => 'r'.(auth()->user()->id + 10000)]) }}" data-click-select-all />
                              <input type="submit" value="Copy" />
                            </form>
                          </div>
                        </div>
                    </div>

                    <p class="tab-title   mt-3">HOW IT WORKS</p>
                    <p>For each one of your friends who signs up to Sharpline Distro using your unique sharing link and upgrades to a paid account, you earn a bonus to your credit balance depending on which package or plan your friend subscribes to. Your friend(s) will get a 60 day trial to try out our Services and when they like our services and buy our packages, you will immediately get paid.</p>
                    <ol>
                        <li>If your friend subscribes to the Starter plan which is $13.99 per year, we will credit you $3</li>
                        <li>If your friend subscribes to the Artist plan which is $25.99 per year, we will credit you $10</li>
                        <li>If your friend subscribes to the Label plan which is $50.99 per year, we will credit you $15</li>
                    </ol>

                    <p>Please note you are only eligible for this program if you have purchased any our packages/plans.</p>
                </div>


            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script>
    function test(id){
        $("#statement_"+id).modal('show');
    }
    function closeModal(id){
        $("#statement_"+id).modal('hide');

    }
      $(document).ready(function() {
    $('#example').DataTable();

    // Select on pressing COPY
    var els_copy = document.querySelectorAll("[data-copy]");
    for (var i = 0; i < els_copy.length; i++) {
    var el = els_copy[i];
    el.addEventListener("submit", function(e) {
        e.preventDefault();
        var text = e.target.querySelector('input[type="text"]').select();
        document.execCommand("copy");
    });
    }

    // Select all text when pressing inside text field
    var els_selectAll = document.querySelectorAll("[data-click-select-all]");
    for (var i = 0; i < els_selectAll.length; i++) {
    var el = els_selectAll[i];
    el.addEventListener("click", function(e) {
        e.target.select();
    });
    }


});
</script>
@endpush
