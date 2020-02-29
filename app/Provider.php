<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_id',
        'user_id',
        'ratings_summary_id',
        'settings_id',
    ];

}