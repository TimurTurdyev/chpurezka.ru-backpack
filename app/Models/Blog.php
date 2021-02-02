<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    public function categoriesList()
    {
        return $this->join('posts', 'blogs.id', '=', 'posts.blog_id')
            ->groupBy(['blogs.id', 'blogs.name'])
            ->orderBy('blogs.id')
            ->get([DB::raw('COUNT(posts.id) as total'), 'blogs.id', 'blogs.name']);
    }

    public function tagsList()
    {
        if ($this->id === null) {
            return Tag::join('tag_posts', 'tags.id', '=', 'tag_posts.tag_id')
                ->whereIn('tag_posts.post_id', function ($query) {
                    $query->select('posts.id')->from('posts')
                        ->where('posts.status', '=', 1);
                })->get();
        }

        return Tag::join('tag_posts', 'tags.id', '=', 'tag_posts.tag_id')
            ->whereIn('tag_posts.post_id', function ($query) {
                $query->select('posts.id')->from('posts')
                    ->where('posts.blog_id', '=', $this->id)
                    ->where('posts.status', '=', 1);
            })->get();
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post')->paginate(12);
    }
}
