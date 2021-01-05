<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'password',
        'location',
        'phonenumber',
        'bio',
        'facebook',
        'twitter',
        'dribbble',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'user_id')->orderBy('created_at', 'desc');
    }

    public function followers()
    {
        return $this->hasMany(Follower::class, 'follower_id');
    }

    public function getProfilePhotoUrlAttribute()
    {

    }
}
    