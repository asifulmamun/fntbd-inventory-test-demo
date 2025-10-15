<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BillableMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BillableWebController extends Controller
{
    public function index()
    {
        $billables = BillableMovement::orderByDesc('date')->paginate(15);
        return view('billables.index', compact('billables'));
    }

    public function create()
    {
        return view('billables.create');
    }

    public function store(Request $request)
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
        BillableMovement::create($data);
        return redirect()->route('billables.index')->with('status', 'Saved');
    }

    public function edit(BillableMovement $billable)
    {
        return view('billables.edit', compact('billable'));
    }

    public function update(Request $request, BillableMovement $billable)
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
        $billable->update($data);
        return redirect()->route('billables.index')->with('status', 'Updated');
    }

    public function destroy(BillableMovement $billable)
    {
        $billable->delete();
        return redirect()->route('billables.index')->with('status', 'Deleted');
    }
}


