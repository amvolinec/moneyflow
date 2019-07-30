<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'published_at', 'channel_id', 'thumbnail', 'title', 'description', 'channel_title', 'playlist_id',
        'video_id', 'views', 'likes', 'dislikes', 'favorite', 'comment', 'lang', 'category', 'publisher_name', 'tags',
    ];
}
