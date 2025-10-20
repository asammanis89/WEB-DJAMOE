

<?php $__env->startSection('title', "Tentang Kami - D'jamoe"); ?>

<?php $__env->startPush('styles'); ?>
<!-- Import Font: DM Serif Display + DM Sans -->
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=DM+Serif+Display:wght@400;700&display=swap" rel="stylesheet">

<style>
    /* === BASE STYLE === */
    body {
        font-family: 'DM Sans', sans-serif;
        color: #e6e2d3;
        background-color: #0b1a13;
    }

    h1, h2, h3, h4 {
        font-family: 'DM Serif Display', serif;
        color: #d9b26f;
        font-variant-numeric: lining-nums; /* Samakan ukuran angka dan huruf */
    }

    p, span {
        font-family: 'DM Sans', sans-serif;
        font-variant-numeric: lining-nums;
    }

    /* === ANIMASI REVEAL === */
    .reveal-animation {
        opacity: 0;
        transform: translateY(40px);
        animation: fadeUp 1s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* === GAMBAR DAN KARTU === */
    .card-container {
        perspective: 1000px;
    }

    .spice-card {
        transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        transform-style: preserve-3d;
    }

    .card-container:hover .spice-card {
        transform: rotateY(10deg) rotateX(10deg) translateZ(20px);
        box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.3);
    }

    img {
        border-radius: 1.25rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        transition: transform 0.6s ease, box-shadow 0.6s ease;
    }

    img:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
    }

    /* === WARNA KUSTOM === */
    .text-accent { color: #d9b26f; }
    .bg-dark-bg { background-color: #13231a; }
    .bg-dark-card { background-color: #11221a; }
    .text-light-text { color: #e6e2d3; }

    /* === DETAIL TYPOGRAPHY === */
    p {
        line-height: 1.8;
        letter-spacing: 0.2px;
    }

    /* === RESPONSIVE FIX === */
    @media (max-width: 768px) {
        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; }
        h3 { font-size: 1.5rem; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- HERO SECTION -->
<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-center text-white"
    style="background-image: linear-gradient(rgba(10, 28, 17, 0.7), rgba(10, 28, 17, 0.8)), url('<?php echo e(asset('gambar/gambar2.jpeg')); ?>');">
    <div class="reveal-animation">
        <h1 class="text-4xl md:text-7xl font-serif font-bold text-accent">Kisah Kami</h1>
        <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto text-white/90">
            Dari Dapur Sederhana, Menjadi Warisan Kebaikan untuk Indonesia.
        </p>
    </div>
</section>

<!-- BAGIAN KISAH KAMI -->
<section class="py-24">
    <div class="container mx-auto px-4 space-y-16 md:space-y-24">
        <?php $__empty_1 = true; $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="flex flex-col <?php echo e($loop->even ? 'md:flex-row-reverse' : 'md:flex-row'); ?> items-center gap-8 md:gap-16 reveal-animation">

            <!-- Gambar -->
            <div class="md:w-1/2">
                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>"
                     class="w-full h-auto object-cover aspect-video">
            </div>

            <!-- Teks -->
            
            <div class="md:w-1/2 text-center <?php echo e($loop->even ? 'md:text-right' : 'md:text-left'); ?>">
                <p class="font-semibold text-accent/80 tracking-widest uppercase"><?php echo e($item->year_text); ?></p>
                <h3 class="text-4xl md:text-5xl font-serif font-bold mt-2 text-accent"><?php echo e($item->title); ?></h3>
                
                <div class="w-24 h-px bg-accent/30 my-6 mx-auto <?php echo e($loop->even ? 'md:ml-auto md:mr-0' : 'md:mx-0'); ?>"></div>
                <p class="text-lg text-light-text/80 leading-relaxed normal-case">
                    <?php echo e($item->description); ?>

                </p>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center text-accent/70 py-16">
            <p>Belum ada cerita yang ditambahkan.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- MANFAAT REMPAH -->
<section class="py-20 bg-dark-card">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-serif font-bold text-accent reveal-animation">Kekuatan dari Alam</h2>
        <p class="mt-2 mb-12 text-lg text-accent/70 max-w-2xl mx-auto reveal-animation" style="transition-delay: 100ms;">
            Setiap tegukan D'jamoe mengandung kebaikan dari rempah-rempah pilihan Indonesia.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="card-container reveal-animation" style="transition-delay: 200ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="leaf" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Kunyit</h3>
                    <p class="mt-2 text-light-text/70">Anti-inflamasi alami yang kuat, membantu meredakan nyeri dan baik untuk pencernaan.</p>
                </div>
            </div>
            <div class="card-container reveal-animation" style="transition-delay: 300ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="sun" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Jahe</h3>
                    <p class="mt-2 text-light-text/70">Menghangatkan tubuh, meningkatkan imunitas, serta meredakan mual dan masuk angin.</p>
                </div>
            </div>
            <div class="card-container reveal-animation" style="transition-delay: 400ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="flower-2" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Kencur</h3>
                    <p class="mt-2 text-light-text/70">Membantu meredakan batuk dan pegal linu, serta dipercaya menambah nafsu makan.</p>
                </div>
            </div>
            <div class="card-container reveal-animation" style="transition-delay: 500ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="shield" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Temulawak</h3>
                    <p class="mt-2 text-light-text/70">Menjaga kesehatan hati, bertindak sebagai antioksidan, dan membantu detoksifikasi tubuh.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-20 text-center">
    <div class="container mx-auto px-4">
        <div class="reveal-animation">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-accent">Jelajahi Kebaikan di Setiap Botolnya</h2>
            <p class="mt-4 text-lg text-light-text/70 max-w-2xl mx-auto">
                Temukan varian jamu yang diciptakan khusus untuk menemani hari dan menjaga kesehatan Anda.
            </p>
            <a href="<?php echo e(route('produk.index')); ?>"
               class="mt-8 inline-block bg-accent text-primary font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition-transform hover:scale-105">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/about.blade.php ENDPATH**/ ?>