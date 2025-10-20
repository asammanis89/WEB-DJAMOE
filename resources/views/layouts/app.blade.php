<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "D'jamoe - Warisan Rasa Tradisional Khas Madiun")</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    {{-- Tailwind Config --}}
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

    {{-- Global Styles --}}
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0a1c11; color: #FBF8ED; }
        .wa-bubble { animation: pulse 2.5s infinite cubic-bezier(0.66, 0, 0, 1); }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
        .reveal-animation { opacity: 0; filter: blur(5px); transform: translateY(50px) scale(0.98); transition: opacity 0.8s, transform 0.8s, filter 0.8s; }
        .reveal-animation.is-visible { opacity: 1; filter: blur(0); transform: translateY(0) scale(1); }
    </style>

    {{-- Placeholder untuk CSS tambahan dari halaman lain --}}
    @stack('styles')
</head>
<body class="bg-dark-bg text-light-text min-h-screen flex flex-col overflow-x-hidden">

    {{-- Memanggil file Navbar --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="flex-grow">
        {{-- INI BAGIAN PALING PENTING --}}
        {{-- Semua konten dari file seperti welcome.blade.php akan ditampilkan di sini. --}}
        @yield('content')
    </main>

    {{-- Memanggil file Footer --}}
    @include('partials.footer')

    {{-- WhatsApp Bubble --}}
    {{-- DIPERBAIKI: Menghapus variabel PHP agar tidak bergantung pada Controller --}}
    <a href="https://wa.me/6282232279783?text={{ urlencode('Halo, saya tertarik dengan produk Djamoe.') }}"
       target="_blank"
       class="wa-bubble fixed bottom-6 right-6 z-50 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110">
        <i data-lucide="message-circle" class="w-8 h-8"></i>
    </a>
    
    {{-- Modal Deskripsi Produk (PENTING untuk halaman produk) --}}
    <div id="description-modal" class="fixed inset-0 z-[60] bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div id="modal-content-wrapper" class="bg-dark-card rounded-lg shadow-2xl w-full max-w-md max-h-[90vh] overflow-y-auto p-6 relative transform scale-95 transition-transform duration-300">
            <button id="modal-close-btn" class="absolute top-4 right-4 text-accent/50 hover:text-accent z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <div id="modal-body">
                {{-- Konten Modal akan diisi oleh JavaScript dari halaman produk --}}
            </div>
        </div>
    </div>

    {{-- Scripts --}}
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

            // Sembunyikan navbar saat scroll ke bawah
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

            // Animasi saat elemen masuk viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if(entry.isIntersecting) entry.target.classList.add('is-visible'); });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal-animation').forEach(el => observer.observe(el));
            
            lucide.createIcons();
        });
    </script>

    {{-- Placeholder untuk JavaScript tambahan dari halaman lain --}}
    @stack('scripts')
</body>
</html>
