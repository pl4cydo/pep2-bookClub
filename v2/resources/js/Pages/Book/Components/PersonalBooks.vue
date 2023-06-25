<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

// const books = ref([]);

// onMounted(() => {

// });


defineProps({
  books: Array,
  user: Number
})
</script>

<template>
  <div class="bookshelf">
    <h1>Personal Book</h1>
    <div class="flex">
      <div v-for="book in books" class="book" v-bind:key="book.id">
        <div v-if="book.user_id == user">
          <Link class="link" :href="route('book.bookView', { id: book.id })"><img :src="'/storage/images/' + book.image"
            alt="Book Image"></Link>
          <p class="title">{{ book.title }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bookshelf {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  flex-direction: column;
  color: white;
}

.book {
  width: 150px;
  margin: 10px;
  text-align: center;
}

.book img {
  width: 100%;
  height: auto;
}

.title {
  margin-top: 5px;
}
</style>