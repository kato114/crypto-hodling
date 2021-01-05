<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    public function portfolio()
    {
        return $this->hasOne(Portfolio::class, 'id', 'portfolio_id');
    }

    public function coin()
    {
    	return $this->hasOne(Coins::class, 'sterm', 'type');
    }
}
