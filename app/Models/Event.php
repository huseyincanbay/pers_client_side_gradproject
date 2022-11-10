<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'is_verified' => 'boolean',
    ];

    protected $appends = [
        'assigned_agents'
    ];

    protected $attributes = [
        'status_id' => 3,
        'visibility' => '2'
    ];

    protected $fillable = [
        'title',
        'note',
        'visibility',
        'location',
        'department_id',
        'division_id',
        'status_id',
        'created_by',
        'latitude',
        'longitude',
        'address'
    ];

    public function getTitleAttribute($value) {
        return ucwords($value);
    }

    public function getCreatedAtAttribute($value) {
        $date = Carbon::createFromTimestamp(strtotime($value), env("APP_TIMEZONE"));
        if($date->isToday()) {
            return $date->format('\\T\\o\\d\\a\\y H:i:s ');
        } elseif($date->isYesterday()) {
            return $date->format('\\Y\\e\\s\\t\\e\\r\\d\\a\\y H:i:s');
        } else {
            return $date->format('d-m-Y H:i:s ');
        }

    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::createFromTimestamp(strtotime($value), env("APP_TIMEZONE"))->toDateTimeString();
    }

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function division(): BelongsTo {
        return $this->belongsTo(Division::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function status()
    {
        return $this->belongsTo(EventStatus::class);
    }

    /*protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i:s');
    }*/
}
