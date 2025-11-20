<!-- navbar dengan logo dan menu navigasi -->
<nav class="bg-white shadow-md sticky top-0 z-50 border-b border-neutral-300">
    <div class="container-custom">
        <div class="flex items-center justify-between h-20">
            <!-- logo klinik -->
            <a href="{{ route('landing') }}">
                <img src="{{ asset('logo.png') }}" alt="VetWell Clinic Logo" class="h-16 w-28 transition-transform duration-300 group-hover:scale-105">
            </a>

            <!-- menu navigasi desktop -->
            <div class="hidden lg:flex items-center gap-8">
                <!-- dropdown about -->
                <div class="relative group">
                    <button class="flex items-center gap-1 text-neutral-800 hover:text-primary-600 font-medium transition-colors duration-200">
                        About
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-neutral-200">
                        <a href="{{ route('team') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-t-lg">Our Team</a>
                        <a href="{{ route('contact') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors">Contact Us</a>
                        <a href="{{ route('emergency') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-b-lg">Emergency</a>
                    </div>
                </div>

                <!-- dropdown services -->
                <div class="relative group">
                    <button class="flex items-center gap-1 text-neutral-800 hover:text-primary-600 font-medium transition-colors duration-200">
                        Services
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-neutral-200">
                        <a href="{{ route('services') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-t-lg">Offered Services</a>
                        <a href="{{ route('pricing') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-b-lg">Pricing</a>
                    </div>
                </div>
                <!-- tombol call to action -->
                @auth
                    <!-- User dropdown for authenticated users -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-neutral-800 hover:text-primary-600 font-medium transition-colors duration-200">
                            @if(Auth::user()->doctor && Auth::user()->doctor->photo)
                                <img src="{{ Storage::url(Auth::user()->doctor->photo) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border-2 border-primary-600">
                            @elseif(Auth::user()->photo)
                                <img src="{{ Storage::url(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border-2 border-primary-600">
                            @else
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-600 to-primary-400 flex items-center justify-center text-white font-bold text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-neutral-200">
                            <div class="px-4 py-3 border-b border-neutral-200">
                                <p class="text-sm font-semibold text-neutral-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-neutral-600">{{ Auth::user()->email }}</p>
                            </div>
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    Admin Dashboard
                                </a>
                            @elseif(Auth::user()->doctor)
                                <a href="{{ route('doctor.dashboard') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    Doctor Dashboard
                                </a>
                            @else
                                <a href="{{ route('dashboard.index') }}" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 text-neutral-800 hover:bg-red-50 hover:text-red-600 transition-colors rounded-b-lg flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-primary">
                        Get Started
                    </a>
                @endauth
            </div>

            <!-- tombol menu mobile -->
            <button id="mobile-menu-button" class="lg:hidden text-neutral-800 hover:text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-lg p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- menu mobile -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-neutral-200">
        <div class="container-custom py-4 space-y-2">
            <a href="{{ route('landing') }}" class="block px-4 py-2 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">Home</a>
            
            <div class="px-4 py-2">
                <p class="text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">About</p>
                <a href="{{ route('team') }}" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Our Team</a>
                <a href="{{ route('contact') }}" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Contact Us</a>
                <a href="{{ route('emergency') }}" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Emergency</a>
            </div>

            <div class="px-4 py-2">
                <p class="text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Services</p>
                <a href="{{ route('services') }}" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Offered Services</a>
                <a href="{{ route('pricing') }}" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Pricing</a>
            </div>

            @auth
                <div class="px-4 py-2 border-t border-neutral-200 mt-2 pt-4">
                    <p class="text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Account</p>
                    <div class="mb-3 p-3 bg-neutral-50 rounded-lg flex items-center gap-3">
                        @if(Auth::user()->doctor && Auth::user()->doctor->photo)
                            <img src="{{ Storage::url(Auth::user()->doctor->photo) }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-primary-600">
                        @elseif(Auth::user()->photo)
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-primary-600">
                        @else
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-600 to-primary-400 flex items-center justify-center text-white font-bold text-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-semibold text-neutral-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-neutral-600">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Admin Dashboard
                        </a>
                    @elseif(Auth::user()->doctor)
                        <a href="{{ route('doctor.dashboard') }}" class="block px-4 py-2 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Doctor Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="px-4 pt-2">
                    <a href="{{ route('login') }}" class="btn-primary w-full text-center">
                        Get Started
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<!-- script untuk toggle menu mobile -->
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
