import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                 // CSS
                'resources/css/app.css',
                'resources/css/nav-footer.css',
                'resources/css/product.css',
                'resources/css/order.css',
                
                // JS
                'resources/js/app.js',
                'resources/js/product.js',
                'resources/js/transaction.js',
                'resources/js/order/order.js',
                'resources/js/order/status.js',
            ],
            refresh: true,
        }),
    ],
});