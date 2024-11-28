<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageInstallment extends Model
{
    protected $fillable = [
        'package_id',
        'amount',
        'due_date',
        'payment_date',
        'fine',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    
}
