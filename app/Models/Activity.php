<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'pilar_name',
        'image_path',
        'volunteer_count',
        'domicile',
        'rally_point',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'task',
        'criteria',
        'registration_limit'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
        'registration_limit' => 'date',
    ];

    public function scopeClosed($query)
    {
        return $query->where('end_date', '<', Carbon::now());
    }

    public function scopeOpen($query)
    {
        return $query->where('end_date', '>=', Carbon::now());
    }
    
    public function user_activity()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function activity_registration()
    {
        return $this->hasMany(ActivityRegistration::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function detail_activity()
    {
        return $this->hasMany(DetailActivity::class);
    }
}
