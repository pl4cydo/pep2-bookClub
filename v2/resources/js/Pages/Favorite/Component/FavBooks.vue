<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

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
    if(confirm('Como é, amigo?')) {
        form.delete(route('favorite.destroy', id))
        location.reload()
    }
}


onMounted(() => {
    favsBooks()
})


</script>

<template>
    <h1>FavBook!</h1>

    <div class="bookshelf">
        <div v-for="fav in favs">
            <div v-for="book in books" :key="book.id" class="book">
                <div v-if="fav.book_id == book.id">
                    <Link class="link" :href="route('book.bookView', { id: book.id })">
                    <img :src="'/storage/images/' + book.image" alt="Book Image">
                    </Link>
                    <p class="title">
                        {{ book.title }}
                    </p>
                    <form name="favDestroy" @submit.prevent="favDestroy(fav.id)">
                        <button class="button" >Destroy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

.button {
    background-color: red;
    color: white;
    padding: 10px;
    border-radius: 6px;
}
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