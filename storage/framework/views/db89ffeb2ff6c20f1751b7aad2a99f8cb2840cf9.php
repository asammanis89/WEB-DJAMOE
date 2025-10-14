

<?php $__env->startSection('title', "Aktivitas & Wawasan - D'jamoe"); ?>

<?php $__env->startPush('styles'); ?>
<style>
    #activity-modal {
        transition: opacity 0.3s ease-in-out;
    }
    #activity-modal .modal-content {
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }
    #activity-modal.hidden .modal-content {
        transform: scale(0.95);
        opacity: 0;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-center text-white" style="background-image: linear-gradient(rgba(10, 28, 17, 0.7), rgba(10, 28, 17, 0.8)), url('<?php echo e(asset('gambar/gambar2.jpeg')); ?>');">
    <div class="reveal-animation">
        <h1 class="text-4xl md:text-7xl font-serif font-bold text-accent">Aktivitas & Wawasan</h1>
        <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto text-white/90">Lebih dari sekadar produk, kami berbagi pengalaman dan pengetahuan tentang dunia jamu.</p>
    </div>
</section>

<!-- Bagian Aktivitas & Wawasan -->
<section class="py-24">
    <div class="container mx-auto px-4 space-y-20">
        <!-- Baris Pertama: Wawasan Tambahan (Statis) -->
        <div>
            <div class="bg-dark-card rounded-2xl shadow-xl p-8 md:p-12 reveal-animation">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <img src="https://placehold.co/800x600/102b19/E6D793?text=Wawasan+Jamu" alt="Wawasan tentang Jamu" class="rounded-lg shadow-lg mb-6 w-full object-cover aspect-video">
                        <h3 class="text-3xl font-serif font-bold text-accent">Selami Lebih Dalam Dunia Jamu</h3>
                        <p class="mt-4 text-light-text/80 leading-relaxed">
                            Kami percaya edukasi adalah kunci untuk melestarikan warisan jamu. Temukan artikel menarik dan tonton video inspiratif kami untuk memperkaya pengetahuan Anda.
                        </p>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-2xl font-serif font-semibold text-accent/90 border-b-2 border-accent/20 pb-2 mb-4">Artikel Pilihan</h4>
                            <ul class="space-y-3">
                                <li><a href="#" class="flex items-center gap-3 text-light-text/80 hover:text-accent transition-colors group"><i data-lucide="book-open" class="w-5 h-5 text-accent/70 group-hover:text-accent"></i>Manfaat Kunyit untuk Kesehatan Modern</a></li>
                                <li><a href="#" class="flex items-center gap-3 text-light-text/80 hover:text-accent transition-colors group"><i data-lucide="book-open" class="w-5 h-5 text-accent/70 group-hover:text-accent"></i>Sejarah Jamu Gendong di Tanah Jawa</a></li>
                                <li><a href="#" class="flex items-center gap-3 text-light-text/80 hover:text-accent transition-colors group"><i data-lucide="book-open" class="w-5 h-5 text-accent/70 group-hover:text-accent"></i>5 Rempah Dapur Peningkat Imunitas</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-2xl font-serif font-semibold text-accent/90 border-b-2 border-accent/20 pb-2 mb-4">Tonton Kami di YouTube</h4>
                            <ul class="space-y-3">
                                <li><a href="#" class="flex items-center gap-3 text-light-text/80 hover:text-accent transition-colors group"><i data-lucide="youtube" class="w-5 h-5 text-accent/70 group-hover:text-accent"></i>Proses Pembuatan Beras Kencur D'jamoe</a></li>
                                <li><a href="#" class="flex items-center gap-3 text-light-text/80 hover:text-accent transition-colors group"><i data-lucide="youtube" class="w-5 h-5 text-accent/70 group-hover:text-accent"></i>Wawancara dengan Petani Rempah Lokal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris Kedua: Pilihan Pengalaman Unik (Dinamis) -->
        <div>
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-accent reveal-animation">Pilihan Pengalaman Unik</h2>
                <p class="mt-4 text-lg text-light-text/70 max-w-3xl mx-auto reveal-animation" style="transition-delay: 100ms;">Selami dunia jamu lebih dalam melalui berbagai kegiatan interaktif yang kami tawarkan.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div 
                    data-title="<?php echo e($article->title); ?>" 
                    data-image="<?php echo e(asset('storage/' . $article->image)); ?>" 
                    data-description="<?php echo e($article->description); ?>" 
                    class="activity-card group cursor-pointer bg-dark-card rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2 reveal-animation" 
                    style="transition-delay: <?php echo e($loop->iteration * 100); ?>ms;">
                    <div class="overflow-hidden relative h-48 flex items-center justify-center bg-primary">
                        <h2 class="text-4xl font-serif font-bold text-accent/20"><?php echo e($article->subtitle); ?></h2>
                    </div>
                    <div class="p-6 flex flex-col">
                        <h3 class="font-serif text-2xl font-bold text-accent"><?php echo e($article->title); ?></h3>
                        <p class="text-light-text/70 mt-2 text-sm leading-relaxed flex-grow" style="height: 6rem;">
                            <?php echo e(Str::limit($article->description, 120)); ?>

                        </p>
                        <span class="mt-4 inline-block font-semibold text-accent/90 group-hover:text-accent transition-colors">
                            Lihat Detail &rarr;
                        </span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="col-span-full text-center text-light-text/70">Belum ada aktivitas yang ditambahkan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const activityCards = document.querySelectorAll('.activity-card');

    // Membuat elemen Modal sekali saja
    const activityModal = document.createElement('div');
    activityModal.id = 'activity-modal';
    activityModal.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] flex items-center justify-center p-4 hidden';
    activityModal.innerHTML = `
        <div class="modal-content bg-dark-card w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl relative transition-all duration-300">
            <button class="close-modal absolute top-3 right-3 p-2 rounded-full text-accent/70 hover:bg-primary/50 hover:text-accent transition-colors z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <img id="modal-image" src="" alt="Gambar Aktivitas" class="w-full h-64 object-cover rounded-t-2xl">
            <div class="p-8">
                <h2 id="modal-title" class="text-3xl font-serif font-bold text-accent mb-4"></h2>
                <p id="modal-description" class="text-light-text/80 leading-relaxed"></p>
            </div>
        </div>
    `;
    document.body.appendChild(activityModal);
    lucide.createIcons(); // Inisialisasi ikon 'x'

    const modalImage = activityModal.querySelector('#modal-image');
    const modalTitle = activityModal.querySelector('#modal-title');
    const modalDescription = activityModal.querySelector('#modal-description');
    
    function openModal(card) {
        modalImage.src = card.dataset.image;
        modalTitle.textContent = card.dataset.title;
        modalDescription.textContent = card.dataset.description;
        
        activityModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        activityModal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    activityCards.forEach(card => {
        card.addEventListener('click', () => {
            openModal(card);
        });
    });

    activityModal.querySelector('.close-modal').addEventListener('click', closeModal);
    activityModal.addEventListener('click', (e) => {
        if (e.target === activityModal) closeModal();
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !activityModal.classList.contains('hidden')) closeModal();
    });

    // Animasi scroll-reveal (tetap sama)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.reveal-animation').forEach(el => observer.observe(el));
});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/aktivitas.blade.php ENDPATH**/ ?>