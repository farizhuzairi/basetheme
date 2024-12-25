import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import postcssImport from 'postcss-import';
// import autoprefixer from 'autoprefixer';
// import postcss from 'postcss';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ]
        }),
    ],
    css: {
        postcss: {
            plugins: [
                postcssImport(),
                tailwindcss(),
            ],
        },
    },
    build: {
        outDir: 'dist',
        rollupOptions: {
            input: {
                main: 'resources/js/app.js',
                styles: 'resources/css/app.css',
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: assetInfo => {
                    if (assetInfo.name.endsWith('.css')) {
                        return 'css/[name].[ext]';
                    }
                    return 'assets/[name].[ext]';
                },
            },
        },
        assetsDir: '',
        manifest: false,
    },
});
