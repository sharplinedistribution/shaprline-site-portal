@extends('layouts.revamp_scaffold')
@push('title')
FAQs
@endpush
@push('styles')
<style>
    .section__FAQS {
        background-color: #000;
    }
    .faq_section {
        width: 100%;
        margin: 0 auto;
    }
    .faq.active {
        background-color: rgb(24, 23, 23);
        box-shadow: O 3px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    }
    .faq {
        background-color: transparent;
        border: 1px solid #9fa4a8;
        border-radius: 10px;
        margin: 20px 0;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: 0.3s ease;
    }
    .faq-title {
        margin: 0 35px 0 0;
        font-size: 1rem;
        color: #FBDA03;
    }
    .faq.active .faq-text {
        display: block;
    }
    .faq-toggle {
        background-color: transparent;
        border: 0;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        position: absolute;
        top: 30px;
        right: 30px;
        height: 30px;
        width: 30px;
    }
    .faq-text {
        display: none;
        margin: 30px 0 0;
        font-size: 1rem;
        color: #fff;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush
@section('content')
<section class="faqs-main-headign">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12">
                <div class="our-work">
                    <h1 class="font-oswald text-color-primary mb-5">Answers to our most commonly asked questions</h1>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-list pt-0">
    <div class="container custom-container">


        <div class="row">
            <div class="col-12">
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
                                    {!! isset($v->question) && !empty($v->question) ? ucfirst($v->question) : '-' !!}
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
</section>
@endsection
@push('scripts')
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
@endpush
