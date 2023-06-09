<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref, watch, watchEffect } from 'vue';

defineProps({
    book_id: Promise
});

const form = useForm({
    comments: '',
    book_id: ''
});

const submit = () => {
    form.post(route('comments.store'))
    form.comments = ''
}

watchEffect(async () => {
  const bookId = await book_Id;
  bookIdRef.value = bookId;
});

</script>

<template>
    <div class="commentForm">
        <form name="commentForm" @submit.prevent="submit">
            <legend>Escreva um comentario</legend>
            <textarea rows="4" cols="80" name="comments" id="comments" v-model="form.comments"></textarea>
            <input type="text" name="book_id" id="book_id" v-model="bookIdRef">
            <button>Send</button>
        </form>
    </div>
</template>

<style scoped>

</style>