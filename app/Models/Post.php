<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function comment()
    {
        return $this->hasMany(\App\Models\Comment::class)->orderBy('created_at', 'desc');
    }

}
