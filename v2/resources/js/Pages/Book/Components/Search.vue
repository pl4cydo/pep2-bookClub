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
            <label for="searchValue">Buscar Livros</label>
            <div class="flex">
                <input type="text" v-model="searchValue" @value="Livros">
                <button @click="searchBooks">Search</button>
            </div>
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
        margin-left: 40px;
      /*  border: 1px solid white; */
    }
    .searchDiv {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 60%;
        justify-content: center;
    }

    .searchDiv label {
        font-size: 12px;
    }

    .searchDiv button {
        width: 20%;
        color: white;
        border-radius: 20px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border: 1px solid white;
        box-shadow: 5px 5px 5px #131820;
    }

    .searchDiv button:hover {
        background-color: #2c3b4e;
        transition: 0.8s ease;
        color: white;
        border: 1px solid #3e3ec5;
    }
    .searchDiv input {
        color: white;
        position: relative;
        border: 0;
        border-bottom: 1px solid white;
        background: transparent;
        width: 70%;
        padding: 8px 0 5px 0;
        font-size: 16px;
        box-shadow: 0px 5px 5px #131820;
    }
    
    .searchDiv input:focus {
        border: none;
        outline: none;
        border-bottom: 1px solid #3e3ec5;
    }
    
    .searchDiv input:hover {
        border-bottom: 1px solid #3e3ec5;
        transition: 0.5s;
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
  