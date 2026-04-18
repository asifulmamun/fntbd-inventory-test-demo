<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        return response()->json(Tool::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'in_qty' => 'required|integer',
            'out_qty' => 'required|integer',
            'qty' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        $tool = Tool::create($validated);

        return response()->json($tool, 201);
    }

    public function show(Tool $tool)
    {
        return response()->json($tool);
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'in_qty' => 'required|integer',
            'out_qty' => 'required|integer',
            'qty' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        $tool->update($validated);

        return response()->json($tool);
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return response()->json(null, 204);
    }
}
