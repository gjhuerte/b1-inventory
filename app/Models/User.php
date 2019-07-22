<?php

namespace App\Models;

use App\Enums\User\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Additional columns after querying
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    /**
     * Checks if the current authenticated user is an admin
     *
     * @return boolean
     */
    public function isAdmin() 
    {
        return Auth::check() && optional($this)->type == Type::ADMIN;
    }
}
