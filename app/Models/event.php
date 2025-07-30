<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'start_time',
        'end_time',
        'is_public'
    ];

    public function organizer(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendees(): BelongsToMany {
        return $this->belongsToMany(User::class, 'event_attendees')->withTimestamps();
    }
}
