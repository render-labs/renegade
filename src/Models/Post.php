<?php

namespace RenderLabs\Renegade\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    /**
     * Author of a post
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
