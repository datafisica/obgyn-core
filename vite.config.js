import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // 1. Importar el plugin

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: '0.0.0.0', // Permite conexiones desde fuera de 127.0.0.1
        hmr: {
            host: 'local.obgyn.com', // El dominio que usas en el navegador
        },
        cors: true,
    },
});


