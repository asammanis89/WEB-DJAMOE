

<?php $__env->startSection('title', 'Produk - D\'jamoe'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Style spesifik untuk halaman produk */
    .best-seller-tag {
        position: absolute; top: 1rem; left: -0.5rem; background-color: #E6D793;
        color: #154424; padding: 0.3rem 1rem; font-size: 0.75rem; font-weight: bold;
        z-index: 10; border-radius: 0 9999px 9999px 0; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    .category-card img { transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1); }
    .category-card:hover img { transform: scale(1.1); }
    .loading-spinner {
        border-color: #E6D793; border-top-color: transparent;
        animation: spin 1s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-center text-white" style="background-image: linear-gradient(rgba(10, 28, 17, 0.7), rgba(10, 28, 17, 0.8)), url('<?php echo e(asset('gambar/gambar-produk.jpeg')); ?>');">
    <div class="reveal-animation">
        <h1 class="text-4xl md:text-7xl font-serif font-bold text-accent">Warisan Kebaikan Alam</h1>
        <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto text-white/90">Temukan varian jamu yang diciptakan khusus untuk menjaga kesehatan Anda.</p>
    </div>
</section>


<section id="produk" class="py-24">
    <div class="container mx-auto px-4">
        
        <div id="category-view">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-accent reveal-animation">Katalog Produk</h2>
                <p class="text-light-text/70 mt-4 max-w-2xl mx-auto reveal-animation" style="transition-delay: 100ms;">Pilih kategori untuk menemukan produk yang paling sesuai.</p>
            </div>
            <div id="category-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="category-card-container reveal-animation" style="transition-delay: <?php echo e($index * 50); ?>ms;">
                        <div class="category-card cursor-pointer group relative rounded-lg overflow-hidden shadow-lg" data-category-id="<?php echo e($category->id); ?>" data-category-name="<?php echo e($category->category_name); ?>">
                            <img src="<?php echo e(asset('storage/' . $category->image_url)); ?>" alt="<?php echo e($category->category_name); ?>" class="w-full h-80 object-cover" onerror="this.src='https://placehold.co/500x500/102b19/E6D793?text=<?php echo e(urlencode($category->category_name)); ?>'">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
                            <h3 class="absolute bottom-6 left-6 text-2xl font-serif font-bold text-white"><?php echo e($category->category_name); ?></h3>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="sm-col-span-2 lg:col-span-3 text-center text-accent/60 py-16">
                        <i data-lucide="archive" class="w-16 h-16 mx-auto mb-4"></i>
                        <h3 class="text-2xl font-bold">Kategori Belum Tersedia</h3>
                        <p>Saat ini belum ada kategori produk yang bisa ditampilkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div id="product-view" class="hidden">
            <div class="text-center mb-12">
                 <button id="back-to-categories" class="mb-4 inline-flex items-center gap-2 text-accent/80 hover:text-accent transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    Kembali ke Semua Kategori
                </button>
                <h2 id="product-view-title" class="text-4xl md:text-5xl font-serif font-bold text-accent reveal-animation"></h2>
            </div>
            <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"></div>
            <div id="no-results" class="text-center text-accent/60 py-16 hidden">
                <i data-lucide="frown" class="w-16 h-16 mx-auto mb-4"></i>
                <h3 class="text-2xl font-bold">Produk tidak ditemukan</h3>
                <p>Saat ini tidak ada produk dalam kategori ini.</p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ---- KONSTANTA & VARIABEL ----
    const WHATSAPP_NUMBER = '<?php echo e($whatsappNumber ?? '6282232279783'); ?>';
    
    // ---- ELEMEN DOM ----
    const categoryView = document.getElementById('category-view');
    const productView = document.getElementById('product-view');
    const categoryGrid = document.getElementById('category-grid');
    const productGrid = document.getElementById('product-grid');
    const noResultsDiv = document.getElementById('no-results');
    const backToCategoriesBtn = document.getElementById('back-to-categories');
    const productViewTitle = document.getElementById('product-view-title');
    
    // Elemen Modal (diasumsikan ada di layout)
    const modal = document.getElementById('description-modal');
    const modalContentWrapper = document.getElementById('modal-content-wrapper');
    const modalCloseBtn = document.getElementById('modal-close-btn');
    const modalBody = document.getElementById('modal-body');

    // ---- FUNGSI ----
    
    function displayProducts(categoryId, categoryName) {
        productViewTitle.textContent = categoryName;
        productGrid.innerHTML = `<div class="col-span-full text-center py-10"><div class="w-10 h-10 mx-auto border-4 loading-spinner rounded-full"></div><p class="mt-3 text-accent/70">Memuat produk...</p></div>`;
        
        fetch(`/produk/kategori/${categoryId}`)
            .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok'))
            .then(data => {
                noResultsDiv.classList.toggle('hidden', data.products.length > 0);
                productGrid.innerHTML = '';
                if (data.products.length > 0) {
                    data.products.forEach(product => {
                        const priceFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(product.price);
                        const productCard = document.createElement('div');
                        productCard.className = "bg-dark-card rounded-lg overflow-hidden shadow-lg transform hover:-translate-y-2 transition-transform duration-300 group flex flex-col";
                        
                        productCard.innerHTML = `
                            <div class="relative">
                                ${product.is_bestseller ? '<div class="best-seller-tag">Best Seller</div>' : ''}
                                <img src="/storage/${product.image_url}" alt="${product.product_name}" class="w-full h-56 object-cover" onerror="this.src='https://placehold.co/400x400/1a3a24/E6D793?text=Jamu'">
                            </div>
                            <div class="p-5 flex flex-col flex-grow">
                                <h3 class="text-xl font-serif font-bold mb-2 text-accent">${product.product_name}</h3>
                                <div class="flex-grow"></div>
                                <div class="mt-auto pt-4 border-t border-accent/20">
                                    <span class="text-lg font-sans font-bold text-white">${priceFormatted}</span>
                                    <button data-product-id="${product.id}" class="description-btn mt-3 w-full text-center bg-primary/80 text-accent py-2 px-3 rounded-full hover:bg-accent hover:text-primary transition-colors duration-300 text-sm">Lihat Detail</button>
                                </div>
                            </div>`;
                        productGrid.appendChild(productCard);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching products:', error);
                productGrid.innerHTML = `<div class="col-span-full text-center py-10 text-red-400">Gagal memuat produk. Coba lagi.</div>`;
            });
    }

    function openModal(productId) {
        if (!modal) return;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContentWrapper.classList.remove('scale-95');
        }, 10);
        document.body.style.overflow = 'hidden';
        modalBody.innerHTML = `<div class="text-center py-10"><div class="w-8 h-8 mx-auto border-4 loading-spinner rounded-full"></div><p class="mt-3 text-accent/70">Memuat detail...</p></div>`;
        
        fetch(`/produk/detail/${productId}`)
            .then(response => response.json())
            .then(product => {
                const priceFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(product.price);
                const whatsappMessage = `https://wa.me/${WHATSAPP_NUMBER}?text=Halo, saya tertarik dengan produk ${encodeURIComponent(product.product_name)}`;
                
                modalBody.innerHTML = `
                    <div class="relative w-full h-56 rounded-lg overflow-hidden mb-4">
                        <img src="/storage/${product.image_url}" alt="Gambar Produk" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/400x400/1a3a24/E6D793?text=Jamu'">
                    </div>
                    <h3 class="text-3xl font-serif font-bold mb-2 text-accent">${product.product_name}</h3>
                    <span class="text-xl font-sans font-bold text-white mb-4 block">${priceFormatted}</span>
                    <p class="text-light-text/80 break-words">${product.full_description || product.description || 'Deskripsi tidak tersedia.'}</p>
                    <a href="${whatsappMessage}" target="_blank" class="mt-6 w-full bg-green-600 text-white py-3 px-4 rounded-full hover:bg-green-700 transition-colors duration-300 text-base flex items-center justify-center gap-2">
                        <i data-lucide="message-circle" class="w-5 h-5"></i> Pesan via WhatsApp
                    </a>`;
                lucide.createIcons();
            })
            .catch(error => {
                console.error('Error fetching product detail:', error);
                modalBody.innerHTML = `<div class="text-center text-red-400 py-6">Gagal memuat detail produk.</div>`;
            });
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.add('opacity-0');
        modalContentWrapper.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    // ---- EVENT LISTENERS ----
    categoryGrid.addEventListener('click', (e) => {
        const card = e.target.closest('.category-card');
        if (card) {
            categoryView.classList.add('hidden');
            productView.classList.remove('hidden');
            displayProducts(card.dataset.categoryId, card.dataset.categoryName);
            window.scrollTo({ top: productView.offsetTop - 100, behavior: 'smooth' });
        }
    });

    backToCategoriesBtn.addEventListener('click', () => {
        productView.classList.add('hidden');
        categoryView.classList.remove('hidden');
    });

    productGrid.addEventListener('click', (event) => {
        const button = event.target.closest('.description-btn');
        if (button) openModal(button.dataset.productId);
    });
    
    if (modal && modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) closeModal();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
        });
    }
});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/produk.blade.php ENDPATH**/ ?>