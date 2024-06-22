@forelse (packges() as $index=>$value)
    <div class="col-md-4 mb-md-0 mb-4">
        <div class="package text-center text-white">
            <h4 class="text-white font-oswald">For {{isset($value->name) && !empty($value->name) ? $value->name : '-'}}</h4>
            <p class="package-price font-oswald text-white my-5">${{isset($value->price) && !empty($value->price) ? $value->price : '0'}} </p>
            <span class="text-capitalize">per year</span>
            <ul class="list-unstyled mt-5">
                @if(!empty($value->details) && $value->details->count()>0)
                    @foreach($value->details as $i=>$v)
                    <li>⧫ {{isset($v->feature) && !empty($v->feature) ? $v->feature : '-'}}</li>
                    @endforeach
                @endif
            </ul>

            <a href="{{route('register')}}" class="btn btn-primary text-capitalize mt-3 mb-5">START FREE TRIAL</a>
        </div>
    </div>
@empty

@endforelse
