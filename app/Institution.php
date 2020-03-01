<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
    ];

    // public function providers() 
    // {
    //     return $this->belongsToMany(Provider::class);
    // }

}