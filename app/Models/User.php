<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nit',
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'password_verified_at',
        'address',
        'city',
        'country',
        'postal',
        'about'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */

    public function names(){
        return $this->attributes['firstname']." ".$this->attributes['lastname'];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function groups()
    {
        return $this->hasMany(group::class);
    }

    public function group_student()
    {
        return $this->hasMany(GroupStudent::class);
    }

    public function qualifications()
    {
        return $this->hasMany(qualification::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
