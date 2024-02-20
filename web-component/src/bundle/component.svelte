<script lang="ts">
	import Dev from './dev.svelte';
	import tailwind from './tailwind.css?inline';

	function mount(node: HTMLDivElement) {
		const style = document.createElement('style');
		style.innerHTML = tailwind;
		node.append(style);
	}
</script>

<div use:mount>
	{#if import.meta.env.MODE === 'development'}
		<Dev>
			<slot />
		</Dev>
	{:else}
		<slot />
	{/if}
</div>
