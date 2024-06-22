@extends('layouts.portal_revamp_scaffold')
@push('title')
    FAQs - 
@endpush
@push('buttonContent')
<div class="mt-3">
    <h2 class="user-name">
        <span>Answers to our most commonly asked questions</span>
    </h2>
    <p class="tag">A more detailed FAQ is available to our members within the SHARPLINE DISTRO
        portal. Our support team is also
        available to help members plan their release and answer any questions.</p>
</div>
@endpush
@section('content')
    
<div class="row mt-2 px-lg-4">
    <div class="col-12">
        @if(isset($faqs) && !empty($faqs))
        @forelse($faqs as $index=>$value)
            <div class="card mb-4">
                <div class="card-body py-4 px-lg-4 px-2">
                    <div class="row">
                        <div class="col-12">
                            <h5>{{isset($value->title) && !empty($value->title) ? ucfirst($value->title) : '-'}}</h5>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="accordion" id="accordionExample{{  $index }}">
                            @if(!empty($value->faqs))
                                @foreach($value->faqs as $i=>$v)
                                  @php $rand = rand(100,1000); @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{ $rand }}">
                                        <button class="@if($i == 0) accordion-button bg-transparent border-0 rounded-0 @else accordion-button collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$rand}}" @if($i == 0 ) aria-expanded="true" @else aria-expanded="false"  @endif aria-controls="collapseOne{{$rand}}">
                                            {{isset($v->question) && !empty($v->question) ? ucfirst($v->question) : '-'}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{$rand}}" class="accordion-collapse collapse @if($i == 0 ) show @endif" aria-labelledby="headingOne{{ $rand }}" data-bs-parent="#accordionExample{{  $index }}">
                                        <div class="accordion-body">
                                            <p>{!! isset($v->answer) && !empty($v->answer) ? ucfirst($v->answer) : '-' !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>

            </div>
        @empty
        @endforelse
        @endif

     
    </div>
</div>
@endsection