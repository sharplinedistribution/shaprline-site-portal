<div class="col-12  p-1 mb-2">
    <input type="hidden" name="" id="trackProgress" value="{{ $trackSplit }}">
    <div class="row">
        <div class="col-md-2">
            <h5 style="">#{{ $count }}</h5>
        </div>
        <div class="col-md-10">
            <span style="float:right">
                <a href="javascript:;" onClick="cancelSplit($(this),{{ $track->id }},{{ $count }})" class="text-danger"><h5><i class="fa fa-times"></i>&nbsp;CANCEL</h5></a>
            </span>
        </div>

        <div class="col-md-7">
            {{ auth()->user()->email }} (me)
        </div>
        <div class="col-md-2">
            My track split<br>
            <div class="progress">
                <div class="progress-bar" id="progress" role="progressbar" style="width: {{ $trackSplit }}%; background-color: var(--primary); color: black;" aria-valuenow="{{ $trackSplit }}" aria-valuemin="0" aria-valuemax="{{ $trackSplit }}">{{ $trackSplit }}%</div>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>
    @forelse ($royalties as $index=>$r)

        <div class="row mt-1">
            <div class="col-md-4 split_{{$index + 1}}">
                @if($index == 0) <label for="">Name</label> @endif
                <input name="name[]" type="text" class="form-control" placeholder="John Doe" value="{{$r->name}}" disabled @if($r->status ==0 ) style="border : solid 2px #ffc107;" @elseif($r->status == 1) style="border : solid 2px #198754;" @elseif($r->status == 2) style="border : solid 2px #dc3545;"  @endif>
            </div>
            <div class="col-md-4 split_{{$index + 1}}">
                @if($index == 0) <label for="">Email</label> @endif
                <input name="email[]" type="email" class="form-control" placeholder="john.doe@example.com" value="{{$r->email}}" disabled  @if($r->status ==0 )  style="border : solid 2px #ffc107;" @elseif($r->status == 1) style="border : solid 2px #198754;"  @elseif($r->status == 2) style="border : solid 2px #dc3545;" @endif>
            </div>
            <div class="col-md-2 split_{{$index + 1}}">
                @if($index == 0) <label for="">Split</label> @endif
                <input name="split[]" id="split_percentage_{{ $count }}" type="text" class="form-control" placeholder="%"  value="{{$r->share}}" disabled  @if($r->status ==0 )  style="border : solid 2px #ffc107;" @elseif($r->status == 1) style="border : solid 2px #198754;"  @elseif($r->status == 2) style="border : solid 2px #dc3545;" @endif>
            </div>
            <div class="col-md-2 text-center split_{{$index + 1}}">
                @if($index == 0)<label for="">&nbsp;</label>@endif
                <br>
                <div class="row">
                    @if($r->status == 0)
                        <div class="col-3">
                            <a href="javascript:;" style="" data-toggle="tooltip" data-placement="top" title="Pending"><i class="text-warning fa fa-warning" style="font-size:22px;" ></i></a>
                        </div>
                    @elseif($r->status == 1)
                        <div class="col-3">
                            <a href="javascript:;" style="" data-toggle="tooltip" data-placement="top" title="Accepted"><i class="text-success fa fa-check" style="font-size:22px;" ></i></a>
                        </div>
                    @elseif($r->status == 2)
                        <div class="col-3">
                            <a href="javascript:;" style="" data-toggle="tooltip" data-placement="top" title="Rejection"><i class="text-danger fa fa-times" style="font-size:22px;" ></i></a>
                        </div>
                    @endif
                    <div class="col-3 ">
                        <a href="javascript:;" style="" onClick="editSharedRoyalties($(this),{{$r->id}})" data-count="0" data-name="{{$r->name}}" data-email="{{$r->email}}" data-share="{{$r->share}}" title="Edit"><i class="text-primary fa fa-edit" style="font-size:18px; color: var(--primary) !important" ></i></a>
                    </div>
                    <div class="col-3 ">
                        <a href="javascript:;" onClick="deleteSharedRoyalties($(this),{{$r->id}})" style="" title="Delete"><i class="text-danger fa fa-trash" style="font-size:18px; " ></i></a>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    @empty
    <div class="row mt-2">
        <div class="col-md-4 split_0">
            <label for="">Name</label>
            <input name="name[]" type="text" class="form-control" placeholder="John Doe" >
        </div>
        <div class="col-md-4 split_0">
            <label for="">Email</label>
            <input name="email[]" type="email" class="form-control" placeholder="john.doe@example.com" >
        </div>
        <div class="col-md-2 split_0">
            <label for="">Split</label>
            <input name="split[]" id="split_percentage_1" type="text" class="form-control" placeholder="%" onfocusout="splitPercentage($(this))" data-count="1" >
        </div>

        <div class="col-md-2 text-left split_0">
            <label for="">&nbsp;</label>
            <br>
            <a href="javascript:;" style="" >
                <i class="text-danger fa fa-trash" style="font-size:22px;" ></i>
            </a>
        </div>
    </div>
    @endforelse

    <div class="row" id="anotherSplit">

    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <button type="button" id="addAnotherSplitButton" class="btn btn-primary anotherSplit anotherSplit_{{ $count }}"  onClick="addAnotherSplit($(this))" data-count="{{ isset($royalties) ? count($royalties) : 1}}"><i class="fa fa-plus"></i>&nbsp;Add Another Split</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <div style="float:right">
                <button type="button" class="btn btn-primary" id="saveEdits" onClick="saveEditsModal($(this),{{$track->id}})" data-count="1" @if(count($royalties) > 0) disabled style=" background-color: black; border-color: var(--primary);" @endif>&nbsp;Save Edits</button>
            </div>
        </div>
    </div>
</div>
