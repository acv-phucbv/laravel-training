<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillabel = [
        'name', 'email', 'comment', 'approve', 'post_id'
    ];

    public function post()
    {
        $this->belongsTo(\App\Models\Post::class);
    }
}
