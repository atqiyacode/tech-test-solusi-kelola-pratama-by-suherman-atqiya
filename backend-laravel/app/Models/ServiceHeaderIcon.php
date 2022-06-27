<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHeaderIcon extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon_link',
        'service_header_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
