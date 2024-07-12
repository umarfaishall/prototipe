<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRegistration extends Model
{
    use HasFactory;

    protected $table = 'activity_registrations';

    protected $fillable = [
        'activity_id',
        'user_id',
        'full_name',
        'email',
        'phone',
        'reason_1',
        'reason_2',
        'status',
        'evaluation',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
