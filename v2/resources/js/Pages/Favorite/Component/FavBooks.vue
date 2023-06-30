<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import Swal from 'sweetalert2'

const favs = ref([]);
const books = ref([]);
const form = useForm({});

const favsBooks = async () => {
    try {
        const responseBook = await axios.get('listBooks');
        books.value = responseBook.data;

        const response = await axios.get('favBooks');
        favs.value = response.data;
    } catch (error) {
        console.error(error);
    }
}

const favDestroy = (id) => {
    // if(confirm('Como é, amigo?')) {
    //     form.delete(route('favorite.destroy', id))
    //     location.reload()
    // }
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Ao confirmar você vai retirar o livro da sua lista de favoritos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, desfavorite!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('favorite.destroy', id))
            location.reload()
        }
    })
}


onMounted(() => {
    favsBooks()
})


</script>

<template>
    <!-- <h1>FavBook!</h1> -->

    <div class="bookshelf">
        <div class="bloco">
            <h1>Livros Favoritados</h1>

            <div v-for="fav in favs" v-bind:key="fav.id">
                <div v-for="book in books" :key="book.id">
                    <div class="book" v-if="fav.book_id == book.id">
                        <Link class="link" :href="route('book.bookView', { id: book.id })">
                        <p class="title">
                            {{ book.title }}
                        </p>
                        </Link>
                        <form name="favDestroy" @submit.prevent="favDestroy(fav.id)">
                            <button class="button">Desfavoritar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
::-webkit-scrollbar {
    width: 0.5em;
}

::-webkit-scrollbar-track {
    background: transparent;
}

::-webkit-scrollbar-thumb {
    background: transparent;
}

.button {
    color: white;
    padding: 10px;
    border-radius: 6px;
}

.bookshelf {
    width: 100%;
    height: 320px;
    overflow-y: scroll;
    margin: 0;
}

.bloco {
    display: flex;
    flex-direction: column;
    text-align: left;
    justify-content: center;
    color: white;
    padding: 20px;
}

.bookshelf div {
    width: 98%;
}

.book {
    width: 90%;
    margin: 4px;
    text-align: left;
    display: flex;
    padding: 15px;
    align-items: center;
    justify-content: space-between;
    background-color: #283446;
    transition: 0.5s ease-in-out;
}

.book:hover {
    width: 105%;
}

.book img {
    width: 100%;
    height: auto;
}

.title {
    margin-top: 5px;
}
</style>