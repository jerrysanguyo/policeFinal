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

    public function course_extn()
    {
        return $this->hasOne(CourseExtension::class);
    }

    public function special()
    {
        return $this->hasMany(SpecialTraining::class);
    }

    public function physical()
    {
        return $this->hasOne(Physical::class);
    }
    
    public function physical_pic()
    {
        return $this->hasMany(Physical_picture::class);
    }

    public function physical_pft()
    {
        return $this->hasMany(Physical_pft::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->information || $user->course || $user->course_extn || $user->special || $user->physical || $user->physica_pic || $user->physical_pft) {
                $user->information->delete();
                $user->course->delete();
                $user->course_extn->delete();
                $user->special->delete();
                $user->physical->delete();
                $user->physical_pic->delete();
                $user->physical_pft->delete();
            }
        });
    }
}
