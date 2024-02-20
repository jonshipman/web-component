import { svelte } from '@sveltejs/vite-plugin-svelte';
import { defineConfig } from 'vite';

export default defineConfig({
	resolve: { alias: { $lib: '/src' } },
	build: {
		lib: {
			entry: 'src/main.ts',
			name: 'WebComponentDemo',
			fileName: 'web-component-demo',
			formats: ['iife']
		}
	},
	plugins: [svelte()]
});
