<div class="row">
    <div class="col-md-12 text-center">
        <h3>My Shared Royalties (Audios)</h3>
    </div>
</div>
@forelse ($mySharings as $ms)
<div class="row mb-1">
    <div class="col-12 border border-primary p-3">
        <div class="row">
            <div class="col-md-5">
                <h5 style="color:var(--primary);">{{isset($ms->track) ? $ms->track->title : null}}</h5>
                <span>Shared to <strong style="color:var(--primary);">{{$ms->name}}</strong> - {{date('d F Y | h:m',strtotime($ms->created_at))}} </span>
            </div>
            <div class="col-md-2 ">
                <span style="color:var(--primary);">
                    {{totalCollaborators($ms->track_id)}}
                </span>
                Collobarators
            </div>
            <div class="col-md-2 ">
                Share Royalties : <strong style="color:var(--primary);">{{$ms->share}}%</strong>
            </div>
            <div class="col-md-3">
                Earnings: $0.00
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
        <h3>My Shared Royalties (Videos)</h3>
    </div>
</div>
@forelse ($myVideoSharings as $vs)
<div class="row mb-1">
    <div class="col-12 border border-primary p-3">
        <div class="row">
            <div class="col-md-5">
                <h5 style="color:var(--primary);">{{isset($vs->release) ? $vs->release->video_title : null}}</h5>
                <span>Shared to <strong style="color:var(--primary);">{{$vs->name}}</strong> - {{date('d F Y | h:m',strtotime($vs->created_at))}} </span>
            </div>
            <div class="col-md-2 ">
                <span style="color:var(--primary);">
                    {{totalCollaboratorsVideo($vs->video_id)}}
                </span>
                Collobarators
            </div>
            <div class="col-md-2 ">
                Share Royalties : <strong style="color:var(--primary);">{{$vs->share}}%</strong>
            </div>
            <div class="col-md-3">
                Earnings: $0.00
            </div>
        </div>

    </div>
</div>
@empty
<center>No record found</center>
@endforelse
