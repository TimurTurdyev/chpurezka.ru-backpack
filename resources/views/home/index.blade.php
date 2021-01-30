@extends('welcome')
@section('meta_title', config('site.title'))
@section('meta_description', config('site.description'))
@section('content')
    <!--// Hero Section Start //-->
    {!! config('site.widget_banner') !!}
    <!--// Hero Section End //-->
    <!--// About Section Start //-->
    {!! config('site.widget_about') !!}
    <!--// About Section End //-->

    <!--// Services Section Start //-->
    <section class="section bg-light-grey pb-minus-70" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading-left">
                        <h6>Виды услуг</h6>
                        <h2>Направление</h2>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme" id="services-carousel">
                @foreach($service as $info)
                    <div class="item">
                        <div class="services-item">
                            <div class="icon">
                                <img src="{{asset('storage/'.$info->image)}}" alt="{{$info->name}}" class="img-fluid">
                            </div>
                            <div class="text">
                                <h5>{{$info->name}}</h5>
                            </div>
                            <div class="block-btn">
                                <a href="{{route('service.index', $info->id)}}" title="Перейти" class="primary-btn">
                                    <span>Перейти</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--// Services Section End //-->

    <!--// Work Process Section Start //-->
    <section class="section pb-minus-70" id="work-process">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-heading-center">
                        <h6>Work Process</h6>
                        <h2>How It Works</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="work-process-item">
                        <div class="img">
                            <img src="img/bg/work-process-img-1.jpg" alt="Work Process image" class="img-fluid">
                            <span>01</span>
                        </div>
                        <div class="text">
                            <h6>Thinking</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="work-process-item">
                        <div class="img">
                            <img src="img/bg/work-process-img-2.jpg" alt="Work Process image" class="img-fluid">
                            <span>02</span>
                        </div>
                        <div class="text">
                            <h6>Research</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="work-process-item">
                        <div class="img">
                            <img src="img/bg/work-process-img-3.jpg" alt="Work Process image" class="img-fluid">
                            <span>03</span>
                        </div>
                        <div class="text">
                            <h6>Wireframe</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="work-process-item">
                        <div class="img">
                            <img src="img/bg/work-process-img-4.jpg" alt="Work Process image" class="img-fluid">
                            <span>04</span>
                        </div>
                        <div class="text">
                            <h6>Design</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Work Process Section End //-->
    <!--// Testimonial Section Start //-->
    <section class="section bg-light-grey pb-minus-70" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading-left">
                        <h6>Отзывы</h6>
                        <h2>О нас пишут</h2>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme" id="testimonials-carousel">
                @foreach($review as $info)
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="top">
                                <div class="img">
                                    <img src="{{asset('storage/'.$info->image)}}" alt="{{$info->name}}"
                                         class="img-fluid">
                                </div>
                                <div class="text">
                                    <h5>{{$info->name}}</h5>
                                    <h6>{{$info->sub_name}}</h6>
                                </div>
                            </div>
                            <div class="body">
                                {!!$info->description!!}
                                <div class="rating-star">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i < $info->rating)
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--// Testimonial Section End //-->
@endsection
