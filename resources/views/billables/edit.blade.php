@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">Edit Billable Movement</h1>
<form method="POST" action="{{ route('billables.update',$billable) }}" class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow">
    @csrf @method('PUT')
    <div>
        <label class="block text-sm">Date</label>
        <input type="date" name="date" value="{{ old('date', optional($billable->date)->toDateString()) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Item ID</label>
        <input type="text" name="item_id" value="{{ old('item_id', $billable->item_id) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Movement Type</label>
        <select name="movement_type" class="w-full border rounded p-2">
            <option value="in" {{ old('movement_type',$billable->movement_type)==='in'?'selected':'' }}>In</option>
            <option value="out" {{ old('movement_type',$billable->movement_type)==='out'?'selected':'' }}>Out</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">UoM</label>
        <input type="text" name="uom" value="{{ old('uom', $billable->uom) }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Quantity</label>
        <input type="number" step="0.0001" name="quantity" value="{{ old('quantity', $billable->quantity) }}" class="w-full border rounded p-2" required />
    </div>
    <div class="col-span-2">
        <label class="block text-sm">Notes</label>
        <textarea name="notes" class="w-full border rounded p-2" rows="3">{{ old('notes',$billable->notes) }}</textarea>
    </div>
    <div class="col-span-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('billables.index') }}" class="ml-2 text-sm">Cancel</a>
    </div>
</form>
@endsection


