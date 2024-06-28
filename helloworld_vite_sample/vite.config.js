import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    //build: {
    // outDir: "build",
    // manifest: true,
    // sourcemap: "hidden",
    // emptyOutDir: false,
    // copyPublicDir: true,
    // rollupOptions: {
    //    input: ["resources/css/app.css", "resources/js/app.js"],
    //     output: {
    //         assetFileNames: (assetInfo) => {
    //             let extType = assetInfo.name.split(".").at(1);
    //             if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
    //                 extType = "images";
    //             } else if (/woff|woff2|otf|eot|ttf/.test(extType)) {
    //                 extType = "fonts";
    //             }
    //             return `assets/${extType}/[name]-[hash][extname]`;
    //         },
    //         chunkFileNames: "assets/js/[name]-[hash].js",
    //         entryFileNames: "assets/js/[name]-[hash].js",
    //     },
    // },
    //},
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                // "resources/js/util.js",
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: "resources/js/*.js",
                    dest: "js/.",
                },
                // {
                //     src: "resources/js/app.js",
                //     dest: "js/.",
                // },
            ],
            watch: { options: { usePolling: true }, reloadPageOnChange: true },
        }),
    ],
    server: {
        hmr: { host: "localhost", port: 3002 }, // HMR 엔더포인트 및 프로토콜 설정
        watch: {
            usePolling: true,
        },
    },
});
