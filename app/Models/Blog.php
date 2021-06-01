<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories')->withTimestamps();
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags')->withTimestamps();
    }
}
