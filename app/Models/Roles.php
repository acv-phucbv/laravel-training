<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Roles extends Model
{
    public function user()
    {
        return $this->hasMany(\App\User::class, 'role_id');
    }
}
