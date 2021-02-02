<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'posts';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];


    public function setAuthorIdAttribute($value)
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$value) {
            $value = backpack_user()->id;
        }
        $this->attributes['author_id'] = $value ?? 0;
    }

    public function authorId()
    {
        return $this->belongsTo('App\Models\User', 'author_id', 'id');
    }

    public function author()
    {
        return User::where('id', $this->author_id)
            ->first(['name', 'id']);
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag', 'App\Models\TagPost');
    }
}
