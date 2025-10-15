<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BillableMovement;
use App\Models\Consumable;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function summary(): JsonResponse
    {
        $billableCount = BillableMovement::count();
        $consumableCount = Consumable::count();
        $recentBillables = BillableMovement::orderByDesc('date')->limit(5)->get();
        $recentConsumables = Consumable::orderByDesc('date')->limit(5)->get();

        return response()->json([
            'counts' => [
                'billables' => $billableCount,
                'consumables' => $consumableCount,
            ],
            'recent' => [
                'billables' => $recentBillables,
                'consumables' => $recentConsumables,
            ],
        ]);
    }
}


