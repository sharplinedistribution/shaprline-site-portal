@extends('layouts.portal_revamp_scaffold')
@push('title') Royalty Splits - @endpush
@push('styles')
    <style>
        .border, .border-top, .border-bottom, .border-left, .border-right {
            border-color: var(--primary) !important;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #000;
            border-radius: 0;
            border: 1px solid var(--primary);
            font-weight: 600;
            padding: 12px 40px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .auth-form .btn-primary {
            padding: 7px 23px;
        }

        .btn.disabled{
            background-color: black !important;
            border-color: var(--primary) !important;
        }
    </style>
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
   <div class="col-12">
      <div class="auth-form">
         <div class="card">
            <div class="card-body px-0">
               <div class="row">
                  <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link @if(empty(request('flag'))) active @endif" id="nav-paypal-tab"
                           data-bs-toggle="tab" data-bs-target="#nav-paypal" type="button"
                           role="tab" aria-controls="nav-paypal"
                           aria-selected="true">My Audios</button>
                        <button class="nav-link " id="nav-videos-tab"
                           data-bs-toggle="tab" data-bs-target="#nav-videos" type="button"
                           role="tab" aria-controls="nav-videos"
                           aria-selected="true">My Videos</button>
                        <button class="nav-link  @if(!empty(request('flag'))) active @endif" id="nav-usa-bank-tab" data-bs-toggle="tab"
                           data-bs-target="#nav-usa-bank" type="button" role="tab"
                           aria-controls="nav-usa-bank" aria-selected="false">Collaborators</button>
                        <button class="nav-link  " id="my-sharings-tab" data-bs-toggle="tab"
                           data-bs-target="#my-sharings" type="button" role="tab"
                           aria-controls="my-sharings" aria-selected="false">My Shared Royalties</button>
                     </div>
                  </nav>
               </div>
               <div class="row mt-4 px-lg-4 px-2">
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade @if(empty(request('flag'))) show active @endif" id="nav-paypal" role="tabpanel"
                        aria-labelledby="nav-paypal-tab">
                        @include('user-portal.pages.revamp.royalty-splits.releases')
                     </div>
                     <div class="tab-pane fade " id="nav-videos" role="tabpanel"
                        aria-labelledby="nav-videos-tab">
                        @include('user-portal.pages.revamp.royalty-splits.videos')
                     </div>
                     <div class="tab-pane fade @if(!empty(request('flag'))) show active @endif" id="nav-usa-bank" role="tabpanel"
                        aria-labelledby="nav-usa-bank-tab">
                        @include('user-portal.pages.revamp.royalty-splits.collaborators')
                     </div>
                     <div class="tab-pane fade " id="my-sharings" role="tabpanel"
                        aria-labelledby="my-sharings-tab">
                        @include('user-portal.pages.revamp.royalty-splits.my-sharings')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(function() {
       $("#paypal").validate({
           rules: {
               email: {
                   required: true,
                   minlength: 8
               },
               confirm_email: {
                   required: true,
                   equalTo: "#email"
               }
           }
       });
       $("#usa").validate({});
       $("#uk").validate({});
       $("#euro").validate({});

   });


   function approval(elm,id,status,module){
        $.ajax({
            type : "POST",
            url  : "{{route('user.royalty-splits.collaboratorStatus')}}",
            data : {
                '_token'  : "{{csrf_token()}}",
                'id' : id,
                'status'  : status,
                'module'  : module,
            },
            beforeSend : function(res){
                $('.loader').show();
            },
            success    : function(res){
                $('.loader').hide();
                if(res.success == true){
                    notify(res.msg,"error");
                    window.location.href = "{{route('user.royalty-splits.index',['flag' => 'collaborations'])}}";
                }
            },
            error    : function(res){
                $('.loader').hide();
            },
        });
    }

</script>
@endpush
