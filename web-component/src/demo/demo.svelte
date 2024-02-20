<svelte:options customElement="web-component-demo" />

<script lang="ts">
	import { Component } from '$lib/bundle';
	import HelloWorld from './hello-world.svelte';
</script>

<Component>
	<!--
		It's helpful to have a nested component otherwise during development the HMR will error due to
		calling customElements.define twice.
	-->
	<HelloWorld />
</Component>
