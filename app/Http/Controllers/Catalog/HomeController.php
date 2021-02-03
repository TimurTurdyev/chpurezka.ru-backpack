<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Review;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'service' => Service::all(),
            'review' => Review::all(),
            'post' => Post::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
        ]);
    }
}
