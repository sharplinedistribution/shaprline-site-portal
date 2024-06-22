@php $count = 1;  @endphp
@forelse (revenueTotals() as $key=>$value)
    @php $validate = validateStoreStatus($key); @endphp
    @if($validate != false)
        @if($count <= 4)
            <div class="card stream-card">
                <div class="card-body py-5">
                    <img src="{{ asset('assets/icons/'.$validate)}}" width="56" height="56" alt="" class="d-block">

                    <span class="d-block mt-4">{{$key}}</span>
                    <p class="my-1">${{$value}}</p>
                </div>
            </div>
        @endif
    @php $count++; @endphp
    @endif
@empty
@include('user-portal.pages.revamp.components.default-card',['currency' => true])
@endforelse