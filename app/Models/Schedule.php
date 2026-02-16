<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tv_show_id',
        'episode_id',
        'start_time',
        'end_time',
        'day_of_week',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function tvShow()
    {
        return $this->belongsTo(TvShow::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}