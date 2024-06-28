// vite.config.js
import { defineConfig } from "file:///D:/LDK_Work/Source/laravel/helloworld_vite_sample/node_modules/vite/dist/node/index.js";
import laravel from "file:///D:/LDK_Work/Source/laravel/helloworld_vite_sample/node_modules/laravel-vite-plugin/dist/index.js";
import { viteStaticCopy } from "file:///D:/LDK_Work/Source/laravel/helloworld_vite_sample/node_modules/vite-plugin-static-copy/dist/index.js";
var vite_config_default = defineConfig({
  build: {
    manifest: true,
    // sourcemap: "hidden",
    // emptyOutDir: true,
    copyPublicDir: true,
    rollupOptions: {
      input: ["resources/css/app.css", "resources/js/app.js"]
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
    }
  },
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js"
        // "resources/js/util.js",
      ],
      refresh: true
    }),
    viteStaticCopy({
      targets: [
        {
          src: "resources/js/*.js",
          dest: "js/."
        }
      ],
      watch: { options: { usePolling: true }, reloadPageOnChange: true }
    })
  ],
  server: {
    hmr: { host: "localhost", port: 3002 }
    // HMR 엔더포인트 및 프로토콜 설정
    // watch: {
    //     usePolling: true,
    // },
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFxMREtfV29ya1xcXFxTb3VyY2VcXFxcbGFyYXZlbFxcXFxoZWxsb3dvcmxkX3ZpdGVfc2FtcGxlXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCJEOlxcXFxMREtfV29ya1xcXFxTb3VyY2VcXFxcbGFyYXZlbFxcXFxoZWxsb3dvcmxkX3ZpdGVfc2FtcGxlXFxcXHZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9EOi9MREtfV29yay9Tb3VyY2UvbGFyYXZlbC9oZWxsb3dvcmxkX3ZpdGVfc2FtcGxlL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSBcInZpdGVcIjtcbmltcG9ydCBsYXJhdmVsIGZyb20gXCJsYXJhdmVsLXZpdGUtcGx1Z2luXCI7XG5pbXBvcnQgeyB2aXRlU3RhdGljQ29weSB9IGZyb20gXCJ2aXRlLXBsdWdpbi1zdGF0aWMtY29weVwiO1xuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICAgIGJ1aWxkOiB7XG4gICAgICAgIG1hbmlmZXN0OiB0cnVlLFxuICAgICAgICAvLyBzb3VyY2VtYXA6IFwiaGlkZGVuXCIsXG4gICAgICAgIC8vIGVtcHR5T3V0RGlyOiB0cnVlLFxuICAgICAgICBjb3B5UHVibGljRGlyOiB0cnVlLFxuICAgICAgICByb2xsdXBPcHRpb25zOiB7XG4gICAgICAgICAgICBpbnB1dDogW1wicmVzb3VyY2VzL2Nzcy9hcHAuY3NzXCIsIFwicmVzb3VyY2VzL2pzL2FwcC5qc1wiXSxcbiAgICAgICAgICAgIC8vICAgICBvdXRwdXQ6IHtcbiAgICAgICAgICAgIC8vICAgICAgICAgYXNzZXRGaWxlTmFtZXM6IChhc3NldEluZm8pID0+IHtcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIGxldCBleHRUeXBlID0gYXNzZXRJbmZvLm5hbWUuc3BsaXQoXCIuXCIpLmF0KDEpO1xuICAgICAgICAgICAgLy8gICAgICAgICAgICAgaWYgKC9wbmd8anBlP2d8c3ZnfGdpZnx0aWZmfGJtcHxpY28vaS50ZXN0KGV4dFR5cGUpKSB7XG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAgICAgZXh0VHlwZSA9IFwiaW1hZ2VzXCI7XG4gICAgICAgICAgICAvLyAgICAgICAgICAgICB9IGVsc2UgaWYgKC93b2ZmfHdvZmYyfG90Znxlb3R8dHRmLy50ZXN0KGV4dFR5cGUpKSB7XG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAgICAgZXh0VHlwZSA9IFwiZm9udHNcIjtcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJldHVybiBgYXNzZXRzLyR7ZXh0VHlwZX0vW25hbWVdLVtoYXNoXVtleHRuYW1lXWA7XG4gICAgICAgICAgICAvLyAgICAgICAgIH0sXG4gICAgICAgICAgICAvLyAgICAgICAgIGNodW5rRmlsZU5hbWVzOiBcImFzc2V0cy9qcy9bbmFtZV0tW2hhc2hdLmpzXCIsXG4gICAgICAgICAgICAvLyAgICAgICAgIGVudHJ5RmlsZU5hbWVzOiBcImFzc2V0cy9qcy9bbmFtZV0tW2hhc2hdLmpzXCIsXG4gICAgICAgICAgICAvLyAgICAgfSxcbiAgICAgICAgfSxcbiAgICB9LFxuICAgIHBsdWdpbnM6IFtcbiAgICAgICAgbGFyYXZlbCh7XG4gICAgICAgICAgICBpbnB1dDogW1xuICAgICAgICAgICAgICAgIFwicmVzb3VyY2VzL2Nzcy9hcHAuY3NzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvanMvYXBwLmpzXCIsXG4gICAgICAgICAgICAgICAgLy8gXCJyZXNvdXJjZXMvanMvdXRpbC5qc1wiLFxuICAgICAgICAgICAgXSxcbiAgICAgICAgICAgIHJlZnJlc2g6IHRydWUsXG4gICAgICAgIH0pLFxuICAgICAgICB2aXRlU3RhdGljQ29weSh7XG4gICAgICAgICAgICB0YXJnZXRzOiBbXG4gICAgICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgICAgICBzcmM6IFwicmVzb3VyY2VzL2pzLyouanNcIixcbiAgICAgICAgICAgICAgICAgICAgZGVzdDogXCJqcy8uXCIsXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIF0sXG4gICAgICAgICAgICB3YXRjaDogeyBvcHRpb25zOiB7IHVzZVBvbGxpbmc6IHRydWUgfSwgcmVsb2FkUGFnZU9uQ2hhbmdlOiB0cnVlIH0sXG4gICAgICAgIH0pLFxuICAgIF0sXG4gICAgc2VydmVyOiB7XG4gICAgICAgIGhtcjogeyBob3N0OiBcImxvY2FsaG9zdFwiLCBwb3J0OiAzMDAyIH0sIC8vIEhNUiBcdUM1RDRcdUIzNTRcdUQzRUNcdUM3NzhcdUQyQjggXHVCQzBGIFx1RDUwNFx1Qjg1Q1x1RDFBMFx1Q0Y1QyBcdUMxMjRcdUM4MTVcbiAgICAgICAgLy8gd2F0Y2g6IHtcbiAgICAgICAgLy8gICAgIHVzZVBvbGxpbmc6IHRydWUsXG4gICAgICAgIC8vIH0sXG4gICAgfSxcbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUErVSxTQUFTLG9CQUFvQjtBQUM1VyxPQUFPLGFBQWE7QUFDcEIsU0FBUyxzQkFBc0I7QUFFL0IsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsT0FBTztBQUFBLElBQ0gsVUFBVTtBQUFBO0FBQUE7QUFBQSxJQUdWLGVBQWU7QUFBQSxJQUNmLGVBQWU7QUFBQSxNQUNYLE9BQU8sQ0FBQyx5QkFBeUIscUJBQXFCO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQWMxRDtBQUFBLEVBQ0o7QUFBQSxFQUNBLFNBQVM7QUFBQSxJQUNMLFFBQVE7QUFBQSxNQUNKLE9BQU87QUFBQSxRQUNIO0FBQUEsUUFDQTtBQUFBO0FBQUEsTUFFSjtBQUFBLE1BQ0EsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLElBQ0QsZUFBZTtBQUFBLE1BQ1gsU0FBUztBQUFBLFFBQ0w7QUFBQSxVQUNJLEtBQUs7QUFBQSxVQUNMLE1BQU07QUFBQSxRQUNWO0FBQUEsTUFDSjtBQUFBLE1BQ0EsT0FBTyxFQUFFLFNBQVMsRUFBRSxZQUFZLEtBQUssR0FBRyxvQkFBb0IsS0FBSztBQUFBLElBQ3JFLENBQUM7QUFBQSxFQUNMO0FBQUEsRUFDQSxRQUFRO0FBQUEsSUFDSixLQUFLLEVBQUUsTUFBTSxhQUFhLE1BQU0sS0FBSztBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUEsRUFJekM7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
