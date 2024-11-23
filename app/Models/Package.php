<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'base_price',
        'discount_percentage',
        'net_price',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');

    }
}


