import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '~': path.resolve(__dirname, 'resources/sass'),
            '@fortawesome/fontawesome-free': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
            jquery: 'jquery/src/jquery',
        },
    },

    server: {
        hmr: {
            host: 'localhost',
        },
    },

    optimizeDeps: {
        include: ['jquery', 'bootstrap', 'alpinejs'],
    },
});
