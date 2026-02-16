<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>
<body class="h-full font-sans antialiased">
    <div id="app" class="min-h-full">
        <header class="bg-white bg-opacity-80 backdrop-blur-lg border-b border-gray-200 sticky top-0 z-50">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{ mobileMenuOpen: false, hrmMenuOpen: false }">
                <div class="flex h-16 justify-between items-center">
                    <div class="flex">
                        <div class="flex flex-shrink-0 items-center">
                            <a href="{{ url('/') }}" class="text-2xl font-semibold text-gray-900">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                        <div class="hidden md:ml-6 md:flex md:space-x-8">
                            <a href="{{ route('tv_shows.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('tv_shows*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">TV Shows</a>
                            <a href="{{ route('episodes.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('episodes*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Episodes</a>
                            <a href="{{ route('schedules.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('schedules*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Schedules</a>
                            <a href="{{ route('advertisers.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('advertisers*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Advertisers</a>
                            <a href="{{ route('advertisements.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('advertisements*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Advertisements</a>
                            <a href="{{ route('ratings.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('ratings*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Ratings</a>
                            <a href="{{ route('staff.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::is('staff*') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">Staff</a>
                            <div class="relative" x-data="{ hrmMenuOpen: false }">
                                <button @click="hrmMenuOpen = !hrmMenuOpen" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    HRM
                                    <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="hrmMenuOpen" @click.away="hrmMenuOpen = false" class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <a href="{{ route('leaves.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Leaves</a>
                                    <a href="{{ route('performance_reviews.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Performance Reviews</a>
                                    <a href="{{ route('trainings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Trainings</a>
                                    <a href="{{ route('attendances.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Attendances</a>
                                    <a href="{{ route('payrolls.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Payrolls</a>
                                    <a href="{{ route('recruitments.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Recruitments</a>
                                    <a href="{{ route('benefits.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Benefits</a>
                                    <a href="{{ route('employees.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Employees</a>
                                    <a href="{{ route('departments.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Departments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 inline-flex items-center justify-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="relative ml-3" x-data="{ open: false }">
                                <div>
                                    <button @click="open = !open" type="button" class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </button>
                                </div>
                                <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="md:hidden" id="mobile-menu" x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false">
                    <div class="space-y-1 pt-2 pb-3">
                        <a href="{{ route('tv_shows.index') }}" class="block border-l-4 {{ Request::is('tv_shows*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">TV Shows</a>
                        <a href="{{ route('episodes.index') }}" class="block border-l-4 {{ Request::is('episodes*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Episodes</a>
                        <a href="{{ route('schedules.index') }}" class="block border-l-4 {{ Request::is('schedules*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Schedules</a>
                        <a href="{{ route('advertisers.index') }}" class="block border-l-4 {{ Request::is('advertisers*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Advertisers</a>
                        <a href="{{ route('advertisements.index') }}" class="block border-l-4 {{ Request::is('advertisements*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Advertisements</a>
                        <a href="{{ route('ratings.index') }}" class="block border-l-4 {{ Request::is('ratings*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Ratings</a>
                        <a href="{{ route('staff.index') }}" class="block border-l-4 {{ Request::is('staff*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Staff</a>
                        <div class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 py-2 pl-3 pr-4 text-base font-medium">
                            <button @click="hrmMenuOpen = !hrmMenuOpen" class="w-full text-left">HRM</button>
                            <div x-show="hrmMenuOpen" @click.away="hrmMenuOpen = false" class="mt-2 space-y-1">
                                <a href="{{ route('leaves.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Leaves</a>
                                <a href="{{ route('performance_reviews.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Performance Reviews</a>
                                <a href="{{ route('trainings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Trainings</a>
                                <a href="{{ route('attendances.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Attendances</a>
                                <a href="{{ route('payrolls.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Payrolls</a>
                                <a href="{{ route('recruitments.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Recruitments</a>
                                <a href="{{ route('benefits.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Benefits</a>
                                <a href="{{ route('employees.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Employees</a>
                                <a href="{{ route('departments.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Departments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
