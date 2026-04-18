@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">Edit Tool</h1>
<form method="POST" action="{{ route('tools.update', $tool->id) }}" class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow">
    @csrf @method('PUT')
    <div>
        <label class="block text-sm">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $tool->sku) }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Item Name</label>
        <input type="text" name="item_name" value="{{ old('item_name', $tool->item_name) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Unit</label>
        <select name="unit" class="w-full border rounded p-2" required>
            <option value="pcs" {{ old('unit', $tool->unit) === 'pcs' ? 'selected' : '' }}>pcs</option>
            <option value="m" {{ old('unit', $tool->unit) === 'm' ? 'selected' : '' }}>m</option>
            <option value="kg" {{ old('unit', $tool->unit) === 'kg' ? 'selected' : '' }}>kg</option>
            <option value="set" {{ old('unit', $tool->unit) === 'set' ? 'selected' : '' }}>set</option>
            <option value="ml" {{ old('unit', $tool->unit) === 'ml' ? 'selected' : '' }}>ml</option>
            <option value="ltr" {{ old('unit', $tool->unit) === 'ltr' ? 'selected' : '' }}>ltr</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">In Quantity</label>
        <input type="number" name="in_qty" value="{{ old('in_qty', $tool->in_qty) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Out Quantity</label>
        <input type="number" name="out_qty" value="{{ old('out_qty', $tool->out_qty) }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Quantity</label>
        <input type="number" name="qty" value="{{ old('qty', $tool->qty) }}" class="w-full border rounded p-2" readonly />
    </div>
    <div class="col-span-2">
        <label class="block text-sm">Remarks</label>
        <textarea name="remarks" class="w-full border rounded p-2">{{ old('remarks', $tool->remarks) }}</textarea>
    </div>
    <div class="col-span-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('tools.index') }}" class="ml-2 text-sm">Cancel</a>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inQtyInput = document.querySelector('input[name="in_qty"]');
        const outQtyInput = document.querySelector('input[name="out_qty"]');
        const qtyInput = document.querySelector('input[name="qty"]');

        function updateQty() {
            const inQty = parseInt(inQtyInput.value) || 0;
            const outQty = parseInt(outQtyInput.value) || 0;
            const currentQty = parseInt(qtyInput.dataset.originalQty) || 0;
            qtyInput.value = currentQty + inQty - outQty;
        }

        // Store the original qty value for calculations
        qtyInput.dataset.originalQty = qtyInput.value;

        // Attach event listeners for real-time updates
        inQtyInput.addEventListener('input', updateQty);
        outQtyInput.addEventListener('input', updateQty);
    });
</script>
@endsection


