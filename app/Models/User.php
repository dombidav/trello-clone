<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ApiResource;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'remember_token',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function owning(): HasMany {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }



}
