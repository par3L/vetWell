<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - VetWell Clinic</title>
    <link rel="icon" type="image/png" href="{{ asset('logo2.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800 bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC]">
    
    <div class="min-h-screen flex">
        <!-- sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-[#E5F0ED] transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex flex-col h-full">
                <!-- logo -->
                <div class="flex items-center justify-between h-20 px-6 border-b border-[#E5F0ED]">
                    <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="VetWell" class="h-12 w-auto">
                    </a>
                    <button id="sidebar-close" class="lg:hidden text-[#5A7A76] hover:text-[#2D7A6E]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- nav -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.index') ? 'bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white shadow-lg' : 'text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-semibold">Dashboard</span>
                    </a>

                    <a href="{{ route('pets.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('pets.*') ? 'bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white shadow-lg' : 'text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                        </svg>
                        <span class="font-semibold">Hewan Peliharaan</span>
                    </a>

                    <a href="{{ route('dashboard.create-booking') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.create-booking') ? 'bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white shadow-lg' : 'text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="font-semibold">Buat Booking</span>
                    </a>

                    <a href="{{ route('dashboard.bookings') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.bookings') ? 'bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white shadow-lg' : 'text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-semibold">Booking Saya</span>
                    </a>

                    <div class="pt-4 mt-4 border-t border-[#E5F0ED]">
                        <a href="{{ route('landing') }}" class="flex items-center gap-3 px-4 py-3 text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E] rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span class="font-semibold">Kembali ke Beranda</span>
                        </a>
                    </div>
                </nav>

                <!-- profile -->
                <div class="p-4 border-t border-[#E5F0ED]">
                    <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-3 px-4 py-3 bg-[#F0F8F6] rounded-xl hover:bg-[#E5F0ED] transition-all duration-300 cursor-pointer">
                        @if(Auth::user()->photo)
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full object-cover border-2 border-[#2D7A6E]">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-[#1A3A35] truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-[#5A7A76] truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 px-4 py-3 text-[#E85D5D] hover:bg-red-50 rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-semibold">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- overlay res < desktop -->
        <div id="sidebar-overlay" class="fixed inset-0 backdrop-blur-sm z-40 lg:hidden hidden"></div>

        <!-- main -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- header -->
            <header class="bg-white border-b border-[#E5F0ED] sticky top-0 z-30">
                <div class="flex items-center justify-between h-20 px-4 lg:px-8">
                    <button id="sidebar-toggle" class="lg:hidden text-[#5A7A76] hover:text-[#2D7A6E] p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <div class="flex-1 lg:flex-none">
                        <h1 class="text-xl lg:text-2xl font-bold text-[#1A3A35]">@yield('page-title', 'Dashboard')</h1>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="hidden lg:flex items-center gap-2 px-4 py-2 bg-[#F0F8F6] rounded-full">
                            <div class="w-2 h-2 bg-[#52C77B] rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-[#1A3A35]">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- page content -->
            <main class="flex-1 p-4 lg:p-8">
                <!-- if session -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-[#E8F5E9] border border-[#52C77B] text-[#2E7D32] rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- else -->
                @if($errors->any())
                    <div class="mb-6 p-4 bg-[#FDEAEA] border border-[#E85D5D] text-[#D44545] rounded-xl">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- js script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }

        sidebarToggle.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
