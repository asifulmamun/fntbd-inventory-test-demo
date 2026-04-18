<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::orderByDesc('id')->paginate(15);
        return view('tools.index', compact('tools'));
    }

    public function create()
    {
        return view('tools.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => ['nullable', 'string'],
            'item_name' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'in_qty' => ['required', 'integer'],
            'out_qty' => ['required', 'integer'],
            'qty' => ['nullable', 'integer'],
            'remarks' => ['nullable', 'string'],
        ]);

        // Generate random SKU if empty
        if (empty($data['sku'])) {
            $data['sku'] = 'SKU-' . now()->format('YmdHis') . '-' . rand(1000, 9999);
        }

        Tool::create($data);

        return redirect()->route('tools.index')->with('status', 'Saved');
    }

    public function edit($id)
    {
        $tool = Tool::findOrFail($id); // Fetch the tool by ID or throw a 404 error
        return view('tools.edit', ['tool' => $tool]);
    }

    public function update(Request $request, Tool $tool)
    {
        $data = $request->validate([
            'date' => ['required','date'],
            'tool_id' => ['required','string'],
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
            'remarks' => ['nullable','string'],
        ]);
        $tool->update($data);
        return redirect()->route('tools.index')->with('status', 'Updated');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('tools.index')->with('status', 'Deleted');
    }
}
