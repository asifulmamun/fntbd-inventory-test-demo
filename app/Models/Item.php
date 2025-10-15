<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'name', 'uom', 'description', 'type',
    ];

    protected $casts = [
        'item_id' => 'string',
    ];

    public function billableMovements()
    {
        return $this->hasMany(BillableMovement::class, 'item_id', 'item_id');
    }
}


