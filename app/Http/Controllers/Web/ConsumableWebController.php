<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Consumable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ConsumableWebController extends Controller
{
    public function index()
    {
        $consumables = Consumable::orderByDesc('date')->paginate(15);
        return view('consumables.index', compact('consumables'));
    }

    public function create()
    {
        return view('consumables.create');
    }

    public function store(Request $request)
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
        Consumable::create($data);
        return redirect()->route('consumables.index')->with('status', 'Saved');
    }

    public function edit(Consumable $consumable)
    {
        return view('consumables.edit', compact('consumable'));
    }

    public function update(Request $request, Consumable $consumable)
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
        $consumable->update($data);
        return redirect()->route('consumables.index')->with('status', 'Updated');
    }

    public function destroy(Consumable $consumable)
    {
        $consumable->delete();
        return redirect()->route('consumables.index')->with('status', 'Deleted');
    }
}


