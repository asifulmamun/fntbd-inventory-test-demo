<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ImportExportController extends Controller
{
    public function importBillables(Request $request): JsonResponse
    {
        return response()->json(['message' => 'Import billables not yet implemented.'], 501);
    }

    public function exportBillables(Request $request)
    {
        return response()->json(['message' => 'Export billables not yet implemented.'], 501);
    }

    public function importConsumables(Request $request): JsonResponse
    {
        return response()->json(['message' => 'Import consumables not yet implemented.'], 501);
    }

    public function exportConsumables(Request $request)
    {
        return response()->json(['message' => 'Export consumables not yet implemented.'], 501);
    }
}


