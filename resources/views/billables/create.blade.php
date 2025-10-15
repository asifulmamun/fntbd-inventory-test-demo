@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">New Billable Movement</h1>
<form method="POST" action="{{ route('billables.store') }}" class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow">
    @csrf
    <div>
        <label class="block text-sm">Date</label>
        <input type="date" name="date" value="{{ old('date', now()->toDateString()) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Item ID</label>
        <input type="text" name="item_id" value="{{ old('item_id') }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Item Name</label>
        <input type="text" name="item_name" value="{{ old('item_name') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Movement Type</label>
        <select name="movement_type" class="w-full border rounded p-2">
            <option value="in" {{ old('movement_type')==='in'?'selected':'' }}>In</option>
            <option value="out" {{ old('movement_type')==='out'?'selected':'' }}>Out</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">Purchase / Received from</label>
        <input type="text" name="purchase_received_from" value="{{ old('purchase_received_from') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Received By</label>
        <input type="text" name="received_by" value="{{ old('received_by') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Received Location</label>
        <input type="text" name="received_location" value="{{ old('received_location') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Challan No</label>
        <input type="text" name="challan_no" value="{{ old('challan_no') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Vendor Name</label>
        <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Vendor User</label>
        <input type="text" name="vendor_user" value="{{ old('vendor_user') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">PO</label>
        <input type="text" name="po" value="{{ old('po') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Receiver Company</label>
        <input type="text" name="receiver_company" value="{{ old('receiver_company') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Delivery By</label>
        <input type="text" name="delivery_by" value="{{ old('delivery_by') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">UoM</label>
        <input type="text" name="uom" value="{{ old('uom') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Quantity</label>
        <input type="number" step="0.0001" name="quantity" value="{{ old('quantity') }}" class="w-full border rounded p-2" required />
    </div>
    <div class="col-span-2">
        <label class="block text-sm">Notes</label>
        <textarea name="notes" class="w-full border rounded p-2" rows="3">{{ old('notes') }}</textarea>
    </div>
    <div class="col-span-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('billables.index') }}" class="ml-2 text-sm">Cancel</a>
    </div>
</form>
@endsection


