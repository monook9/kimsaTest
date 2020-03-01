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
        'setting_id',
    ];

    protected $hidden = [
        'institution_id',
        'user_id',
        'ratings_summary_id',
        'setting_id',
        'created_at',
        'updated_at'
    ];

    public function institution() 
    {
        return $this->belongsTo(Institution::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function ratings_summary() 
    {
        return $this->belongsTo(RatingsSummary::class);
    }

    public function setting() 
    {
        return $this->belongsTo(Setting::class);
    }

}