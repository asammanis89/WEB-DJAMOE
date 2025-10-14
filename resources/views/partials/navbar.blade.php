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
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-full text-accent hover:bg-accent/10">
                <i data-lucide="menu" class="h-6 w-6"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-0 bg-primary/95 backdrop-blur-lg z-[90] hidden md:hidden">
    <div class="flex flex-col items-center justify-center h-full gap-8 text-2xl font-semibold">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold text-white' : 'text-accent hover:text-white' }} transition-colors">Beranda</a>
        <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.index') ? 'font-bold text-white' : 'text-accent hover:text-white' }} transition-colors">Produk</a>
        <a href="{{ route('aktivitas') }}" class="{{ request()->routeIs('aktivitas') ? 'font-bold text-white' : 'text-accent hover:text-white' }} transition-colors">Aktivitas</a>
        <a href="{{ route('outlet') }}" class="{{ request()->routeIs('outlet') ? 'font-bold text-white' : 'text-accent hover:text-white' }} transition-colors">Temukan Kami</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold text-white' : 'text-accent hover:text-white' }} transition-colors">Tentang Kami</a>
    </div>
</div>