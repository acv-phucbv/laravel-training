<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function isAdmin()
    {
        if(\Auth::check() && \Auth::user()->roles === 'admin') {
            return true;
        }
        return false;
    }
}
