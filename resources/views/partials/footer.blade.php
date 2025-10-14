<!-- Footer -->
<footer class="bg-black py-16">
    <div class="container mx-auto px-6 text-gray-300">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="font-bold text-lg mb-4 text-accent">Alamat</h3>
                <p class="text-gray-400">Jl. Ranumenggalan No.41, Mojorejo, Kec. Kartoharjo, <br>Kota Madiun, Jawa Timur 63119</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 text-accent">Media Sosial</h3>
                <div class="flex space-x-6 justify-center md:justify-start">
                    <a href="#" class="transition-transform hover:scale-110"><img src="{{ asset('gambar/icons8-instagram-48.png') }}" alt="Instagram D'jamoe" class="w-10 h-10"></a>
                    <a href="#" class="transition-transform hover:scale-110"><img src="{{ asset('gambar/icons8-facebook-48.png') }}" alt="Facebook D'jamoe" class="w-10 h-10"></a>
                    <a href="#" class="transition-transform hover:scale-110"><img src="{{ asset('gambar/icons8-whatsapp-48.png') }}" alt="WhatsApp D'jamoe" class="w-10 h-10"></a>
                    <a href="#" class="transition-transform hover:scale-110"><img src="{{ asset('gambar/icons8-tiktok-48.png') }}" alt="TikTok D'jamoe" class="w-10 h-10"></a>
                </div>
            </div>
             <div>
                <h3 class="font-bold text-lg mb-4 text-accent">Jam Buka</h3>
                <p class="text-gray-400">Senin - Jumat: 08:00 - 17:00</p>
                <p class="text-gray-400">Sabtu: 09:00 - 15:00</p>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} D'jamoe. Warisan Sehat dari Madiun.
        </div>
    </div>
</footer>
