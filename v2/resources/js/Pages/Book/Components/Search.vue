<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'

const searchValue = ref('');
const books = ref([]);
const boo = ref(false)

const searchBooks = async () => {
    try {
        const response = await axios.get(`/book/search/${searchValue.value}`);
        books.value = response.data;
        boo.value = true
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <div class="searchBloco">
        <div class="searchDiv">
            <label for="searchValue" hidden>Buscar Livros</label>
            <div class="flex">
                <input type="text" placeholder="Buscar Livros" v-model="searchValue" @value="Livros">
                <button @click="searchBooks">Search</button>
            </div>
        </div>
        
        <div class="searchBook" v-if="boo">
            <ul>
                <li v-for="book in books" :key="book.id">
                    <Link class="liBook" :href="route('book.bookView', { id:book.id })">
                        <!-- <img class="bookImg" :src="'/storage/images/' + book.image" alt="Book Image"> -->
                        <MagnifyingGlassIcon class="icon" />
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
        margin-top: -4px ;
        display: flex;
        height: 100%;
        width: 100%;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-left: 40px;
    }
    .searchDiv {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 60%;
        justify-content: center;
        box-sizing: border-box;
    }

    .icon {
        width: 25px;
        height: 25px;
        margin-right: 5px;
        color: white;
        
    }

    .searchDiv label {
        font-size: 12px;
    }

    .searchDiv button {
        margin-top: 3px;
        width: 100px;
        height: 34px;
        font-size: 12px;
        color: white;
        border-radius: 6px;
        text-align: left;
        padding-left: 5px;
        box-sizing: border-box;

       /*  border: 1px solid white;
       box-shadow: 5px 5px 5px #131820; */
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
        width: 50%;
        height: 34px;
        padding: 8px 0 5px 0;
        font-size: 12px;
        box-shadow: 0px 5px 3px #131820;
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
        margin-left: -40%;
        margin-top: 25%;
        position: absolute;
        background-color: #1f2937;
        box-shadow: 0 0 10px #131820;
        padding: 10px;
    }

    .searchBook ul {
        height: auto;
        display: flex;
        align-items: center;
    }

    .searchBook li {
        width: 100%;
        transition: 300ms ease;
    }

    .searchBook li:hover {
        opacity: 0.5;
    }


    .liBook {

        display: flex;
        width: 100%;
    }

    .bookImg {
        width: 100px;
    }
</style>
  