@extends('welcome')
@section('meta_title', config('setting.site.title'))
@section('meta_description', config('setting.site.description'))
@section('content')
    @include('master.breadcrumb', [
     'h1' => 'Наши контакты',
     'banner' => '',
     'breadcrumbs' => [
                [route('contact.index'), 'Контакты'],
            ]
         ])
    <!--// Contact Info Section Start //-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-item">
                        <div class="icon">
                            <img src="theme/img/bg/contact-info-icon-1.png" alt="" class="img-fluid">
                        </div>
                        <div class="text">
                            <h5>Адрес:</h5>
                            <p>
                                {{config('setting.site.address')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info-item">
                        <div class="icon">
                            <img src="theme/img/bg/contact-info-icon-2.png" alt="" class="img-fluid">
                        </div>
                        <div class="text">
                            <h5>Email:</h5>
                            <p>{{config('setting.site.email')}}
                                <br>
                                {{config('setting.site.phone')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="google-map">
                        {!! config('setting.site.maps') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 contact-form-wrap">
                    <div class="contact-form">
                        <h5 class="inner-header-title">Форма связи</h5>
                        <form id="contactForm" action="{{route('contact.send')}}" enctype="multipart/form-data"
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"
                                               class="contact-form-control"
                                               name="name"
                                               placeholder="Имя *"
                                               value="{{old('name')}}"
                                        >
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"
                                               class="contact-form-control"
                                               name="email"
                                               placeholder="E-Mail *"
                                               value="{{old('email')}}"
                                        >
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text"
                                               class="contact-form-control"
                                               name="phone"
                                               placeholder="Телефон *"
                                               value="{{old('phone')}}"
                                        >
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="contact-form-control"
                                                  name="message"
                                                  cols="30"
                                                  rows="5"
                                                  placeholder="Сообщение *">{{old('message')}}</textarea>
                                        <i class="fa fa-envelope-open"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-alerts">
                                        @if(session('success'))
                                            <div class="success">
                                                <div
                                                    style="display: block;padding: 20px;font-size: 16px;margin-bottom: 20px;font-weight: 600;border-left: 4px solid #f27474;color: #ee4545;background: rgba(242, 116, 116, 0.1);">
                                                    <span>{{session('success')}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @error('name')
                                        <div class="error">
                                            <div class="email-invalid"><span>{{$message}}</span></div>
                                        </div>
                                        @enderror
                                        @error('email')
                                        <div class="error">
                                            <div class="email-invalid"><span>{{$message}}</span></div>
                                        </div>
                                        @enderror
                                        @error('phone')
                                        <div class="error">
                                            <div class="email-invalid"><span>{{$message}}</span></div>
                                        </div>
                                        @enderror
                                        @error('message')
                                        <div class="error">
                                            <div class="email-invalid"><span>{{$message}}</span></div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="primary-btn">
                                        <span>Send Message</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Contact Info Section End //-->
@endsection
