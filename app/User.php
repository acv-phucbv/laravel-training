<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'username', 'email', 'password', 'firstname', 'lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsTo(\App\Models\Roles::class, 'id');
    }

    public function isAdmin()
    {
        if (Auth::guest()) {
            return false;
        } else {
            foreach ($this->roles()->get() as $role)
            {
                if ($role->name == 'admin')
                {
                    return true;
                }
            }
            return false;
        }


    }

    public function isAuthor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'author')
            {
                return true;
            }
        }

        return false;
    }


}
