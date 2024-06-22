<!-- plugins:js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('portal/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('portal/assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('portal/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('portal/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('portal/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('portal/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('portal/assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('portal/assets/js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{asset('portal/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('web/js/notify.js')}}"></script>
  <!-- End plugin js for this page -->


<!-- alertify -->
<!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->

<!-- @if(Session::has('success'))
<script>
  alertify.set('notifier', 'position', 'top-right');
  alertify.success("{{Session::get('success')}}");
</script>

@endif
@if(Session::has('error'))
<script>
  alertify.set('notifier', 'position', 'top-right');
  alertify.error("{{Session::get('error')}}");
</script>

@endif -->

<script>
  $('.delete_record').on('click', function() {
    var id = $(this).attr('data-id');
    var confirm = window.confirm("Are You Sure?");
    if(confirm == true){
      document.getElementById('destroyForm_' + id).submit();
    }
 
  });
</script>
 
