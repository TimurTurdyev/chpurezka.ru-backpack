@extends('welcome')
@section('title', $post->seo_title)
@section('description', $post->seo_description)
@section('content')
    @include('master.breadcrumb', [
     'h1' => 'Все статьи блога',
     'banner' => '',
     'breadcrumbs' => [
                [route('blog.all'), 'Все статьи'],
                [route('blog.index', $post->blog_id), $post->blog->name],
                [route('blog.show', $post->id), $post->name],
            ]
         ])
    <!--// Blog Sidebar Section Start //-->
    <section class="section padding-minus-90" id="blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-post-single">
                        <div class="blog-post-img">
                            <img src="{{asset('storage/'.$post->image)}}"
                                 alt="{{$post->name}}"
                                 class="img-fluid">
                            <div class="post-date">
                                <span class="far fa-calendar-alt"></span>
                                <a href="#">{{date('d M Y', strtotime($post->created_at))}}</a>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h4>{{$post->excerpt}}</h4>
                            <div class="author-meta">
                                @if($author = $post->author())
                                    <a href="#">
                                        <span class="far fa-user"></span>{{$author->name}}
                                    </a>
                                @endif
                                <a href="{{route('blog.index', $post->blog_id)}}">
                                    <span class="far fa-bookmark"></span>
                                    {{$post->blog->name}}
                                </a>
                            </div>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('master.blog_widget_sidebar', ['blog' => $post->blog])
                </div>
            </div>
        </div>
    </section>
    <!--// Blog Grid Sidebar End //-->
@endsection
