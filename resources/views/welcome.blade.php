@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Modern Inventory</span>
                        <span class="block text-blue-600 xl:inline">Management System</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Streamline your inventory tracking with our professional, efficient system designed for modern businesses. Track billables and consumables with ease.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition-all duration-200 shadow-lg hover:shadow-xl">
                                <i class="fas fa-rocket mr-2"></i>
                                Get Started
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition-all duration-200">
                                <i class="fas fa-play mr-2"></i>
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <div class="h-56 w-full bg-gradient-to-r from-blue-400 to-blue-600 sm:h-72 md:h-96 lg:w-full lg:h-full flex items-center justify-center">
            <div class="text-white text-center">
                <i class="fas fa-chart-line text-8xl mb-4 opacity-80"></i>
                <p class="text-xl font-semibold">Analytics Dashboard</p>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id="features" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Powerful Features
            </h2>
            <p class="mt-4 text-lg text-gray-500">
                Everything you need to manage your inventory efficiently
            </p>
        </div>

        <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Billables Feature -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200">
                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 rounded-lg mb-6">
                    <i class="fas fa-receipt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Billable Items</h3>
                <p class="text-gray-600 mb-6">Track items that can be billed to customers with detailed pricing and quantity management.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-blue-600 mr-2"></i>
                        Real-time tracking
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-blue-600 mr-2"></i>
                        Automated billing
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-blue-600 mr-2"></i>
                        Detailed reports
                    </li>
                </ul>
            </div>

            <!-- Consumables Feature -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-green-200">
                <div class="flex items-center justify-center w-12 h-12 bg-green-600 rounded-lg mb-6">
                    <i class="fas fa-shopping-cart text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Consumable Items</h3>
                <p class="text-gray-600 mb-6">Manage items that are consumed during operations with smart inventory alerts.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-600 mr-2"></i>
                        Low stock alerts
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-600 mr-2"></i>
                        Usage tracking
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-600 mr-2"></i>
                        Cost analysis
                    </li>
                </ul>
            </div>

            <!-- Analytics Feature -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-200">
                <div class="flex items-center justify-center w-12 h-12 bg-purple-600 rounded-lg mb-6">
                    <i class="fas fa-chart-pie text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Analytics Dashboard</h3>
                <p class="text-gray-600 mb-6">Get insights into your inventory with comprehensive analytics and reporting.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-purple-600 mr-2"></i>
                        Visual reports
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-purple-600 mr-2"></i>
                        Trend analysis
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-purple-600 mr-2"></i>
                        Export data
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-700">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                Ready to get started?
            </h2>
            <p class="mt-4 text-xl text-blue-100">
                Join thousands of businesses already using our inventory management system.
            </p>
            <div class="mt-8">
                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Start Your Free Trial
                </a>
            </div>
        </div>
    </div>
</div>
@endsection