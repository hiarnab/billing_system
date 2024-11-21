<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function course()
    {
        return $this->hasOne(Course::class, 'course_id', 'id');
    }
}


