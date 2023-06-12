<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link
        class="link"
    >
        <slot />
    </Link>
</template>

<style scoped>
.link {
    display: block;
    width: 100%;
    padding-left: 4px;
    padding-right: 4px;
    padding-top: 2px;
    padding-bottom: 2px;
    text-align: left;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: #3e3ec5;
    transition-duration: 150ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  .link:hover,
  .link:focus {
    background-color: #f7fafc;
    outline: none;
  }

</style>
