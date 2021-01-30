@extends('welcome')
@section('title', 'Блог')
@section('description', 'Последние статьи в блоге')
@section('content')
    @include('master.breadcrumb', [
     'h1' => 'Все статьи блога',
     'banner' => '',
     'breadcrumbs' => [
                [route('blog.all'), 'Все статьи'],
            ]
         ])
    <!--// Blog Sidebar Section Start //-->
    <section class="section padding-minus-90" id="blog-sidebar-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="{{route('blog.show', $post->id)}}">
                                            <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->name}}"
                                                 class="img-fluid">
                                        </a>
                                        <span class="blog-date">{{date('D m', strtotime($post->created_at))}}</span>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            @if($author = $post->author())
                                                <a href="#">
                                                <span><i class="far fa-user"></i>
                                                    By {{$author->name}}
                                                </span>
                                                </a>
                                            @endif
                                            <a href="{{route('blog.show', $post->id)}}">
                                                <span><i class="far fa-bookmark"></i>{{$post->name}}</span>
                                            </a>
                                        </div>
                                        <h5>
                                            <a href="{{route('blog.show', $post->id)}}">
                                                {{$post->name}}
                                            </a>
                                        </h5>
                                        <p>
                                            {{mb_substr($post->excerpt, 0, 50)}} [..]
                                        </p>
                                        <a href="{{route('blog.show', $post->id)}}"
                                           class="blog-link">
                                            Перейти
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                {{ $posts->links('master.pagination') }}

                <!--// .pagination-wrap //-->
                </div>
                <div class="col-lg-4">
                    @include('master.blog_widget_sidebar', ['blog' => $blog])
                </div>
            </div>
        </div>
    </section>
    <!--// Blog Grid Sidebar End //-->
@endsection
