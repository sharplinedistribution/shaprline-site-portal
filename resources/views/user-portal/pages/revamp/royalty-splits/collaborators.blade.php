<div class="row">
    <div class="col-md-12 text-center">
        <h3>Collaborations (Audios)</h3>
    </div>
</div>
@forelse ($collabrations as $item)
<div class="row mb-1">
    <div class="col-12 border border-primary p-3">
        <div class="row">
            <div class="col-md-5">
                <h5 style="color:var(--primary);">{{isset($item->track) ? $item->track->title : null}}</h5>
                <span>By <strong style="color:var(--primary);">{{isset($item->release) ? $item->release->user->name : null}}</strong> - {{date('d F Y | h:m',strtotime($item->created_at))}} </span>
            </div>
            <div class="col-md-2 ">
                <span style="color:var(--primary);">
                    {{totalCollaborators($item->track_id)}}
                </span>
                Collobarators
            </div>
            <div class="col-md-2 ">
                Your Share : <strong style="color:var(--primary);">{{$item->share}}%</strong>
            </div>
            <div class="col-md-3">
                @if($item->status == 1)
                    Earnings: $0.00
                @else
                    <button type="button" class="btn btn-primary bg-dark text-white" onClick="approval($(this),{{$item->id}},2,'track')">Reject</button>&nbsp;&nbsp;
                    <button type="button"  class="btn btn-primary" onClick="approval($(this),{{$item->id}},1,'track')">Accept</button>
                @endif
            </div>
        </div>

    </div>
</div>
@empty
<center>No record found</center>
@endforelse
<br>
<hr>
<br>
<div class="row">
    <div class="col-md-12 text-center">
        <h3>Collaborations (Videos)</h3>
    </div>
</div>
@forelse ($videoCollabrations as $vc)
<div class="row mb-1">
    <div class="col-12 border border-primary p-3">
        <div class="row">
            <div class="col-md-5">
                <h5 style="color:var(--primary);">{{isset($vc->release) ? $vc->release->video_title : null}}</h5>
                <span>By <strong style="color:var(--primary);">{{isset($vc->release) ? $vc->release->user->name : null}}</strong> - {{date('d F Y | h:m',strtotime($vc->created_at))}} </span>
            </div>
            <div class="col-md-2 ">
                <span style="color:var(--primary);">
                    {{totalCollaboratorsVideo($vc->video_id)}}
                </span>
                Collobarators
            </div>
            <div class="col-md-2 ">
                Your Share : <strong style="color:var(--primary);">{{$vc->share}}%</strong>
            </div>
            <div class="col-md-3">
                @if($vc->status == 1)
                    Earnings: $0.00
                @else
                    <button type="button" class="btn btn-primary bg-dark text-white" onClick="approval($(this),{{$vc->id}},2,'video')">Reject</button>&nbsp;&nbsp;
                    <button type="button"  class="btn btn-primary" onClick="approval($(this),{{$vc->id}},1,'video')">Accept</button>
                @endif
            </div>
        </div>

    </div>
</div>
@empty
<center>No record found</center>
@endforelse
