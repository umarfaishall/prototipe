<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailActivity extends Model
{
    use HasFactory;

    protected $table = 'detail_activity';

    protected $fillable = [
        'activity_id',
        'activity_date',
        'description',
    ];

    protected $casts = [
        'activity_date' => 'date',
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
