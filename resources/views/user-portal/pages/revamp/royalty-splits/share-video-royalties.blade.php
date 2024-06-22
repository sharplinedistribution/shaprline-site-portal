@extends('layouts.portal_revamp_scaffold')
@push('title') Share Royalties - Videos @endpush
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
        hr{
            border-top: 1px solid var(--primary);
        }

        .modal-content {
            background-color: #0C0B0B;
            border: var(--bs-modal-border-width) solid #FFF301;
            border-radius: var(--bs-modal-border-radius);
        }
        .form-control:disabled {
            background-color: #353535;
        }



    </style>
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12">
       <div class="auth-form">
          <div class="card">
             <div class="card-body px-0">
                <div class="container p-4">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 style="color:var(--primary);">Share Your Royalties</h2>
                            <p>Add & Edit royalty splits to automatically share the money you earn<br>from this video release with your collaborators.</p>
                        </div>
                        <hr>
                        <div class="col-md-12 text-right">
                            <h4 style="color:var(--primary);">Video Release</h4>
                        </div>
                        <div class="col-12 border border-primary p-3 mt-1">
                            <div class="row">

                                <div class="col-md-2">
                                    <img src="{{asset(config('upload_path.video_thumbnail').$video->video_thumbnail)}}" width="100" alt="" class="d-block img-fluid">
                                </div>
                                <div class="col-md-5">
                                    <h5 style="color:var(--primary);">{{isset($video->user) ?  $video->user->name : null }}</h5>
                                    <span>Account Owner<br>
                                    {{ isset($video->user) ? $video->user->email : null}} (me)
                                    </span>
                                </div>
                                <div class="col-md-2 ">
                                    <span style="color:var(--primary);">
                                        1
                                    </span>
                                    Videos
                                </div>
                                <div class="col-md-3 ">
                                    Release Date <strong style="color:var(--primary);">{{getDateFormat($video->release_date)}}</strong><br>
                                    UPC CODE <strong style="color:var(--primary);">{{isset($video->upc_code) ? $video->upc_code : ''}}</strong><br>
                                    LABEL <strong style="color:var(--primary);">{{isset($video->label_copyright) ? $video->label_copyright : ''}}</strong><br>
                                    Version <strong style="color:var(--primary);">{{isset($video->version) ? $video->version : 'Original' }}</strong>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md-12 text-right">
                            <h4 style="color:var(--primary);">Videos</h4>
                        </div>
                        <input type="hidden" id="editMode" value="0">
                            @php $videoSplit = videoSplit($video->id);  $index = 0; @endphp
                            <div class="col-12 border border-primary p-3 mb-2" id="split_{{ +$index + 1 }}">
                                <div class="row" >
                                    <div class="col-md-2">
                                        <h5 style="">#{{ ++$index }}</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 style="color:var(--primary);">{{$video->video_title}}</h5>
                                    </div>
                                    <div class="col-md-2 ">
                                        My track split<br>
                                        <div class="progress">

                                            <div class="progress-bar" role="progressbar" style="width: {{ $videoSplit }}%; background-color: var(--primary); color: black;" aria-valuenow="{{ $videoSplit }}" aria-valuemin="0" aria-valuemax="{{ $videoSplit }}">{{ $videoSplit }}%</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <button type="button" onClick="adddSplit($(this),{{ $video->id }})" data-count="{{ $index }}"  class="btn btn-primary"><i class="fa fa-plus" ></i>&nbsp;@if($videoSplit < 100 )Edit Split @else Add Split @endif</button>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>

             </div>
          </div>
       </div>
    </div>
 </div>


 <div class="modal fade" id="saveEditsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <input type="hidden" id="location">
          <div class="row">
              <div class="col-md-12 text-center text-white">
                <input type="hidden" name="" id="track_id">
                <p style="font-size:18px">I confirm these splits are final and cannot be edited once accepted by the collaborators.</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 text-center" >
                <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModal($(this))">Cancel</button>&nbsp;
                <button type="button" class="btn btn-primary" onClick="saveEdits($(this))">Confirm</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="editSharedRoyaltiesModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-body" id="editRoyaltySplitContent">

        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="modifySplitSharePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12 text-center text-white">
                <h3 class="text-center">Do you want to modify this collaborators share for this track?</h3>
                <p style="font-size:18px">Your previous offer will be cancelled and a new share will be sent to the collaborator.</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 text-center" >
                <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModalAndUpdateLoader($(this))">No, Cancel</button>&nbsp;
                <button type="button" class="btn btn-primary" onClick="deleteAndModifyRoyalSplit($(this))">Yes, Modify</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="deleteSharedRoyaltiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
              <input type="hidden" id="delete_royal_split_id">
              <div class="col-md-12 text-center text-white">
                <h3 class="text-center">Do you want to remove this collaborator's share from this track?</h3>
                {{-- <p style="font-size:18px">Please make sure offer will be removed permanently from both parties and it will be non-recoverable</p> --}}
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 text-center" >
                <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModalAndUpdateLoader($(this))">No, Cancel</button>&nbsp;
                <button type="button" class="btn btn-primary" onClick="deleteRoyalSplit($(this))">Yes, Delete</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection
