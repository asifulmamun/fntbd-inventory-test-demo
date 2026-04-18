@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">New Tool</h1>
<form method="POST" action="{{ route('tools.store') }}" class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow">
    @csrf
    <div>
        <label class="block text-sm">SKU</label>
        <input type="text" name="sku" value="{{ old('sku') }}" class="w-full border rounded p-2" />
    </div>
    <div>
        <label class="block text-sm">Item Name</label>
        <input type="text" name="item_name" value="{{ old('item_name') }}" class="w-full border rounded p-2" required />
    </div>
    <div>
        <label class="block text-sm">Unit</label>
        <select name="unit" class="w-full border rounded p-2" required>
            <option value="pcs">pcs</option>
            <option value="m">m</option>
            <option value="kg">kg</option>
            <option value="set">set</option>
            <option value="ml">ml</option>
            <option value="ltr">ltr</option>
        </select>
    </div>
    <div>
        <label class="block text-sm">In Quantity</label>
        <input type="number" name="in_qty" value="{{ old('in_qty')  ?? 0}}" class="w-full border rounded p-2" required  min="0"/>
    </div>
    <div>
        <label class="block text-sm">Out Quantity</label>
        <input type="number" name="out_qty" value="{{ old('out_qty') ?? 0 }}" class="w-full border rounded p-2" required min="0" />
    </div>
    <div>
        <label class="block text-sm">Quantity</label>
        <input type="number" name="qty" value="{{ old('qty') ?? 0 }}" class="w-full border rounded p-2 text-gray-500 border-gray-300" readonly />
    </div>
    <div class="col-span-2">
        <label class="block text-sm">Remarks</label>
        <textarea name="remarks" class="w-full border rounded p-2">{{ old('remarks') }}</textarea>
    </div>
    <div class="col-span-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
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
            qtyInput.value = inQty - outQty;
            console.log(`Updated qty: ${qtyInput.value}`); // Debugging
        }

        // Ensure qty field remains readonly
        qtyInput.addEventListener('focus', (e) => e.target.blur());

        // Attach event listeners for real-time updates
        inQtyInput.addEventListener('input', updateQty);
        outQtyInput.addEventListener('input', updateQty);
    });
</script>
@endsection


