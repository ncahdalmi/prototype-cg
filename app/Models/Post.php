<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['author', 'category'];

    public function getRouteKeyName()
    {
        return 'post_code';
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'post_id');
    }

    public function media(){
        return $this->hasMany(Media::class, 'post_id');
    }
}
