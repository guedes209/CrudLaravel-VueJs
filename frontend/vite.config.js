import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
      'balm-ui-css': 'balm-ui/dist/balm-ui.css',
      'balm-ui-plus': 'balm-ui/dist/balm-ui-plus.esm.js',
    }
  },
  devServer: {
    host: '127.0.0.1',
    hot: true,
    https: false,
    allowedHosts: [
      'myhost.mydomain.com'
    ],
    public: '127.0.0.1:5173'
  }
})
