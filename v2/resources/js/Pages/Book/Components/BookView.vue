<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps({
    id: Number,
    books: Array
})

</script>

<template >
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <h1>{{ id }}</h1> -->
                    <div v-for="book in books" :key="book.id" class="book">
                        <div v-if="book.id == id" class="bookArea">
                            <div>
                                <h1 class="title">{{ book.title }}</h1>
                                <img :src="'/storage/images/' + book.image" alt="Book Image">
                            </div>
                            <div>
                                <p>{{ book.synopsis }}</p>
                                <p>Deal: {{ book.deal == 0 ? false : true }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
    .bookArea {
        display: flex;
    }
    .bookArea div {
        width: 50%;
    }
</style>