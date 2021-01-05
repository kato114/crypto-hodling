<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'portfolio_id');
    }
}
