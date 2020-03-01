<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingsSummary extends Model 
{
    protected $table = 'ratings_summary';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avg',
        'count',
    ];

    protected $hidden = [
        'id'
    ];

}