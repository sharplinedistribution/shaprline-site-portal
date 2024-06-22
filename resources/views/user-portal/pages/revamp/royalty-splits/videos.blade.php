<div class="row mt-3">
    @forelse ($videos as $item)
    <div class="col-lg-6 col-md-6 mb-3">
       <a href="{{ route('user.royalty-splits.videoRoyalties',$item->id) }}">
          <div class="release-card">
             <img src="{{asset(config('upload_path.video_thumbnail').$item->video_thumbnail)}}"  class="d-block w-100" alt="">
             <h5 class="mt-4">{{strtoupper($item->video_title)}}</h5>
             <span class="d-block">{{isset($item->user) ? $item->user->name : '-'}}</span>
          </div>
       </a>
       <div class="row">
          <div class="col-6 ">
            <a href="{{ route('user.royalty-splits.videoRoyalties',$item->id) }}">
                <button type="button" class=" btn btn-primary rounded" style="background-color: var(--primary); color: black; border : 1px solid var(--primary); font-size:10px; margin-top:10px;" >Split Royalties</button>
            </a>
          </div>
          <div class="col-6" style="">

          </div>
       </div>
    </div>
    @empty
    <center>No record found</center>
    @endforelse
 </div>
 <div class="row mt-3">
    <div class="col-md-12">
       {{$release->links()}}
    </div>
 </div>
