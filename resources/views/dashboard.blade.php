<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-base">
                        Ini adalah halaman dashboard utamamu. Dari sini, kamu bisa mengakses fitur-fitur portal berita sesuai dengan peranmu:
                    </p>
                    <ul class="list-disc list-inside mt-4 space-y-1">
                        <li>📰 Melihat dan menyunting berita (untuk Editor & Reporter)</li>
                        <li>🗂️ Mengelola kategori dan user (untuk Admin)</li>
                        <li>📊 Melihat statistik berita (untuk semua peran)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
