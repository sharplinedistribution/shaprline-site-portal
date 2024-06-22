@forelse(defaultCards() as $index=>$c)
<div class="card stream-card">
    <div class="card-body py-5">
        <img src="{{ asset('assets/icons/'.str_replace(' ','-',strtolower($c)).'.png')}}" width="56" height="56" alt="" class="d-block">

        <span class="d-block mt-4">{{$c}}</span>
        <p class="my-1">{{isset($currency) ? '$' : null}}0</p>
    </div>
</div>

@empty
@endforelse


