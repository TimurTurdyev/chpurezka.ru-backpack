@extends('welcome')
@section('meta_title', $detail->meta_title)
@section('meta_description', $detail->meta_description)
@section('content')
    @include('master.breadcrumb', [
     'h1' => $detail->title,
     'banner' => $detail->service->banner,
     'breadcrumbs' => [
                [route('service.index', $detail->service->id), $detail->service->name],
                [route('service.show', $detail->id), $detail->name],
            ]
         ])
    <!--// Services Detail Section Start //-->
    <section class="section" id="services-page">
        <div class="container">
            <div class="row pb-5">
                <div class="col-lg-6">
                    <div class="services-detail-img">
                        <img src="{{$detail->image ?asset($detail->image)
                        :'theme/img/bg/services-detail-img
                        .jpg'}}"
                             alt="{{$detail->name}}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 services-detail-inner-wrap">
                    <div class="services-detail-inner">
                        <h6>{{$detail->title}}</h6>
                        <h2>{{$detail->sub_title}}</h2>
                        {!! $detail->introduction !!}
                    </div>
                    <ul class="services-list">
                        @foreach($detail->attributes as $attribute)
                            <li>
                                <h6><i class="fa fa-arrow-right"></i> {{$attribute->title}}</h6>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if($detail->images || $detail->description)
                <div class="row py-5">
                    <div class="col-md-4">
                        @if($images = $detail->images)
                            <div class="owl-carousel owl-theme" id="detail-images">
                                @foreach($images as $image)
                                    <div class="item">
                                        <img src="{{asset($image)}}" alt="{{$detail->name}}"
                                             class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">{!! $detail->description !!}</div>
                </div>
            @endif
        </div>
    </section>
    @if($detail->prices && $prices = $detail->prices[0])
        <section class="bg-light section pb-minus-70">
            <div class="container container-custom">
                <div class="py-3 text-center">
                    @if($prices['title'])
                        <h5 class="mb-3">{{$prices['title']}}</h5>
                    @endif
                    @if($prices['description'])
                        <div class="mb-3">
                            {!! $prices['description'] !!}
                        </div>
                    @endif
                    @if(isset($prices['head1']) && $body = json_decode($prices['body'], 1))
                        <div class="table-responsive mt-2">
                            <table class="table table-sm table-striped table-hover text-center">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        {{$prices['head0']}}
                                    </th>
                                    <th scope="col">
                                        {{$prices['head1']}}
                                    </th>
                                    <th scope="col">
                                        {{$prices['head2']}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($body as $row_body)
                                    <tr>
                                        @for($i = 0; $i < count($row_body); $i++)
                                            <th @if($i === 0)scope="row"@endif>
                                                {{$row_body[$i]}}
                                            </th>
                                        @endfor
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!--// Services Detail Section End //-->

    <!--// Faq Section Start //-->
    @if($detail->question && $detail->question->faq && $faq = json_decode($detail->question->faq))
        <section class="section" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-heading-left">
                            <h6>{{$detail->question->title}}</h6>
                            {!! $detail->question->description !!}
                        </div>
                    </div>
                </div>
                <div class="faq-accordion">
                    <div class="accordion" id="faqAccordion">
                        @foreach($faq as $question)
                            <div class="accordion-item">
                                <div class="accordion-header" id="heading{{$loop->index}}">
                                    <a href="#" data-toggle="collapse" data-target="#collapse-{{$loop->index}}"
                                       aria-expanded="{{$loop->index < 1 ? 'true' : 'false'}}"
                                       aria-controls="collapse-{{$loop->index}}">
                                        {{$loop->index +1}}.{{$question->key ?? ''}}
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                                <div id="collapse-{{$loop->index}}"
                                     class="collapse {{$loop->index < 1 ? 'show' : ''}}"
                                     aria-labelledby="heading{{$loop->index}}"
                                     data-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            {!! $question->value ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--// Faq Section End //-->
@endsection

@push('javascript')
    <script>
        $('#detail-images').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: true,
            autoplay: true,
            smartSpeed: 600,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                750: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
@endpush
