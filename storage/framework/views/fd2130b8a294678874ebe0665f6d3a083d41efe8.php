<?php $__env->startSection('title', "Beranda - D'jamoe"); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<style>
body {
    font-family: 'Inter', sans-serif;
    background-color: #0a1c11;
    background-image: linear-gradient(160deg, #1a3a24 0%, #0a1c11 74%);
}

.hero-swiper { height: 100vh; }
.hero-swiper .swiper-slide { background-size: cover; background-position: center; }
.hero-swiper .swiper-pagination-bullet { background: rgba(255,255,255,0.8) !important; }
.hero-swiper .swiper-pagination-bullet-active { background: #E6D793 !important; width: 20px !important; border-radius: 5px !important; }

.product-grid-container {
    perspective: 1000px;
}

.product-card {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    transform-style: preserve-3d;
}
.product-card:hover {
    transform: rotateY(7deg) scale(1.05);
    box-shadow: 0 20px 30px -10px rgba(0,0,0,0.5);
}


.client-logo-container { -webkit-mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent); mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent); }
.animate-scroll-up { animation: scroll-up 30s linear infinite; }
.animate-scroll-down { animation: scroll-down 30s linear infinite; }
@keyframes scroll-up { from { transform: translateY(0); } to { transform: translateY(-50%); } }
@keyframes scroll-down { from { transform: translateY(-50%); } to { transform: translateY(0); } }

