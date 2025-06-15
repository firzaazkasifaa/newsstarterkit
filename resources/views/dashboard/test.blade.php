@if (View::exists('components.app-layout'))
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard Test User
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Halo, Test User 👋</h1>
                    <p class="text-center text-gray-600 dark:text-gray-300">Selamat datang di Portal Berita.</p>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Test User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background-color: #121212; color: #ffffff;">
        <div class="container mt-5">
            <h1 class="text-center">Halo, Test User 👋</h1>
            <p class="text-center">Selamat datang di Portal Berita.</p>
        </div>
    </body>
    </html>
@endif
