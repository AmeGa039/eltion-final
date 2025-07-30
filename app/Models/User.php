<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    public function events(): HasMany {
        return $this->hasMany(Event::class);
    }

    public function attending(): BelongsToMany {
        return $this->belongsToMany(Event::class, 'event_attendees')->withTimestamps();
    }
}
