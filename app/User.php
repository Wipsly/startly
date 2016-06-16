<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use HipsterJazzbo\Landlord\BelongsToTenant;

class User extends Authenticatable
{
    use BelongsToTenant;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the company that owns the user.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
