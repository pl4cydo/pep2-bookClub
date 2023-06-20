<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const categories = ref([]);
const margin = ref('0px')
const books = ref([]);
const count = ref(0);
const countNext = ref(0);
// const cateogori = ref(category)

let a = defineProps({
    categoryNumber: Object
})

const next = () => {
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
    // console.log(books.value.length)
    if (a.categoryNumber.a) {
        count.value = books.value.filter(book => book.category_id == a.categoryNumber.a).length
    } else {
        count.value = books.value.length
    }
    countNext.value = count.value < 7 ? (count.value - 7) * -1 : count.value - 7;
    // console.log(count.value, countNext.value)
})

</script>

<template>
    <div class="flex">
        <h1 class="mr-1">
            Livros
        </h1>
        <div v-for="category in categories">
            <div v-if="categoryNumber.a != null">
                <h1 v-if="category.id == categoryNumber.a">
                    de: {{ category.name }}
                </h1>
            </div>
        </div>
    </div>
    <div class="small-slider-container">
        <div class="small-slider" :style="{ left: margin }">
            <div class="books" v-for="(book, index) in books" :key="book.id">
                <div class="blocoBook" v-if="categoryNumber.a != null && book.category_id == categoryNumber.a">
                    <Link :href="route('book.bookView', { id: book.id })">
                        <img :src="'/storage/images/' + book.image" alt="Book Image" class="small-slider-img">
                        <p class="title">{{ book.title }}</p>
                    </Link>
                </div>
                <div class="blocoBook" v-if="categoryNumber.a == null">
                    <Link :href="route('book.bookView', { id: book.id })">
                        <img :src="'/storage/images/' + book.image" alt="Book Image" class="small-slider-img">
                        <p class="title">{{ book.title }}</p>
                    </Link>
                </div>
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
    border: 1px solid white;
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
}

.small-slider-img:hover {
    cursor: pointer;
    transform: scale(1.1);
}

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
    left: 10px;
}

#next-button {
    right: 10px;
}


.blocoBook {
  /*  border: 1px solid white;*/
    text-overflow: clip;
    overflow: hidden;
    width: 140px;
    height: 230px;
    margin: 5px;
}
</style>
  