@extends('welcome')
@section('meta_title', $service->meta_title)
@section('meta_description', $service->meta_description)
@section('content')
    @include('master.breadcrumb', [
     'h1' => $service->title,
     'banner' => $service->banner,
     'breadcrumbs' => [
                [route('service.index', $service->id), $service->name]
            ]
         ])
    <!--// Project Grid Section Start //-->
    <section class="section pb-minus-70" id="portfolio-grid">
        <div class="container">
            <div class="portolio-grid-header align-items-start">
                <div class="section-heading-left w-100">
                    <h6>{{$service->sub_title}}</h6>
                    <h2>{{$service->name}}</h2>
                </div>
                <div class="gallery-filter flex-wrap">
                    <a href="#" data-gallery-filter="*" class="current mb-sm-1">Все</a>
                    @foreach($service->filters as $filter)
                        <a href="#" data-gallery-filter=".info_filter{{$filter->id}}" class="mb-sm-1">{{$filter->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="row" id="portfolioGrid">
                @foreach($service->detail as $detail)
                    @php
                        $filters = [];
                        foreach($detail->filters as $filter) $filters[] = 'info_filter' . $filter->id;
                    @endphp
                    <div class="col-md-6 col-lg-4 gallery-item {{join(' ', $filters)}}">
                        <div class="latest-project-item">
                            <div class="portfolio-item-img">
                                <img src="{{$detail->image ? asset($detail->image):'theme/img/portfolio/portfolio-img-1.jpg'}}"
                                     alt="{{$detail->name}}"
                                     class="img-fluid portfolio-img">
                                <div class="portfolio-buttons">
                                    <a href="{{$detail->image ? asset($detail->image):'theme/img/portfolio/portfolio-img-1.jpg'}}"
                                       class="portfolio-zoom-link"><span></span><span></span></a>
                                </div>
                            </div>
                            <div class="block-btn">
                                <a href="{{route('service.show', $detail->id)}}" title="Read
                                More"
                                   class="primary-btn">
                                    <span>{{$detail->name}}</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--// Project Grid Section End //-->
@endsection
