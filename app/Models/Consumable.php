<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $fillable = [
        'date','consumable_id','name','manufacturer','serial_no','fnt_pm','vendor_pm','dismantle_site_id','project_name','send_to','send_by','challan_no','receiver','uom','quantity','created_by','status'
    ];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'decimal:4',
    ];
}


