<div class="widget-sidebar">
    <div class="sidebar-widgets">
        <h5 class="inner-header-title">Поиск по блогу</h5>
        <form action="{{route('blog.all')}}" method="get">
            <div class="blog-search-bar position-relative">
                <input type="text" name="search" required="" placeholder="Search Here *"
                       class="search-form-control">
                <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span>
                </button>
            </div>
        </form>
    </div>
    <div class="sidebar-widgets">
        <h5 class="inner-header-title">Категории</h5>
        <ul class="sidebar-category-list clearfix">
            @foreach($blog->categoriesList() as $category)
                <li>
                    <a href="{{route('blog.index', $category->id)}}">
                        {{$category->name}}
                        <span class="category-count">({{$category->total}})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-widgets tag-widgets">
        <h5 class="inner-header-title">Тэги</h5>
        <ul class="sidebar-tags clearfix">
            @foreach($blog->tagsList() as $tag)
                <li>
                    <a href="{{route('blog.tag', $tag->id)}}">{{$tag->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>