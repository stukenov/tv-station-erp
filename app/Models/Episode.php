<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'tv_show_id',
        'title',
        'description',
        'season_number',
        'episode_number',
        'air_date',
        'duration',
    ];

    protected $casts = [
        'air_date' => 'date',
    ];

    public function tvShow()
    {
        return $this->belongsTo(TvShow::class);
    }
}