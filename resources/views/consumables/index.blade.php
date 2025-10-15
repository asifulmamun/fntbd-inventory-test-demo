@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-xl font-semibold">Consumables</h1>
    <a href="{{ route('consumables.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded text-sm">New</a>
  </div>
<div class="bg-white rounded shadow">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left">
                <th class="p-2">Date</th>
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">UoM</th>
                <th class="p-2">Qty</th>
                <th class="p-2">Status</th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($consumables as $row)
            <tr class="border-t">
                <td class="p-2">{{ $row->date->format('Y-m-d') }}</td>
                <td class="p-2">{{ $row->consumable_id }}</td>
                <td class="p-2">{{ $row->name }}</td>
                <td class="p-2">{{ $row->uom }}</td>
                <td class="p-2">{{ $row->quantity }}</td>
                <td class="p-2">{{ $row->status }}</td>
                <td class="p-2 text-right space-x-2">
                    <a href="{{ route('consumables.edit',$row) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('consumables.destroy',$row) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-3">{{ $consumables->links() }}</div>
  </div>
@endsection


