@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-semibold mb-4">Login</h1>
    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email','admin@local') }}" class="w-full border rounded p-2" required />
            @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm">Password</label>
            <input type="password" name="password" value="password" class="w-full border rounded p-2" required />
            @error('password')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center justify-between">
            <label class="text-sm"><input type="checkbox" name="remember" class="mr-1"> Remember me</label>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
        </div>
    </form>
</div>
@endsection


