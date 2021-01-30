<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section" data-bg-image-path="{{asset( $banner ? 'storage/'.$banner :
'theme/img/bg/breadcrumb-img.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>{{$h1}}</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{route('home.index')}}">Главная</a>
                        </li>
                        @foreach($breadcrumbs as $breadcrumb)
                            <li class="active">
                                <a href="{{$breadcrumb[0]}}">{{$breadcrumb[1]}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section end //-->
