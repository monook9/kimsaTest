<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'allow_public_quotation',
        'allow_public_scheduling',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

}