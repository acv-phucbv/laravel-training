<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function post()
    {
        return $this->hasOne(Post::class);
    }
}