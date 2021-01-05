<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
