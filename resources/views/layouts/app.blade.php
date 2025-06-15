<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PortalBerita</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a2d9a84fa1.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#111827] text-white transition-colors duration-300" id="body">

    <!-- Navbar -->
    <nav class="bg-[#1f2937] p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-white">
                <span class="text-purple-400">Portal</span><span class="text-yellow-400">Berita</span>
                <span class="text-xs bg-blue-600 ml-2 px-2 py-1 rounded-full font-semibold">TERPERCAYA</span>
            </div>
            <ul class="hidden md:flex space-x-6 text-sm font-medium">
                <li><a href="#" class="hover:text-yellow-400">Beranda</a></li>
                <li><a href="#" class="hover:text-yellow-400">Trending</a></li>
                <li><a href="#" class="hover:text-yellow-400">Kategori</a></li>
                <li><a href="#" class="hover:text-yellow-400">Tentang</a></li>
                <li><a href="#" class="hover:text-yellow-400">Kontak</a></li>
            </ul>
            <div class="flex items-center space-x-3">
                <button onclick="toggleMode()" id="modeToggle" class="bg-[#374151] hover:bg-[#4b5563] px-3 py-1 rounded text-sm">🌙 Mode Gelap</button>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="min-h-screen">
        <section class="bg-[#1f2937] text-white py-14" id="mainSection">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-2xl font-bold mb-3 text-center">
                    <span class="text-gray-300">Berita</span> <span class="text-yellow-400">Trending</span>
                </h2>
                <p class="text-center text-gray-400 mb-10">Topik yang sedang banyak dibicarakan hari ini</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
@php
    $berita = [
        [
            'kategori' => 'POLITIK',
            'warna' => 'indigo-600',
            'judul' => 'Pertemuan Puncak G20 Hasilkan Kesepakatan Baru',
            'deskripsi' => 'Para pemimpin dunia menyepakati pakta baru untuk mengatasi krisis ekonomi global.',
            'waktu' => '2 jam lalu',
            'views' => '1.2k',
            'img' => asset('images/g20.jpg')
        ],
        [
            'kategori' => 'TEKNOLOGI',
            'warna' => 'blue-600',
            'judul' => 'Inovasi Terbaru AI Ubah Cara Kerja Perusahaan',
            'deskripsi' => 'Teknologi kecerdasan artifisial generasi berikutnya meningkatkan produktivitas.',
            'waktu' => '5 jam lalu',
            'views' => '3.4k',
            'img' => asset('images/ai.jpg')
        ],
        [
            'kategori' => 'KESEHATAN',
            'warna' => 'purple-600',
            'judul' => 'Penemuan Vaksin Baru untuk Penyakit Langka',
            'deskripsi' => 'Para peneliti berhasil mengembangkan vaksin untuk penyakit genetik langka.',
            'waktu' => '1 hari lalu',
            'views' => '5.7k',
            'img' => asset('images/vaksin.jpg')
        ],
        [
            'kategori' => 'PENDIDIKAN',
            'warna' => 'green-600',
            'judul' => 'Kurikulum Baru Diterapkan di Seluruh Sekolah',
            'deskripsi' => 'Pemerintah resmi luncurkan kurikulum Merdeka Belajar.',
            'waktu' => '3 hari lalu',
            'views' => '2.1k',
            'img' => asset('images/sekolah.jpg')
        ],
        [
            'kategori' => 'BENCANA',
            'warna' => 'red-600',
            'judul' => 'Banjir Landa Wilayah Kalimantan Timur',
            'deskripsi' => 'Ribuan warga dievakuasi akibat banjir besar.',
            'waktu' => '6 jam lalu',
            'views' => '4.3k',
            'img' => asset('images/banjir.jpg')
        ],
        [
            'kategori' => 'OLAHRAGA',
            'warna' => 'yellow-500',
            'judul' => 'Timnas U-23 Lolos ke Final Piala Asia',
            'deskripsi' => 'Kemenangan dramatis bawa timnas Indonesia U-23 ke final.',
            'waktu' => '12 jam lalu',
            'views' => '6.8k',
            'img' => asset('images/bola.jpg')
        ],
    ];
@endphp

                    @foreach ($berita as $item)
                        <div class="bg-[#111827] rounded-xl p-4 shadow hover:shadow-xl transition dark-mode-card">
                            <img src="{{ $item['img'] }}" class="rounded-lg mb-4 w-full h-40 object-cover" />
                            <span class="bg-{{ $item['warna'] }} text-xs px-3 py-1 rounded-full font-semibold">{{ $item['kategori'] }}</span>
                            <h3 class="mt-3 text-lg font-semibold">{{ $item['judul'] }}</h3>
                            <p class="text-sm text-gray-400 mt-1">{{ $item['deskripsi'] }}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ $item['waktu'] }} &nbsp;•&nbsp; {{ $item['views'] }} dilihat</p>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-6 py-3 rounded-full transition inline-flex items-center">
                        Lihat Semua Berita <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1f2937] text-gray-400 text-center py-6 border-t border-[#374151]">
        <p>&copy; {{ date('Y') }} PortalBerita. Semua hak dilindungi.</p>
    </footer>

    <!-- Toggle Mode Script -->
    <script>
        function toggleMode() {
            const body = document.getElementById('body');
            const section = document.getElementById('mainSection');
            const btn = document.getElementById('modeToggle');

            const isDark = body.classList.contains('bg-[#111827]');
            if (isDark) {
                // Ganti ke terang
                body.classList.remove('bg-[#111827]', 'text-white');
                body.classList.add('bg-white', 'text-black');
                section.classList.remove('bg-[#1f2937]', 'text-white');
                section.classList.add('bg-gray-100', 'text-black');
                btn.innerText = '🌞 Mode Terang';
            } else {
                // Ganti ke gelap
                body.classList.add('bg-[#111827]', 'text-white');
                body.classList.remove('bg-white', 'text-black');
                section.classList.add('bg-[#1f2937]', 'text-white');
                section.classList.remove('bg-gray-100', 'text-black');
                btn.innerText = '🌙 Mode Gelap';
            }
        }
    </script>

</body>
</html>