.reveal-animation { opacity:0; filter: blur(5px); transform: translateY(50px) scale(0.98); transition: all 0.8s cubic-bezier(0.5,1,0.89,1); }
.reveal-animation.is-visible { opacity:1; filter:blur(0); transform: translateY(0) scale(1); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- HERO SLIDER -->
<section class="relative">
    <div class="swiper-container hero-swiper">
        <div class="swiper-wrapper">
            <?php $__empty_1 = true; $__currentLoopData = $flyers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flyer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="swiper-slide" style="background-image: url('<?php echo e(asset('storage/' . $flyer->image_url)); ?>');"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="swiper-slide" style="background-image: url('<?php echo e(asset('gambar/gambar1.jpg')); ?>');"></div>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- WELCOME SECTION -->
<section class="py-20">
    <div class="container mx-auto px-4 text-center">
        <div class="reveal-animation">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-accent">Selamat Datang di D'jamoe</h2>
            <p class="mt-4 max-w-3xl mx-auto text-light-text/80 text-lg">
                Kami mengajak Anda merasakan kehangatan tradisi dan kebaikan alam dalam setiap tegukan. Temukan kembali warisan kesehatan khas Madiun yang kami sajikan tulus dari hati.
            </p>
            <div class="flex justify-center mt-6">
                <i data-lucide="leaf" class="w-8 h-8 text-accent/50"></i>
            </div>
        </div>
    </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="pt-0 pb-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-serif font-bold reveal-animation">Produk Unggulan</h2>
            <p class="text-gray-300 mt-2 reveal-animation">Pilihan favorit untuk menjaga kesehatan dan kebugaran Anda.</p>
        </div>
        <div class="product-grid-container reveal-animation">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $featuredProducts->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-card bg-[#1a3a24] rounded-2xl shadow-lg h-full flex flex-col">
                        <img src="<?php echo e(asset('storage/' . $product->image_url)); ?>" alt="<?php echo e($product->product_name); ?>" class="w-full h-80 object-cover rounded-t-2xl" loading="lazy">
                        <div class="p-6 text-center flex flex-col flex-grow">
                            <h3 class="text-xl font-serif font-bold mb-2 text-[#FBF8ED]"><?php echo e($product->product_name); ?></h3>
                            <div class="flex-grow"></div>
                            <a href="<?php echo e(route('produk.index')); ?>" class="mt-4 text-[#E6D793] font-semibold group">Lihat Detail <i data-lucide="arrow-right" class="inline w-4 h-4 transition-transform group-hover:translate-x-1"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center text-gray-400">Belum ada produk unggulan.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- CERITA KAMI -->
<section class="py-20 bg-[#1a3a24]">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <img src="<?php echo e(asset('gambar/gambar1.jpg')); ?>" alt="Proses Pembuatan D'jamoe" class="rounded-2xl shadow-xl reveal-animation w-full">
        <div class="reveal-animation">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-[#E6D793]">Cerita Kami</h2>
            <p class="mt-4 text-[#E6D793]/70">D'jamoe lahir dari kecintaan untuk melestarikan resep warisan keluarga yang telah terbukti khasiatnya selama beberapa generasi. Kami percaya bahwa alam menyediakan semua yang kita butuhkan untuk hidup sehat.</p>
            <a href="<?php echo e(route('about')); ?>" class="mt-8 inline-block bg-[#E6D793] text-[#154424] font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition-transform hover:scale-105">Baca Kisah Lengkap</a>
        </div>
    </div>
</section>

<!-- TESTIMONI -->
<section class="py-20">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-serif font-bold reveal-animation">Kata Mereka</h2>
        <div class="mt-12 grid md:grid-cols-3 gap-8">
            <div class="bg-[#1a3a24] p-8 rounded-2xl shadow-lg reveal-animation">
                <p class="text-[#E6D793]/80 italic">"Beras Kencurnya juara! Badan langsung terasa segar dan enteng setelah minum. Rasanya pas, tidak terlalu manis."</p>
                <p class="mt-4 font-bold font-serif text-lg text-[#FBF8ED]">- Anisa, Karyawan Swasta</p>
            </div>
            <div class="bg-[#1a3a24] p-8 rounded-2xl shadow-lg reveal-animation">
                <p class="text-[#E6D793]/80 italic">"Suka banget sama Kunir Asemnya. Selalu sedia di kulkas untuk melancarkan pencernaan. Kemasannya juga praktis."</p>
                <p class="mt-4 font-bold font-serif text-lg text-[#FBF8ED]">- Budi Santoso, Atlet</p>
            </div>
            <div class="bg-[#1a3a24] p-8 rounded-2xl shadow-lg reveal-animation">
                <p class="text-[#E6D793]/80 italic">"Wedang Uwuh dari D'jamoe ini favorit keluarga. Tinggal seduh, langsung hangat dan rileks. Rempahnya terasa asli."</p>
                <p class="mt-4 font-bold font-serif text-lg text-[#FBF8ED]">- Citra Lestari, Ibu Rumah Tangga</p>
            </div>
        </div>
    </div>
</section>

  <!-- BAGIAN KLIEN KAMI -->
    <section class="py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-serif font-bold reveal-animation">Dipercaya Oleh</h2>
            <p class="text-light-text/70 mt-2 mb-12 reveal-animation" style="transition-delay: 100ms;">Kami bangga dapat melayani dan bekerja sama dengan berbagai institusi ternama.</p>
            <div class="relative h-96 grid grid-cols-3 gap-8 overflow-hidden client-logo-container">
                <!-- Column 1 -->
                <div class="flex flex-col gap-8">
                    <div class="animate-scroll-up flex flex-col items-center gap-8">
                        <img src="gambar/1_ASTON_REV.webp" alt="Logo Aston Madiun" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_BANK JATIM_REV.webp" alt="Logo Bank Jatim" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_DPRD_REV.webp" alt="Logo DPRD Kota Madiun" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_IMS_REV.webp" alt="Logo INKA Multi Solusi" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_ASTON_REV.webp" alt="Logo Aston Madiun" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_BANK JATIM_REV.webp" alt="Logo Bank Jatim" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_DPRD_REV.webp" alt="Logo DPRD Kota Madiun" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_IMS_REV.webp" alt="Logo INKA Multi Solusi" class="h-16 md:h-20 max-w-full filter grayscale invert">
                    </div>
                </div>
                 <!-- Column 2 -->
                <div class="flex flex-col gap-8">
                    <div class="animate-scroll-down flex flex-col items-center gap-8">
                        <img src="gambar/1_INKA_REV.webp" alt="Logo PT INKA" class="h-12 md:h-16 max-w-full filter grayscale invert">
                        <img src="gambar/1_JNK_REV.webp" alt="Logo Jasamarga" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_LANUD_REV.webp" alt="Logo Lanud Iswahjudi" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_INKA_REV.webp" alt="Logo PT INKA" class="h-12 md:h-16 max-w-full filter grayscale invert">
                        <img src="gambar/1_JNK_REV.webp" alt="Logo Jasamarga" class="h-16 md:h-20 max-w-full filter grayscale invert">
                        <img src="gambar/1_LANUD_REV.webp" alt="Logo Lanud Iswahjudi" class="h-20 md:h-24 max-w-full filter grayscale invert">
                    </div>
                </div>
                 <!-- Column 3 -->
                <div class="flex flex-col gap-8">
                      <div class="animate-scroll-up flex flex-col items-center gap-8">
                        <img src="gambar/1_LOGO UNIPMA_REV.webp" alt="Logo UNIPMA" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_PEMKOT_REV.webp" alt="Logo Kota Madiun" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_INKA_REV.webp" alt="Logo PT INKA" class="h-12 md:h-16 max-w-full filter grayscale invert">
                        <img src="gambar/1_LOGO UNIPMA_REV.webp" alt="Logo UNIPMA" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_PEMKOT_REV.webp" alt="Logo Kota Madiun" class="h-20 md:h-24 max-w-full filter grayscale invert">
                        <img src="gambar/1_BANK JATIM_REV.webp" alt="Logo Bank Jatim" class="h-16 md:h-20 max-w-full filter grayscale invert">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN OUTLET / PETA -->
    <section id="outlet" class="py-20 bg-dark-card">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-4xl md:text-5xl font-serif font-bold reveal-animation text-accent">Temukan Kami di Madiun</h2>
            </div>
            <div class="mt-8 bg-dark-bg p-6 rounded-lg shadow-lg flex flex-col md:flex-row justify-between items-start md:items-center gap-4 reveal-animation" style="transition-delay: 100ms;">
                <div>
                    <p class="font-semibold text-lg text-light-text">Jamu D'jamoe Madiun</p>
                    <p class="text-accent/70">
                        Jl. Ranumenggalan No.41, Mojorejo, Kec. Kartoharjo, <br>Kota Madiun, Jawa Timur 63119
                    </p>
                </div>
                <a href="https://maps.app.goo.gl/25n2oZ5bA1ZJz6b5A" target="_blank" class="mt-4 md:mt-0 bg-accent text-primary font-bold py-3 px-6 rounded-full transition-transform duration-300 hover:scale-105 inline-block">
                    Lihat Rute
                </a>
            </div>
            <div class="mt-4 rounded-lg overflow-hidden shadow-2xl map-container border-4 border-primary/50 dark:border-accent/20 reveal-animation" style="transition-delay: 200ms;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.442595011707!2d111.5310650748882!3d-7.635462892391696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be94c7bef19b%3A0x2d581d8c40e4b01!2sJamu%20D&#39;jamoe%20Madiun!5e0!3m2!1sid!2sid!4v1727225131093!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
</main>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.hero-swiper', { loop:true, effect:'fade', autoplay:{delay:5000, disableOnInteraction:false}, pagination:{ el:'.hero-swiper .swiper-pagination', clickable:true } });
    
    if(typeof lucide!=='undefined') lucide.createIcons();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){ entry.target.classList.add('is-visible'); }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal-animation').forEach(el => observer.observe(el));
});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/welcome.blade.php ENDPATH**/ ?>