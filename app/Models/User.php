<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public $incrementing = false;
     protected $keyType = 'string';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'slug',
        'avatar',
        'status',
        'role',
        'gender',
        'dob',
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
    public function student (): HasOne
    {
        return $this->hasOne(Student::class, 'user_id');
    }
    public function instructor (): HasOne
    {
        return $this->hasOne(Instructor::class, 'user_id');
    }
    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class, 'user_id');
    }
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function dislikes(): MorphMany
    {
        return $this->morphMany(Dislike::class, 'dislikeable');
    }
}
