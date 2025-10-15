<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Consumable;
use Illuminate\Validation\Rule;

class ConsumableController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $results = Consumable::query()
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->string('status')))
            ->orderByDesc('date')
            ->paginate(15);
        return response()->json($results);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(['message' => 'Consumables show not yet implemented.'], 501);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'date' => ['required','date'],
            'consumable_id' => ['required','string'],
            'name' => ['required','string'],
            'manufacturer' => ['nullable','string'],
            'serial_no' => ['nullable','string'],
            'fnt_pm' => ['nullable','string'],
            'vendor_pm' => ['nullable','string'],
            'dismantle_site_id' => ['nullable','string'],
            'project_name' => ['nullable','string'],
            'send_to' => ['nullable','string'],
            'send_by' => ['nullable','string'],
            'challan_no' => ['nullable','string'],
            'receiver' => ['nullable','string'],
            'uom' => ['nullable','string'],
            'quantity' => ['required','numeric'],
            'status' => ['nullable', Rule::in(['active','dismantled','sent'])],
        ]);
        $data['created_by'] = Auth::id();
        $consumable = Consumable::create($data);
        return response()->json($consumable, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $consumable = Consumable::findOrFail($id);
        $data = $request->validate([
            'date' => ['sometimes','date'],
            'consumable_id' => ['sometimes','string'],
            'name' => ['sometimes','string'],
            'manufacturer' => ['nullable','string'],
            'serial_no' => ['nullable','string'],
            'fnt_pm' => ['nullable','string'],
            'vendor_pm' => ['nullable','string'],
            'dismantle_site_id' => ['nullable','string'],
            'project_name' => ['nullable','string'],
            'send_to' => ['nullable','string'],
            'send_by' => ['nullable','string'],
            'challan_no' => ['nullable','string'],
            'receiver' => ['nullable','string'],
            'uom' => ['nullable','string'],
            'quantity' => ['sometimes','numeric'],
            'status' => ['nullable', Rule::in(['active','dismantled','sent'])],
        ]);
        $consumable->update($data);
        return response()->json($consumable);
    }

    public function destroy(int $id): JsonResponse
    {
        $consumable = Consumable::findOrFail($id);
        $consumable->delete();
        return response()->json(['message' => 'Deleted']);
    }
}


