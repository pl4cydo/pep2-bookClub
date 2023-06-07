<script setup>

defineProps({
    id: Number,
    books: Array
})

</script>

<template >
    <h1>{{ id }}</h1>
    <div v-for="book in books" :key="book.id" class="book">
        <div v-if="book.id == id">
            <img :src="'/storage/images/' + book.image" alt="Book Image">
            <p class="title">{{ book.title }}</p>
        </div>
    </div>
</template>