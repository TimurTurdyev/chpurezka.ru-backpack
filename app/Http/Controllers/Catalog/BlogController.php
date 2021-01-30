<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;

class BlogController extends Controller
{
    public function all()
    {
        return view('blog.all', [
            'blog' => new Blog(),
            'posts' => Post::where('status', 1)->paginate()
        ]);
    }

    public function index(Blog $blog)
    {
        return view('blog.index', [
            'blog' => $blog
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.show', [
            'post' => $post
        ]);
    }
    public function tag(Post $post)
    {
        dd('В процессе...');
    }
}
