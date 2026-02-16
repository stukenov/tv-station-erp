<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'tv_show_id',
        'date',
        'viewers',
        'rating_value',
        'audience_share',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
        'rating_value' => 'float',
        'audience_share' => 'float',
    ];

    public function tvShow()
    {
        return $this->belongsTo(TvShow::class);
    }
}