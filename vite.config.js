import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import glob from 'glob';

const customJsFiles = glob.sync('resources/js/custom/*.js');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.bundle.css',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/menu.js', 
                ...customJsFiles,
                'resources/js/scripts.bundle.js',
            ],
            refresh: true,
        }),
    ],
});
