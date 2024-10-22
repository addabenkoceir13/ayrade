<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'status',
        'role',
        'password',
    ];

    protected $softCascade = ['task'];

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

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    public function isActive(): bool
    {
        return $this->status === 'active';
    }
    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }
    public function isUser(): bool
    {
        return $this->role === 'user';
    }
    public function isActiveUser(): bool
    {
        return $this->isActive() && $this->isUser();
    }
    public function isInactiveUser(): bool
    {
        return $this->isInactive() && $this->isUser();
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
