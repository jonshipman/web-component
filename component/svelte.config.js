import adapter from '@sveltejs/adapter-static';
import { vitePreprocess } from '@sveltejs/vite-plugin-svelte';

/** @type {import('@sveltejs/kit').Config} */
const config = {
	compilerOptions: {
		customElement: true
	},
	preprocess: vitePreprocess(),
	kit: {
		adapter: adapter()
	}
};

export default config;
