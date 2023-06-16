<script setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';


let a = defineProps({
    bookId: Number,
})

const form = useForm({
    book_id: '',
})

onMounted(() => {
    form.book_id = a.bookId
    console.log(form.book_id)
})

const submit = () => {
    form.post(route('favorite.store'))
}


</script>

<template>
    <form name="favForm" @submit.prevent="submit">
        <button id="favButton">Add to Favorites</button>
    </form>
</template>

<style scoped>
    #favButton {
        background-color: #f0f0f0;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    #favButton:hover {
        background-color: #e0e0e0;
    }

    #favButton {
        background-color: white;
        color: black;
    }
</style>