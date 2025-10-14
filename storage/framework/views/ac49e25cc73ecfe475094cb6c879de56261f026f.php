<!-- Header / Navbar -->
<header class="absolute top-0 left-0 right-0 z-50 p-2 sm:p-4 transition-transform duration-300">
    <div class="container mx-auto flex justify-between items-center bg-primary/30 backdrop-blur-lg rounded-full text-white p-2 shadow-lg">
        <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0">
            <img src="<?php echo e(asset('gambar/logo_dj.png')); ?>" alt="Logo D'jamoe" class="h-10 ml-2">
        </a>
        <nav class="hidden md:flex items-center gap-6 font-semibold">
            <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'font-bold text-white' : 'text-accent/70 hover:text-white'); ?> transition-colors">Beranda</a>
            <a href="<?php echo e(route('produk.index')); ?>" class="<?php echo e(request()->routeIs('produk.index') ? 'font-bold text-white' : 'text-accent/70 hover:text-white'); ?> transition-colors">Produk</a>
            <a href="<?php echo e(route('aktivitas')); ?>" class="<?php echo e(request()->routeIs('aktivitas') ? 'font-bold text-white' : 'text-accent/70 hover:text-white'); ?> transition-colors">Aktivitas</a>
            <a href="<?php echo e(route('outlet')); ?>" class="<?php echo e(request()->routeIs('outlet') ? 'font-bold text-white' : 'text-accent/70 hover:text-white'); ?> transition-colors">Temukan Kami</a>
            <a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'font-bold text-white' : 'text-accent/70 hover:text-white'); ?> transition-colors">Tentang Kami</a>
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
        <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'font-bold text-white' : 'text-accent hover:text-white'); ?> transition-colors">Beranda</a>
        <a href="<?php echo e(route('produk.index')); ?>" class="<?php echo e(request()->routeIs('produk.index') ? 'font-bold text-white' : 'text-accent hover:text-white'); ?> transition-colors">Produk</a>
        <a href="<?php echo e(route('aktivitas')); ?>" class="<?php echo e(request()->routeIs('aktivitas') ? 'font-bold text-white' : 'text-accent hover:text-white'); ?> transition-colors">Aktivitas</a>
        <a href="<?php echo e(route('outlet')); ?>" class="<?php echo e(request()->routeIs('outlet') ? 'font-bold text-white' : 'text-accent hover:text-white'); ?> transition-colors">Temukan Kami</a>
        <a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'font-bold text-white' : 'text-accent hover:text-white'); ?> transition-colors">Tentang Kami</a>
    </div>
</div><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/partials/navbar.blade.php ENDPATH**/ ?>