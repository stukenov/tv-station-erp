<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'duration',
        'air_time',
        'status',
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}