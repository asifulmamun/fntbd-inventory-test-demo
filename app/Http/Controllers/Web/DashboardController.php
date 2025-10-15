<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BillableMovement;
use App\Models\Consumable;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'billables' => BillableMovement::count(),
            'consumables' => Consumable::count(),
        ];
        $recentBillables = BillableMovement::orderByDesc('date')->limit(5)->get();
        $recentConsumables = Consumable::orderByDesc('date')->limit(5)->get();
        return view('dashboard.index', compact('counts','recentBillables','recentConsumables'));
    }
}


