<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile_number',
        'password',
        'role',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllUser()
    {
        return self::all();
    }
    
    Public function information()
    {
        return $this->hasOne(Information::class);
    }

    Public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function special()
    {
        return $this->hasOne(SpecialTraining::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->information || $user->course || $user->special) {
                $user->information->delete();
                $user->course->delete();
                $user->special->delete();
            }
        });
    }
}
