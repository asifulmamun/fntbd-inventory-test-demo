<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FNTBD Inventory Management' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('head')
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@2.2.1/dist/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        // Initialize sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('[data-drawer-toggle="sidebar"]');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
            @auth
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gradient-to-b from-blue-600 to-blue-700 shadow-xl" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <!-- Logo Section -->
            <div class="flex items-center pl-2.5 mb-8">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
                    <img src="/public/fntbd.png">
                    
                </div>
                <div class="ml-3">
                    <h1 class="text-xl font-bold text-white">FNTBD Inventory</h1>
                    <p class="text-blue-100 text-xs">Management System</p>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-chart-pie w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('billables.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('billables.*') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-receipt w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Supply</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tools.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('tools.*') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-shopping-cart w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Tools</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('consumables.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('consumables.*') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-shopping-cart w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Tools Old</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('consumables.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('consumables.*') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-shopping-cart w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Rollout</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('consumables.index') }}" class="flex items-center p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group {{ request()->routeIs('consumables.*') ? 'bg-white bg-opacity-20 shadow-lg' : '' }}">
                        <i class="fas fa-shopping-cart w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Users</span>
                    </a>
                </li>
            </ul>
            
            <!-- User Profile & Logout -->
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <div class="bg-white bg-opacity-10 rounded-lg p-3 mb-3">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-semibold text-sm">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-white text-sm font-medium">{{ auth()->user()->name ?? 'User' }}</p>
                            <p class="text-blue-100 text-xs">Administrator</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-white hover:bg-opacity-10 transition-all duration-200 group">
                        <i class="fas fa-sign-out-alt w-5 h-5 text-blue-100 group-hover:text-white"></i>
                        <span class="ml-3 font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main content -->
    <div class="p-4 sm:ml-64">
        <!-- Top bar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button type="button" data-drawer-toggle="sidebar" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title ?? 'Dashboard' }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Welcome back, {{ auth()->user()->name ?? 'User' }}!</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button type="button" class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
                    </button>
                    
                    <!-- User Profile Dropdown -->
                    <div class="relative">
                        <button type="button" class="flex text-sm bg-gray-100 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom-end">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                <span class="text-sm font-medium text-white">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</span>
                            </div>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name ?? 'User' }}</span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email ?? 'user@example.com' }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            @if(session('status'))
                <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 border border-green-200" role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    @else
    <!-- Public layout for non-authenticated users -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-boxes text-white text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h1 class="text-xl font-bold text-gray-900">Inventory Management</h1>
                                <p class="text-xs text-gray-500">Professional System</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Main content -->
        <main>
            @yield('content')
        </main>
    </div>
    @endauth
</body>
</html>


