<div class="col-12  p-1 mb-2" id="split_{{ $count }}">
    <div class="row" >
        <div class="col-md-2">
            <h5 style="">#{{ $count }}</h5>
        </div>
        <div class="col-md-5">
            <h5 style="color:var(--primary);">{{isset($track->title) ? $track->title : $track->video_title}}</h5>
        </div>
        <div class="col-md-2 ">
            My track split<br>
            <div class="progress">

                <div class="progress-bar" role="progressbar" style="width: {{ $trackSplit }}%; background-color: var(--primary); color: black;" aria-valuenow="{{ $trackSplit }}" aria-valuemin="0" aria-valuemax="{{ $trackSplit }}">{{ $trackSplit }}%</div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <button type="button" onClick="adddSplit($(this),{{ $track->id }})" data-count="{{ $count }}"  class="btn btn-primary"><i class="fa fa-plus" ></i>&nbsp;@if($trackSplit < 100 )Edit Split @else Add Split @endif</button>
        </div>

    </div>
</div>
