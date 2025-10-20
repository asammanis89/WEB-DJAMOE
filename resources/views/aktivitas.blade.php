@extends('layouts.app')

@section('title', "Aktivitas & Wawasan - D'jamoe")

@push('styles')
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
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-center text-white" style="background-image: linear-gradient(rgba(10, 28, 17, 0.7), rgba(10, 28, 17, 0.8)), url('{{ asset('gambar/gambar2.jpeg') }}');">
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
                @forelse ($articles as $article)
                <div 
                    data-title="{{ $article->title }}" 
                    data-image="{{ asset('storage/' . $article->image) }}" 
                    data-description="{{ $article->description }}" 
                    class="activity-card group cursor-pointer bg-dark-card rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2 reveal-animation" 
                    style="transition-delay: {{ $loop->iteration * 100 }}ms;">
                    <div class="relative h-48 overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $article->image) }}')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end justify-center p-4">
                            <h2 class="text-2xl font-serif font-bold text-white text-center">{{ $article->subtitle }}</h2>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-serif text-xl font-bold text-accent">{{ $article->title }}</h3>
                        
                        <div class="h-20 overflow-hidden">
                             <p class="text-light-text/70 mt-2 text-sm leading-relaxed break-words">
                                {{ Str::limit($article->description, 100) }}
                            </p>
                        </div>

                        <div class="mt-auto pt-4">
                            <span class="font-semibold text-accent/90 group-hover:text-accent transition-colors">
                                Lihat Detail &rarr;
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-full text-center text-light-text/70">Belum ada aktivitas yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
{{-- Script untuk modal tidak diubah karena sudah berfungsi dengan baik --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const activityCards = document.querySelectorAll('.activity-card');
    if (!activityCards.length) return;

    const modalHTML = `
        <div id="activity-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
            <div class="modal-content bg-dark-card w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl relative transition-all duration-300 scale-95 opacity-0">
                <button class="close-modal absolute top-3 right-3 p-2 rounded-full text-accent/70 hover:bg-primary/50 hover:text-accent transition-colors z-10">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
                <img id="modal-image" src="" alt="Gambar Aktivitas" class="w-full h-64 object-cover rounded-t-2xl">
                <div class="p-8">
                    <h2 id="modal-title" class="text-3xl font-serif font-bold text-accent mb-4"></h2>
                    <p id="modal-description" class="text-light-text/80 leading-relaxed break-words"></p>
                </div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    const activityModal = document.getElementById('activity-modal');
    lucide.createIcons();
    
    const modalContent = activityModal.querySelector('.modal-content');
    const modalImage = activityModal.querySelector('#modal-image');
    const modalTitle = activityModal.querySelector('#modal-title');
    const modalDescription = activityModal.querySelector('#modal-description');
    
    function openModal(card) {
        modalImage.src = card.dataset.image;
        modalTitle.textContent = card.dataset.title;
        modalDescription.textContent = card.dataset.description;
        
        activityModal.classList.remove('hidden');
        setTimeout(() => {
            activityModal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95', 'opacity-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        activityModal.classList.add('opacity-0');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            activityModal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    activityCards.forEach(card => card.addEventListener('click', () => openModal(card)));
    activityModal.querySelector('.close-modal').addEventListener('click', closeModal);
    activityModal.addEventListener('click', e => {
        if (e.target === activityModal) closeModal();
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !activityModal.classList.contains('hidden')) closeModal();
    });
});
</script>
@endpush

