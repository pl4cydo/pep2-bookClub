<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

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
    <div class="searchBloco">
        <div class="searchDiv">
            <input type="text" v-model="searchValue">
            <button @click="searchBooks">Search</button>
        </div>

        <div class="searchBook">
            <ul>
                <li v-for="book in books" :key="book.id">
                    <Link class="liBook" :href="route('book.bookView', { id:book.id })">
                        <img class="bookImg" :src="'/storage/images/' + book.image" alt="Book Image">
                        {{ book.title }}
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>
  
  
  
<style scoped>
/* Estilos opcionais para o componente */

    .searchBloco {
        display: flex;
        height: 100%;
        width: 100%;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .searchDiv {
        display: flex;
        width: 100%;
        height: 60%;
    }

    .searchDiv button {
        width: 20%;
        background-color:rgb(0, 184, 184);
        color: white;
        border-radius: 20px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .searchDiv input {
        width: 80%;
        border-radius: 20px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .searchBook {
        height: auto;
        width: 100%;
        margin-top: 175px ;
        position: absolute;
        background-color: cadetblue;
    }

    .searchBook ul {
        height: auto;
        display: flex;
        align-items: center;
    }

    .liBook {
        display: flex;
    }

    .bookImg {
        width: 100px;
    }
</style>
  