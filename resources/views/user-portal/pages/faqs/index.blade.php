@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')


<!-- partial -->
<div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3>Hi, <span style="color: #fbda03;">liamgareth</span></h3>
            </div>
        </div>
        <div class="row mt-5 bg-dark p-4">
            <div class="col-lg-12">
                <div class="frequentlyQsts">
                    <h2 style="color: #fbda03;">Answers to our most commonly asked questions</h2>
                    <p>A more detailed FAQ is available to our members within the SHARPLINE DISTRO portal. Our support team is also available to help members plan their release and answer any questions.
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12  ">
                    <section class="section__FAQS">
                        @if(isset($faqs) && !empty($faqs))
                        @foreach($faqs as $index=>$value)
                        <div class="faq_section">
                            <div class="faq-container">
                                <h2 style="color:#fbda03;">{{isset($value->title) && !empty($value->title) ? ucfirst($value->title) : '-'}}</h2>
                                @if(!empty($value->faqs))
                                @foreach($value->faqs as $i=>$v)
                                <div class="faq @if($i == 0) active @endif">
                                    <h3 class="faq-title">
                                        {{isset($v->question) && !empty($v->question) ? ucfirst($v->question) : '-'}}
                                    </h3>
                                    <p class="faq-text">
                                        {!! isset($v->answer) && !empty($v->answer) ? ucfirst($v->answer) : '-' !!}
                                    </p>
                                    <button class="faq-toggle" style="background: #FBDA03">
                                        <i class="fa fa-plus text-dark"></i>
                                        {{-- <i class="fa fa-times"></i> --}}
                                    </button>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </section>
                </div>
            </div>
        </div>
    </div>
@push("scripts")
<script src="//code.tidio.co/ispsfy7h8xvld7cmd2gaoeslxpoxsvhs.js" async></script>

<script>
    (function() {
        const toggles = document.querySelectorAll(".faq-toggle")
        toggles.forEach(toggle => {
            toggle.addEventListener("click", () => {
                toggle.parentNode.classList.toggle("active")

            })
        })
    })();
</script>
<!-- inject:js -->
{{-- <script src="{{asset('web/js/off-canvas.js')}}"></script> --}}
{{-- <script src="{{asset('web/js/hoverable-collapse.js')}}"></script> --}}
{{-- <script src="{{asset('web/js/misc.js')}}"></script> --}}
{{-- <script src="{{asset('web/js/settings.js')}}"></script> --}}
{{-- <script src="{{asset('web/js/todolist.js')}}"></script> --}}
@endpush
@endsection
