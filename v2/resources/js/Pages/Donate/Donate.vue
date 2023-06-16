<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MessageCreate from '../Messages/Component/MessageCreate.vue';


</script>

<template>
    <Head title="Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book</h2>
        </template>

        <div class="py-12 text-white">
            <div class="bloco">
                <h1>Doar Livros</h1>
                <MessageCreate />
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>

.bloco {
    overflow: hidden;
    border: 1px solid white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    border-radius: 0.25rem;
  }
  
</style>