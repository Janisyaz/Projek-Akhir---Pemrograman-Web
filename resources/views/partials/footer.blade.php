<!-- Footer -->
<footer class="bg-gray-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <i class="fas fa-newspaper text-2xl text-primary-400"></i>
                    <h3 class="text-xl font-bold text-white">E-Koran Digital</h3>
                </div>
                <p class="mb-4">
                    Portal berita digital terpercaya yang menyajikan informasi aktual, akurat, dan
                    berimbang dari seluruh penjuru dunia.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-primary-400 transition">Beranda</a></li>
                    <li><a href="#" class="hover:text-primary-400 transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-primary-400 transition">Redaksi</a></li>
                    <li><a href="#" class="hover:text-primary-400 transition">Pedoman Media Siber</a></li>
                    <li><a href="#" class="hover:text-primary-400 transition">Karier</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-2">
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-map-marker-alt mt-1 text-primary-400"></i>
                        <span>Jl. Media No. 123, Batam, Indonesia</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-phone-alt text-primary-400"></i>
                        <span>+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-primary-400"></i>
                        <span>redaksi@ekoran-digital.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p>© {{ date('Y') }} E-Koran Digital. All rights reserved.</p>
            <div class="mt-4 md:mt-0">
                <a href="#" class="text-sm hover:text-primary-400 transition">Kebijakan Privasi</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-sm hover:text-primary-400 transition">Syarat & Ketentuan</a>
            </div>
        </div>

        <!-- Tambahan Nama -->
        <div class="text-center text-sm text-gray-400 mt-4">
            Dibuat oleh <span class="text-white font-semibold">Janisya Elvira</span>
        </div>
    </div>
</footer>
