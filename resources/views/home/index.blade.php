@extends('welcome')
@section('meta_title', config('setting.site.title'))
@section('meta_description', config('setting.site.description'))
@section('content')
    <!--// Hero Section Start //-->
    {!! config('setting.site.widget_banner') !!}
    <!--// Hero Section End //-->
    <!--// About Section Start //-->
    {!! config('setting.site.widget_about') !!}
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
                                <img src="{{asset($info->image)}}" alt="{{$info->name}}" class="img-fluid">
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
    <!--// Latest Blog Section Start //-->
    @if($post)
        <section class="section pb-minus-70" id="latest-blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-heading-left">
                            <h6>Блог</h6>
                            <h2>Последние записи</h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" id="blog-carousel">
                    @foreach($post as $info)
                        <div class="item">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="{{route('blog.show', $info->id)}}">
                                        <img src="{{$info->image}}" alt="{{$info->name}}" class="img-fluid">
                                    </a>
                                    <span class="blog-date">{{date('D m', strtotime($info->created_at))}}</span>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        @if($author = $info->author())
                                            <a href="#">
                                                <span><i class="far fa-user"></i>
                                                    By {{$author->name}}
                                                </span>
                                            </a>
                                        @endif
                                        @if($info->blog_id)
                                            <a href="{{route('blog.index', $info->blog_id)}}"><span><i
                                                        class="far fa-bookmark"></i>{{$info->blog->name ?? ''}}</span></a>
                                        @endif
                                    </div>
                                    <h5>
                                        <a href="{{route('blog.show', $info->id)}}">
                                            {{$info->name}}
                                        </a>
                                    </h5>
                                    @if($info->excerpt)
                                        <p>
                                            {{mb_substr(strip_tags($info->excerpt), 0, 50)}} [..]
                                        </p>
                                    @endif
                                    <a href="{{route('blog.show', $info->id)}}" class="blog-link">
                                        Перейти
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--// Latest Blog Section End //-->
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
                                    <img src="{{asset($info->image)}}" alt="{{$info->name}}"
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
