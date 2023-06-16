<script setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { HeartIcon  } from '@heroicons/vue/24/solid'


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
        <button id="favButton">
            <HeartIcon class="heart" />
        </button>
    </form>
</template>

<style scoped>
    #favButton {
        height: 40px;
        width: 40px;
        cursor: pointer;
    }

    .heart{
        color: red;
        width: 40px;
    }

    #heart:hover {
        color: white;
    }
</style>