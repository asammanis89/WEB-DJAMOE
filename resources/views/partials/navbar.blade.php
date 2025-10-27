<!-- Header / Navbar -->
<header class="absolute top-0 left-0 right-0 z-50 p-2 sm:p-4 transition-transform duration-300">
    <div class="container mx-auto flex justify-between items-center bg-primary/30 backdrop-blur-lg rounded-full text-white p-2 shadow-lg">
        <a href="{{ route('home') }}" class="flex-shrink-0">
            <img src="{{ asset('gambar/logo_dj.png') }}" alt="Logo D'jamoe" class="h-10 ml-2">
        </a>
        <nav class="hidden md:flex items-center gap-6 font-semibold">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold text-white' : 'text-accent/70 hover:text-white' }} transition-colors">Beranda</a>
            <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.index') ? 'font-bold text-white' : 'text-accent/70 hover:text-white' }} transition-colors">Produk</a>
            <a href="{{ route('aktivitas') }}" class="{{ request()->routeIs('aktivitas') ? 'font-bold text-white' : 'text-accent/70 hover:text-white' }} transition-colors">Aktivitas</a>
            <a href="{{ route('outlet') }}" class="{{ request()->routeIs('outlet') ? 'font-bold text-white' : 'text-accent/70 hover:text-white' }} transition-colors">Temukan Kami</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold text-white' : 'text-accent/70 hover:text-white' }} transition-colors">Tentang Kami</a>
        </nav>
        <div class="flex items-center gap-2">
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-full text-accent hover:bg-accent/10 transition-all mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Dropdown (Box Kecil) -->
<div id="mobile-menu" class="fixed top-20 right-4 z-[90] hidden transition-all duration-300">
    <div class="bg-primary/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-accent/20 overflow-hidden min-w-[280px] animate-slideDown">
        <!-- Header Menu -->
        <div class="bg-gradient-to-r from-primary to-primary/80 px-5 py-3 border-b border-accent/20">
            <h3 class="text-accent font-bold text-sm tracking-wide">MENU NAVIGASI</h3>
        </div>
        
        <!-- Menu Items -->
        <div class="py-2">
            <a href="{{ route('home') }}" class="flex items-center px-5 py-3.5 {{ request()->routeIs('home') ? 'bg-accent/20 text-white font-bold' : 'text-accent hover:bg-accent/10' }} transition-all group border-b border-accent/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('home') ? 'text-white' : 'text-accent/70 group-hover:text-accent' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Beranda</span>
                @if(request()->routeIs('home'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif
            </a>
            
            <a href="{{ route('produk.index') }}" class="flex items-center px-5 py-3.5 {{ request()->routeIs('produk.index') ? 'bg-accent/20 text-white font-bold' : 'text-accent hover:bg-accent/10' }} transition-all group border-b border-accent/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('produk.index') ? 'text-white' : 'text-accent/70 group-hover:text-accent' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span>Produk</span>
                @if(request()->routeIs('produk.index'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif
            </a>
            
            <a href="{{ route('aktivitas') }}" class="flex items-center px-5 py-3.5 {{ request()->routeIs('aktivitas') ? 'bg-accent/20 text-white font-bold' : 'text-accent hover:bg-accent/10' }} transition-all group border-b border-accent/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('aktivitas') ? 'text-white' : 'text-accent/70 group-hover:text-accent' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Aktivitas</span>
                @if(request()->routeIs('aktivitas'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif
            </a>
            
            <a href="{{ route('outlet') }}" class="flex items-center px-5 py-3.5 {{ request()->routeIs('outlet') ? 'bg-accent/20 text-white font-bold' : 'text-accent hover:bg-accent/10' }} transition-all group border-b border-accent/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('outlet') ? 'text-white' : 'text-accent/70 group-hover:text-accent' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Temukan Kami</span>
                @if(request()->routeIs('outlet'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif
            </a>
            
            <a href="{{ route('about') }}" class="flex items-center px-5 py-3.5 {{ request()->routeIs('about') ? 'bg-accent/20 text-white font-bold' : 'text-accent hover:bg-accent/10' }} transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('about') ? 'text-white' : 'text-accent/70 group-hover:text-accent' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Tentang Kami</span>
                @if(request()->routeIs('about'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif
            </a>
        </div>
    </div>
</div>

<!-- Overlay untuk menutup menu saat klik di luar -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-[85] hidden md:hidden"></div>

<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-slideDown {
        animation: slideDown 0.3s ease-out;
    }
</style>

{{-- Script ada di layouts.app.blade.php, tidak perlu duplikat --}}