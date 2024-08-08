import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import commonjs from 'vite-plugin-commonjs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        commonjs()
    ],
});
