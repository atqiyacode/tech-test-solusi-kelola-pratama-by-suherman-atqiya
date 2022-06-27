<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceHeader extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'service_name',
        'mandatory',
        'package_id',
        'debitur_type_id',
        'service_price_amount',
        'service_discount_amount',
        'status',
        'created_by',
        'updated_by',
    ];


    public function details()
    {
        return $this->hasMany(ServiceDetail::class, 'service_id', 'id')->with(['children'])->where(
            [
                'status' => 'ACTIVE',
                'group' => 'parent'
            ]
        );
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }
}