@push('scripts')
<script>
    function adddSplit(elm,trackId){
        var count = elm.attr('data-count');
        var editMode = $("#editMode").val();
        // $(".anotherSplit").attr('disabled',true);
        // $('anotherSplit_'+count).attr('disabled',false);
        if(editMode == 0){
            $.ajax({
                type : "GET",
                url  : "{{ route('user.royalty-splits.detail')  }}",
                data : {
                    'trackId' : trackId,
                    'count' : count,
                    'module' : 'video',
                },
                success : function(res){
                    if(res.success == true){
                        $("#editMode").val(1);
                        $("#split_"+count).html(res.data);
                    }
                },
                error    : function(res){

                }
            });
        }
        else{
            notify("Please Save or Cancel already opened Royalty Sharing","error");
        }

    }

    function addAnotherSplit(elm){

        $("#saveEdits").attr('disabled',false).css('background-color','var(--primary)').css('border-color','black');
        var c = elm.attr('data-count');
        var count = parseInt(c) + 1;
        var splitPercentage = 0;
        var artist_ids = $("[name='split[]']").map(function() {
            splitPercentage += parseInt($(this).val());
        }).get();

        var name = $("[name='email[]']").map(function() {
            return $(this).val();
        }).get();
        var email = $("[name='email[]']").map(function() {
            return $(this).val();
        }).get();
        var split = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();

        if(splitPercentage >= 100){
            notify("Royalty has been shared completely","error");
        }
        else{
            if(name == "" || email == "" || split == ""){
                notify("All fields are required","error");
            }
            else{
                $("#addAnotherSplitButton").attr('data-count',count);
                var html= '<div class="col-md-4 mt-1 split_'+count+'"><input type="text" name="name[]" class="form-control" ></div><div class="col-md-4 mt-1 split_'+count+'"><input name="email[]" type="email" class="form-control" ></div><div class="col-md-2 mt-1 split_'+count+'"><input name="split[]" id="split_percentage_'+count+'"  onfocusout="splitPercentage($(this))" data-count="'+count+'" type="text" class="form-control" ></div><div class="col-md-2 split_'+count+' text-left mt-3"><a href="javascript:;" onClick="removeAnotherSplit($(this),'+count+')" style=""><i class="text-danger fa fa-trash" style="font-size:22px;"></i></a></div>';
                $("#anotherSplit").append(html);
            }
        }
    }

    function removeAnotherSplit(elm,count){
        $('.split_'+count).remove();

        $("#edit_split").val('');
        var splits = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();
        sum = 0;
        $.each(splits,function(){sum+=parseFloat(this) || 0;});
        var actual = 100 - sum;
        $("#progress").css('width',actual+'%').attr('aria-valuenow',actual).attr('aria-valuemax',actual).html(actual+'%');
    }

    function cancelSplit(elm,trackId,count){
        $.ajax({
            type : "GET",
            url  : "{{ route('user.royalty-splits.cancel') }}",
            data : {
                'trackId' : trackId,
                'count'   : count,
                'module'  : 'video',
            },
            success : function(res){
                $("#editMode").val(0);
                $("#split_"+count).html(res.data);
            },
            error   : function(res){

            }
        })
    }

    function splitPercentage(elm){
        var count = elm.attr('data-count');
        var videoSplit = parseInt($("#trackProgress").val());
        var percentage = parseInt(elm.val());

        var splits = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();

        sum = 0;
        $.each(splits,function(){sum+=parseFloat(this) || 0;});

        var actual = 100  - sum;
        console.log(actual+' '+sum+' '+percentage+' '+count);
        if(actual < 0){
            notify("Royalty can be share within 100%","error");
            $("#split_percentage_"+count).val('');
            $("#editSharedRoyaltiesModal").modal('hide');
            $("#edit_split").val('');
        }
        else{
            var actualPercentage =  videoSplit - percentage;
            if(percentage > 100){
                notify("Percentage can not be greater than "+videoSplit,"error");
                $("#split_percentage_"+count).val(100);
                $("#trackProgress").val(100);
            }
            $("#progress").css('width',actual+'%').attr('aria-valuenow',actual).attr('aria-valuemax',actual).html(actual+'%');
        }


    }


    function saveEditsModal(elm,track_id){
        $("#track_id").val(track_id);
        var name = $("[name='name[]']").map(function() {
            return $(this).val();
        }).get();
        var email = $("[name='email[]']").map(function() {
            return $(this).val();
        }).get();
        var split = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();

        console.log(name);
        console.log(email);
        console.log(split);

        if(name == "" || email == "" || split == ""){
            notify("All fields are required","error");
        }
        else{
            $("#saveEditsModal").modal('show');
        }
    }

    function saveEdits(elm){
        var track_id = $("#track_id").val();
        var name = $("[name='name[]']").map(function() {
            return $(this).val();
        }).get();
        var email = $("[name='email[]']").map(function() {
            return $(this).val();
        }).get();
        var split = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();

        if(name == "" || email == "" || split == ""){
            notify("All fields are required","error");
        }
        else{
            $.ajax({
                type : "POST",
                url  : "{{route('user.royalty-splits.store')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'owner_id' : "{{$video->user_id}}",
                    'release_id' : "{{$video->id}}",
                    'track_id' : track_id,
                    'name'   : name,
                    'email'  : email,
                    'split'  : split,
                    'module' : 'video',
                },
                beforeSend : function(res){
                    $('.loader').show();
                },
                success : function(res){
                    $('.loader').hide();
                    if(res.success == true){
                        $("#saveEditsModal").modal('hide');
                        location.reload();
                    }
                },
                error  : function(res){
                    $('.loader').hide();
                }

            });
        }
    }

    function editSharedRoyalties(elm,id){
        // var name = elm.attr('data-name');
        // var email = elm.attr('data-email');
        // var share = elm.attr('data-share');
        var count = elm.attr('data-count');
        // $("#royal_split_id").val(id);
        // $("#edit_name").val(name);
        // $("#edit_email").val(email);
        // $("#edit_split").val(share);
        // $("#edit_split").attr('data-count',count);

        $.ajax({
            type : "GET",
            url  : "{{route('user.royalty-splits.edit')}}",
            data : {
                'id'  : id,
                'count' : count,
                'module' : 'video',
            },
            success : function(res){
                if(res.success == true){
                    $("#editRoyaltySplitContent").html(res.data);
                    $("#editSharedRoyaltiesModal").modal('show');
                }
            },
            error : function(res){

            },
        });
    }


    function modifySplitShare(elm){
        var name = $("#edit_name").val();
        var email = $("#edit_email").val();
        var split = $("#edit_split").val();

        if(name == "" || email == "" || split == ""){
            notify("All fields are required","error");
        }
        else{
            $("#editSharedRoyaltiesModal").modal('hide');
            $("#modifySplitSharePermissionModal").modal('show');
        }
    }

    function closeModalAndUpdateLoader(elm){
        $("#edit_split").val('');
        var splits = $("[name='split[]']").map(function() {
            return $(this).val();
        }).get();
        sum = 0;
        $.each(splits,function(){sum+=parseFloat(this) || 0;});
        var actual = 100 - sum;
        $("#progress").css('width',actual+'%').attr('aria-valuenow',actual).attr('aria-valuemax',actual).html(actual+'%');
        $(".modal").modal('hide');
    }

    function deleteAndModifyRoyalSplit(elm){
        var royalSplitId = $("#royal_split_id").val();
        var name = $("#edit_name").val();
        var email = $("#edit_email").val();
        var split = $("#edit_split").val();

        console.log(name);
        console.log(email);
        console.log(split);

        if(name == "" || email == "" || split == ""){
            notify("All fields are required","error");
        }
        else{
            $.ajax({
                type : "POST",
                url  : "{{route('user.royalty-splits.deleteAndModify')}}",
                data : {
                    '_token'  : "{{csrf_token()}}",
                    'royalty_split_id' : royalSplitId,
                    'name' : name,
                    'email' : email,
                    'split' : split,
                    'module' : 'video',
                },
                beforeSend : function(res){
                    $(".loader").show();
                },
                success : function(res){
                    if(res.success == true){
                        location.reload();
                        $('.loader').hide();
                    }
                    else{
                        notify("Something Went Wrolng","error");
                    }
                },
                error   : function(res){
                    $('.loader').hide();
                    notify("Something Went Wrolng","error");
                }
            });
        }
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    function deleteSharedRoyalties(elm,id){
        $("#delete_royal_split_id").val(id);
        $("#deleteSharedRoyaltiesModal").modal('show');
    }

    function deleteRoyalSplit(elm){
        var royalty_split_id = $("#delete_royal_split_id").val();
        $.ajax({
            type : "POST",
            url  : "{{route('user.royalty-splits.delete')}}",
            data : {
                '_token'           : "{{csrf_token()}}",
                'royalty_split_id' : royalty_split_id,
                'module' : 'video',
            },
            beforeSend : function(res){
                $(".loader").show();

            },
            success     : function(res){
                $(".loader").hide();
                if(res.success == true){
                    $("#deleteSharedRoyaltiesModal").modal('hide');
                    location.reload();
                }
                else{
                    notify("Something Went Wrolng","error");
                }
            },
            error     : function(res){
                $(".loader").hide();
                notify("Something Went Wrolng","error");
            }
        });
    }
</script>
@endpush
