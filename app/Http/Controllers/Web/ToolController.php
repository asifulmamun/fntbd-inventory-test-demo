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
            'sku' => ['required', 'string'],
            'item_name' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'in_qty' => ['required', 'integer'],
            'out_qty' => ['required', 'integer'],
            'qty' => ['r', 'integer'],
            'remarks' => ['nullable', 'string'],
        ]);

        $tool->update($data);
        return redirect()->route('tools.index');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('tools.index')->with('status', 'Deleted');
    }
}
