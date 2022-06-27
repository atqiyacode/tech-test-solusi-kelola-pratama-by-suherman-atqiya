<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'group',
        'description',
        'mandatory',
        'sequence',
        'parent',
        'type',
        'is_multiple',
        'remark',
        'status',
        'created_by',
        'updated_by',
    ];


    public function children()
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }
    public function scopeParent($query)
    {
        return $query->where('group', 'parent');
    }
}
