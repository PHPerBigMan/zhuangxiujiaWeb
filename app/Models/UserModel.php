<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = null;
    protected $guarded = ['id', 'user_pwd'];
    protected $hidden = [
        'user_pwd', 'remember_token',
    ];
}
