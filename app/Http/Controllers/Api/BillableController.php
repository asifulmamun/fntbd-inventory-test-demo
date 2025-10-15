<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\BillableMovement;
use Illuminate\Validation\Rule;

class BillableController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = BillableMovement::query();
        if ($request->filled('item_id')) {
            $query->where('item_id', $request->string('item_id'));
        }
        if ($request->filled('type')) {
            $query->where('movement_type', $request->string('type'));
        }
        if ($request->filled('date_from')) {
            $query->whereDate('date', '>=', $request->date('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date', '<=', $request->date('date_to'));
        }
        $results = $query->orderByDesc('date')->paginate(15);
        return response()->json($results);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(['message' => 'Billables show not yet implemented.'], 501);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'date' => ['required','date'],
            'item_id' => ['required','string'],
            'movement_type' => ['required', Rule::in(['in','out'])],
            'purchase_received_from' => ['nullable','string'],
            'received_by' => ['nullable','string'],
            'received_location' => ['nullable','string'],
            'challan_no' => ['nullable','string'],
            'vendor_name' => ['nullable','string'],
            'vendor_user' => ['nullable','string'],
            'po' => ['nullable','string'],
            'receiver_company' => ['nullable','string'],
            'delivery_by' => ['nullable','string'],
            'uom' => ['nullable','string'],
            'quantity' => ['required','numeric'],
            'notes' => ['nullable','string'],
        ]);
        $data['created_by'] = Auth::id();
        $movement = BillableMovement::create($data);
        return response()->json($movement, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $movement = BillableMovement::findOrFail($id);
        $data = $request->validate([
            'date' => ['sometimes','date'],
            'item_id' => ['sometimes','string'],
            'movement_type' => ['sometimes', Rule::in(['in','out'])],
            'purchase_received_from' => ['nullable','string'],
            'received_by' => ['nullable','string'],
            'received_location' => ['nullable','string'],
            'challan_no' => ['nullable','string'],
            'vendor_name' => ['nullable','string'],
            'vendor_user' => ['nullable','string'],
            'po' => ['nullable','string'],
            'receiver_company' => ['nullable','string'],
            'delivery_by' => ['nullable','string'],
            'uom' => ['nullable','string'],
            'quantity' => ['sometimes','numeric'],
            'notes' => ['nullable','string'],
        ]);
        $movement->update($data);
        return response()->json($movement);
    }

    public function destroy(int $id): JsonResponse
    {
        $movement = BillableMovement::findOrFail($id);
        $movement->delete();
        return response()->json(['message' => 'Deleted']);
    }
}


