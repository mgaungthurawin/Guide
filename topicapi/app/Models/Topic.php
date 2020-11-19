<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic', 'category_id',
    ];
}
