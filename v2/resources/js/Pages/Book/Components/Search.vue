<script setup>
import { ref } from 'vue';
import axios from 'axios';

const searchValue = ref('');
const books = ref([]);

const searchBooks = async () => {
    try {
        const response = await axios.get(`/book/search/${searchValue.value}`);
        books.value = response.data;
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <div>
        <input type="text" v-model="searchValue">
        <button @click="searchBooks">Pesquisar</button>

        <ul>
            <li v-for="book in books" :key="book.id">{{ book.title }}</li>
        </ul>
    </div>
</template>
  
  
  
<style scoped>
/* Estilos opcionais para o componente */
</style>
  