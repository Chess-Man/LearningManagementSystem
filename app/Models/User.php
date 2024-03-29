<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userdetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function classstudent()
    {
        return $this->hasMany(ClassStudent::class);
    }

    public function studentfile()
    {
        return $this->hasMany(StudentFile::class);
    }
    
    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function testresult()
    {
        return $this->hasMany(TestResult::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
