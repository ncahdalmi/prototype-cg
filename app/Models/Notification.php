<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'post'];

    public function notifMessage($type, $author)
    {
        switch ($type) {
            case 'like':
                return $author . ' liked your post';
            case 'comment':
                return $author . ' commented on your post';
            case 'follow':
                return $author . ' followed you';
            case 'mention':
                return $author . ' mentioned you in a post';
            case 'reply':
                return $author . ' replied to your comment';
            default:
                return $author . ' liked your post';
        }
    }

    public static function preventTwice($type, $from_user, $to_user_id, $post_id, $isMenfess = false)
    {
        if (!Notification::where('to_user_id', $to_user_id)->where('from_user_id', $from_user->id)->where('type', $type)->exists() || $from_user->id != $to_user_id || $isMenfess) {
            Notification::create([
                'to_user_id' => $to_user_id,
                'from_user_id' => $from_user->id,
                'from_username' => $from_user->username,
                'post_id' => $post_id,
                'type' => $type
            ]);
            return true;
        }
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
