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
                        <a href="#team" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-t-lg">Our Team</a>
                        <a href="#contact" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors">Contact Us</a>
                        <a href="#emergency" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-b-lg">Emergency</a>
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
                        <a href="#services" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-t-lg">Offered Services</a>
                        <a href="#pricing" class="block px-4 py-3 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 transition-colors rounded-b-lg">Pricing</a>
                    </div>
                </div>

                <!-- book visit -->
                <a href="#book" 
                   class="text-neutral-800 hover:text-primary-600 font-medium transition-colors duration-200">
                    Book Visit
                </a>

                <!-- tombol call to action -->
                <a href="{{ route('login') }}" class="btn-primary">
                    Get Started
                </a>
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
                <a href="#team" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Our Team</a>
                <a href="#contact" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Contact Us</a>
                <a href="#emergency" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Emergency</a>
            </div>

            <div class="px-4 py-2">
                <p class="text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Services</p>
                <a href="#services" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Offered Services</a>
                <a href="#pricing" class="block py-2 text-neutral-800 hover:text-primary-600 transition-colors">Pricing</a>
            </div>

            <a href="#book" class="block px-4 py-2 text-neutral-800 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">Book Visit</a>
            
            <div class="px-4 pt-2">
                <a href="{{ route('login') }}" class="btn-primary w-full text-center">
                    Get Started
                </a>
            </div>
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
