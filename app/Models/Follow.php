<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['following', 'follower'];

    public function following()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'whoami_user_id');
    }
}
