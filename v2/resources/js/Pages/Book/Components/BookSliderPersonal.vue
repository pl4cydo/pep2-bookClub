<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref} from 'vue';


const categories = ref([]);
const margin = ref('0px')
const books = ref([]);
const count = ref(0);
const countNext = ref(0);

// const cateogori = ref(category)

// let a = defineProps({
//     categoryNumber: Object
// })

const next = () => {
    console.log('aqui')
    const currentMargin = parseInt(margin.value);
    if (count.value > 7 && countNext.value > 0) {
        margin.value = (currentMargin - 150) + 'px';
        countNext.value--;
        // console.log(countNext.value);
    }
}

const back = () => {
    const currentMargin = parseInt(margin.value);
    // console.log(currentMargin)
    if (currentMargin < 0) {
        countNext.value++;
        margin.value = (currentMargin + 150) + 'px';
    }
}

const list = async () => {
    try {
        const responseBook = await axios.get('listBooks');
        books.value = responseBook.data;
        // console.log(books.value)
        count.value = books.value.length
    } catch (error) {
        console.error(error);
    }
}

const listCategory = async () => {
    try {
        const response = await axios.get('/category2');
        categories.value = response.data;
    } catch (error) {
        console.error(error);
    }
}

onMounted(async () => {
    
    await list()
    await listCategory()
    const response = await axios.get('/user-id');
    const userId = response.data;
    count.value = books.value.filter(book => book.user_id == userId).length
    // console.log(count.value)
    // console.log(books.value.length)
    // count.value = books.value.length
    // if (a.categoryNumber.a) {
    // } else {
    // }
    countNext.value = count.value < 5 ? (count.value - 5) * -1 : count.value - 5;
    // console.log(count.value, countNext.value)
})

</script>

<template>
    <div class="flex">
        <!-- <div v-for="category in categories" v-bind:key="category.id">
            <div v-if="categoryNumber.a != null">
                <h1 v-if="category.id == categoryNumber.a">
                    de: {{ category.name }}
                </h1>
            </div>
        </div> -->
    </div>
    <div class="small-slider-container">
        <h1 class=" p-2 color-white">
            Livros
        </h1>
        <div class="small-slider" :style="{ left: margin }">
            <div class="books" v-for="(book) in books" :key="book.id">
                <div class="blocoBook" v-if="book.user_id == $page.props.auth.user.id">
                    <Link :href="route('book.bookView', { id: book.id })">
                        <img :src="'/storage/images/' + book.image" alt="Book Image" class="small-slider-img">
                        <p class="title">{{ book.title }}</p>
                    </Link>
                </div>
                <!-- <div class="blocoBook" v-if="categoryNumber.a == null">
                    <Link :href="route('book.bookView', { id: book.id })">
                        <img :src="'/storage/images/' + book.image" alt="Book Image" class="small-slider-img">
                        <p class="title">{{ book.title }}</p>
                    </Link>
                </div> -->
            </div>
        </div>
        <div class="small-button-container">
            <button id="prev-button" @click="back()" class="prev-button">&lt;</button>
            <button id="next-button" @click="next()" class="next-button">&gt;</button>
        </div>
        <!-- <p>Total de livros renderizados: {{ renderedBooksCount }}</p> -->
        <!-- <div v-if="cateogory.">

                </div> -->
    </div>
</template>
  
<style scoped>
.small-slider-container {
    overflow: hidden;
    position: relative;
    /*background-color: #1f2937; */
    
    width: 100%;
    border-radius: 8px;
    background-color: #283446;
    box-shadow: 0px 5px 5px #131820;
    color: rgb(255, 255, 255);
}

.small-slider {
    margin-left: 10px;
    display: flex;
    position: relative;
    align-items: center;
    height: 250px;
    width: 5000px;
    transition: 0.8s ease;
    max-width: none;
}

.books {
    width: auto;
}

.small-slider-img {
    width: 140px;
    height: 200px;
    margin-right: 10px;
    transition: transform 0.1s;
    border: solid white;
    border-radius: 6px;
}

/*
.small-slider-img:hover {
    cursor: pointer;
    transform: scale(1.1);
} */

.small-button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    left: 10px;
    z-index: 1;
}

.prev-button,
.next-button {
    background: none;
    border: none;
    font-size: 24px;
    color: white;
    cursor: pointer;
}

#prev-button {
    margin-left: 10px;
}

#next-button {
    margin-right: 10px;
}


.blocoBook {
  /*  border: 1px solid white;*/
    text-overflow: clip;
    overflow: hidden;
    width: 140px;
    height: 230px;
    padding-top: 10px;
    margin: 5px;
    transition: 300ms ease;
}

.blocoBook:hover {
    cursor: pointer;
    transform: scale(1.1);
}

</style>
  