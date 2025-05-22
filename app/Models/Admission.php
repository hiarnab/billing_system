<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
       'id',
    'student_id',
    'course_id',
    'package_id',
    'package_installment_id',
    'amount',
    'gst',
    'total',
    'grand_total',
    'created_at',
    'updated_at'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function package_installmens()
    {
        return $this->belongsTo(PackageInstallment::class, 'package_installment_id');
    }
}
