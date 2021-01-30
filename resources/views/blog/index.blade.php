@extends('welcome')
@section('title', $blog->seo_title)
@section('description', $blog->seo_description)
@section('content')
    @include('master.breadcrumb', [
     'h1' => 'Все статьи блога',
     'banner' => '',
     'breadcrumbs' => [
                [route('blog.all'), 'Все статьи'],
                [route('blog.index', $blog->id), $blog->name],
            ]
         ])
    <!--// Blog Sidebar Section Start //-->
    <section class="section padding-minus-90" id="blog-sidebar-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($blog->post() as $post)
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
                                            <a href="#">
                                                <span><i class="far fa-user"></i>
                                                    By {{$post->author_name}}
                                                </span>
                                            </a>
                                            <a href="{{route('blog.index', $blog->id)}}"><span><i class="far
                                            fa-bookmark"></i>{{$blog->name}}</span></a>
                                        </div>
                                        <h5>
                                            <a href="{{route('blog.show', $post->id)}}">
                                                {{$post->name}}
                                            </a>
                                        </h5>
                                        <p>
                                            {{mb_substr($post->excerpt, 0, 50)}} [..]
                                        </p>
                                        <a href="{{route('blog.show', $post->id)}}" class="blog-link">
                                            Перейти
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                {{ $blog->post()->links('master.pagination') }}
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
