<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderServiceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'result',
    ];
}
