import { defineConfig } from 'vite'
import AutoImport from 'unplugin-auto-import/vite'
import Laravel from 'laravel-vite-plugin'
import UnoCSS from 'unocss/vite'
import Vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    AutoImport({ imports: ['vue'] }),
    Laravel({
      input: 'resources/js/app.ts',
      refresh: true,
    }),
    UnoCSS(),
    Vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
})
