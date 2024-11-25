<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillableItem extends Model
{
    protected $fillable = [
        'package_id',
        'item_name',
        'amount',
        'gst',
    ];
    

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}
