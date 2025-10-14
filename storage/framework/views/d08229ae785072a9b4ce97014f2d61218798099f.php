

<?php $__env->startSection('title', "Tentang Kami - D'jamoe"); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* 3D Card Hover Effect from your new HTML file */
    .card-container {
        perspective: 1000px;
    }
    .spice-card {
        transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        transform-style: preserve-3d;
    }
    .card-container:hover .spice-card {
        transform: rotateY(10deg) rotateX(10deg) translateZ(20px);
        box-shadow: 20px 20px 40px rgba(0,0,0,0.3);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-center text-white" style="background-image: linear-gradient(rgba(10, 28, 17, 0.7), rgba(10, 28, 17, 0.8)), url('<?php echo e(asset('gambar/gambar2.jpeg')); ?>');">
    <div class="reveal-animation">
        <h1 class="text-4xl md:text-7xl font-serif font-bold text-accent">Kisah Kami</h1>
        <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto text-white/90">Dari Dapur Sederhana, Menjadi Warisan Kebaikan untuk Indonesia.</p>
    </div>
</section>

<!-- Bagian Kisah Kami (Model Kotak) -->
<section class="py-24">
    <div class="container mx-auto px-4 space-y-16 md:space-y-20">
        
        <?php $__empty_1 = true; $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="flex flex-col <?php echo e($loop->even ? 'md:flex-row-reverse' : 'md:flex-row'); ?> items-center gap-8 md:gap-12 reveal-animation">
            <div class="md:w-5/12">
                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="rounded-lg shadow-xl w-full h-auto object-cover aspect-[4/3]">
            </div>
            <div class="md:w-7/12">
                <p class="text-sm font-semibold text-accent/80"><?php echo e($item->year_text); ?></p>
                <h3 class="text-3xl font-serif font-bold mt-2 text-accent"><?php echo e($item->title); ?></h3>
                <p class="mt-4 text-light-text/80 leading-relaxed">
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

<!-- Manfaat Rempah Section -->
<section class="py-20 bg-dark-card">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-serif font-bold text-accent reveal-animation">Kekuatan dari Alam</h2>
        <p class="mt-2 mb-12 text-lg text-accent/70 max-w-2xl mx-auto reveal-animation" style="transition-delay: 100ms;">Setiap tegukan D'jamoe mengandung kebaikan dari rempah-rempah pilihan Indonesia.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="card-container reveal-animation" style="transition-delay: 200ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="leaf" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Kunyit</h3>
                    <p class="mt-2 text-light-text/70">Dikenal sebagai anti-inflamasi alami yang kuat, membantu meredakan nyeri dan baik untuk pencernaan.</p>
                </div>
            </div>
            <div class="card-container reveal-animation" style="transition-delay: 300ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                     <i data-lucide="sun" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Jahe</h3>
                    <p class="mt-2 text-light-text/70">Efektif menghangatkan tubuh, meningkatkan imunitas, serta meredakan mual dan masuk angin.</p>
                </div>
            </div>
             <div class="card-container reveal-animation" style="transition-delay: 400ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                     <i data-lucide="flower-2" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Kencur</h3>
                    <p class="mt-2 text-light-text/70">Membantu meredakan batuk dan pegal linu, serta dipercaya dapat menambah nafsu makan.</p>
                </div>
            </div>
             <div class="card-container reveal-animation" style="transition-delay: 500ms;">
                <div class="spice-card bg-dark-bg p-8 rounded-2xl shadow-lg h-full">
                    <i data-lucide="shield" class="w-12 h-12 mx-auto text-accent"></i>
                    <h3 class="mt-4 text-2xl font-serif font-bold">Temulawak</h3>
                    <p class="mt-2 text-light-text/70">Baik untuk menjaga kesehatan fungsi hati, sebagai antioksidan, dan membantu proses detoksifikasi tubuh.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 text-center">
    <div class="container mx-auto px-4">
         <div class="reveal-animation">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-accent">Jelajahi Kebaikan di Setiap Botolnya</h2>
            <p class="mt-4 text-lg text-light-text/70 max-w-2xl mx-auto">Temukan varian jamu yang diciptakan khusus untuk menemani hari dan menjaga kesehatan Anda.</p>
            <a href="<?php echo e(route('produk')); ?>" class="mt-8 inline-block bg-accent text-primary font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition-transform hover:scale-105">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/about.blade.php ENDPATH**/ ?>