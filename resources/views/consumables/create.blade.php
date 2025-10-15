@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">New Consumable</h1>
<form method="POST" action="{{ route('consumables.store') }}" class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow">
    @csrf
    <div>
        <label class="block text-sm">Date</label>
        <input type="date" name="date" value="{{ old('date', now()->toDateString()) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">ID</label>
        <input type="text" name="consumable_id" value="{{ old('consumable_id') }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Item Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Manufacturer</label>
        <input type="text" name="manufacturer" value="{{ old('manufacturer') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Serial No</label>
        <input type="text" name="serial_no" value="{{ old('serial_no') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">FNT PM</label>
        <input type="text" name="fnt_pm" value="{{ old('fnt_pm') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Vendor PM</label>
        <input type="text" name="vendor_pm" value="{{ old('vendor_pm') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Dismantle Site ID</label>
        <input type="text" name="dismantle_site_id" value="{{ old('dismantle_site_id') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Project Name</label>
        <input type="text" name="project_name" value="{{ old('project_name') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Send To</label>
        <input type="text" name="send_to" value="{{ old('send_to') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Send By</label>
        <input type="text" name="send_by" value="{{ old('send_by') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Challan No</label>
        <input type="text" name="challan_no" value="{{ old('challan_no') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Receiver</label>
        <input type="text" name="receiver" value="{{ old('receiver') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">UoM</label>
        <input type="text" name="uom" value="{{ old('uom') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Quantity</label>
        <input type="number" step="0.0001" name="quantity" value="{{ old('quantity') }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Status</label>
        <select name="status" class="w-full border rounded p-2">
            <option value="active">active</option>
            <option value="dismantled">dismantled</option>
            <option value="sent">sent</option>
        </select>
    </div>
    <div class="col-span-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('consumables.index') }}" class="ml-2 text-sm">Cancel</a>
    </div>
</form>
@endsection


