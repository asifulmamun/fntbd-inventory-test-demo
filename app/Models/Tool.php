<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'sku',
        'item_name',
        'unit',
        'in_qty',
        'out_qty',
        'qty',
        'remarks',
    ];
    
}
