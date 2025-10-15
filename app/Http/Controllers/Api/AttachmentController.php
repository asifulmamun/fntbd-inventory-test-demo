<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AttachmentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(['message' => 'Attachments store not yet implemented.'], 501);
    }

    public function download(int $id)
    {
        return response()->json(['message' => 'Attachments download not yet implemented.'], 501);
    }
}


