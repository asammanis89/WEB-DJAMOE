<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', "D'jamoe - Warisan Rasa Tradisional Khas Madiun"); ?></title>

    
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#154424', 'accent': '#E6D793', 'dark-bg': '#0a1c11',
                        'dark-card': '#1a3a24', 'light-text': '#FBF8ED',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0a1c11; color: #FBF8ED; }
        .wa-bubble { animation: pulse 2.5s infinite cubic-bezier(0.66, 0, 0, 1); }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
        .reveal-animation { opacity: 0; filter: blur(5px); transform: translateY(50px) scale(0.98); transition: opacity 0.8s, transform 0.8s, filter 0.8s; }
        .reveal-animation.is-visible { opacity: 1; filter: blur(0); transform: translateY(0) scale(1); }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-dark-bg text-light-text min-h-screen flex flex-col">

    
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <a href="https://wa.me/<?php echo e($whatsappNumber ?? '6282232279783'); ?>?text=<?php echo e(urlencode('Halo, saya tertarik dengan produk Djamoe.')); ?>"
       target="_blank"
       class="wa-bubble fixed bottom-20 md:bottom-6 right-6 z-50 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110">
        <i data-lucide="message-circle" class="w-8 h-8"></i>
    </a>
    
    
    <div id="description-modal" class="fixed inset-0 z-[60] bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div id="modal-content-wrapper" class="bg-dark-card rounded-lg shadow-2xl w-full max-w-md max-h-[90vh] overflow-y-auto p-6 relative transform scale-95 transition-transform duration-300">
            <button id="modal-close-btn" class="absolute top-4 right-4 text-accent/50 hover:text-accent z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <div id="modal-body">
                
            </div>
        </div>
    </div>

    
    <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-dark-card/80 backdrop-blur-lg border-t border-accent/20">
        <div class="flex justify-around items-center h-16">
            <a href="<?php echo e(url('/')); ?>" class="flex flex-col items-center justify-center <?php echo e(request()->is('/') ? 'text-accent font-bold' : 'text-accent/70'); ?> transition-colors">
                <i data-lucide="home" class="w-6 h-6 mb-1"></i><span class="text-xs">Beranda</span>
            </a>
            <a href="<?php echo e(url('/produk')); ?>" class="flex flex-col items-center justify-center <?php echo e(request()->is('produk') ? 'text-accent font-bold' : 'text-accent/70'); ?> transition-colors">
                <i data-lucide="shopping-bag" class="w-6 h-6 mb-1"></i><span class="text-xs">Produk</span>
            </a>
            <a href="<?php echo e(url('/aktivitas')); ?>" class="flex flex-col items-center justify-center <?php echo e(request()->is('aktivitas') ? 'text-accent font-bold' : 'text-accent/70'); ?> transition-colors">
                <i data-lucide="zap" class="w-6 h-6 mb-1"></i><span class="text-xs">Aktivitas</span>
            </a>
            <a href="<?php echo e(url('/outlet')); ?>" class="flex flex-col items-center justify-center <?php echo e(request()->is('outlet') ? 'text-accent font-bold' : 'text-accent/70'); ?> transition-colors">
                <i data-lucide="map-pin" class="w-6 h-6 mb-1"></i><span class="text-xs">Temukan Kami</span>
            </a>
        </div>
    </div>

    
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Skrip Global (Navbar & Animasi)
            const header = document.querySelector('header');
            const mobileMenuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if(mobileMenuBtn && mobileMenu) {
                const mobileMenuIcon = mobileMenuBtn.querySelector('i');
                mobileMenuBtn.addEventListener('click', () => {
                    const isMenuOpen = !mobileMenu.classList.contains('hidden');
                    mobileMenu.classList.toggle('hidden');
                    document.body.style.overflow = isMenuOpen ? '' : 'hidden';
                    mobileMenuIcon.setAttribute('data-lucide', isMenuOpen ? 'menu' : 'x');
                    lucide.createIcons();
                });
            }

            let lastScrollTop = 0;
            window.addEventListener('scroll', () => {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (header && scrollTop > lastScrollTop && scrollTop > header.offsetHeight) {
                    if (!mobileMenu || mobileMenu.classList.contains('hidden')) {
                        header.classList.add('-translate-y-full');
                    }
                } else if(header) {
                    header.classList.remove('-translate-y-full');
                }
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, false);

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if(entry.isIntersecting) entry.target.classList.add('is-visible'); });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal-animation').forEach(el => observer.observe(el));
            lucide.createIcons();
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/layouts/app.blade.php ENDPATH**/ ?>