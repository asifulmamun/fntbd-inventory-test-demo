<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillableMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'item_id', 'movement_type', 'purchase_received_from', 'received_by', 'received_location', 'challan_no', 'vendor_name', 'vendor_user', 'po', 'receiver_company', 'delivery_by', 'uom', 'quantity', 'created_by', 'notes'
    ];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'decimal:4',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}


