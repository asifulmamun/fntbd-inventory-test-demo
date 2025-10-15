@extends('layouts.app')

@section('content')
<h1 class="text-xl font-semibold mb-4">Dashboard</h1>
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="bg-white p-4 rounded shadow">
        <div class="text-gray-500">Billables</div>
        <div class="text-2xl font-bold">{{ $counts['billables'] }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <div class="text-gray-500">Consumables</div>
        <div class="text-2xl font-bold">{{ $counts['consumables'] }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow col-span-2">
        <div class="font-semibold mb-2">Recent Billables</div>
        <table class="w-full text-sm">
            <thead>
            <tr class="text-left">
                <th class="p-2">Date</th>
                <th class="p-2">Item ID</th>
                <th class="p-2">Type</th>
                <th class="p-2">Qty</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recentBillables as $row)
                <tr class="border-t">
                    <td class="p-2">{{ $row->date->format('Y-m-d') }}</td>
                    <td class="p-2">{{ $row->item_id }}</td>
                    <td class="p-2">{{ strtoupper($row->movement_type) }}</td>
                    <td class="p-2">{{ $row->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="bg-white p-4 rounded shadow col-span-2">
        <div class="font-semibold mb-2">Recent Consumables</div>
        <table class="w-full text-sm">
            <thead>
            <tr class="text-left">
                <th class="p-2">Date</th>
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Qty</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recentConsumables as $row)
                <tr class="border-t">
                    <td class="p-2">{{ $row->date->format('Y-m-d') }}</td>
                    <td class="p-2">{{ $row->consumable_id }}</td>
                    <td class="p-2">{{ $row->name }}</td>
                    <td class="p-2">{{ $row->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


