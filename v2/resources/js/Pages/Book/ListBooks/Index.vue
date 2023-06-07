<script setup>

defineProps({
    books: Array
});

</script>

<template>
    <h1>List Books</h1>
    <div class="bookshelf">
        <div v-for="book in books" :key="book.id" class="book">
          <img :src="'/storage/images/' + book.image" alt="Book Image">
          <p class="title">{{ book.title }}</p>
        </div>
    </div>
</template>

<style scoped>
    .bookshelf {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
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