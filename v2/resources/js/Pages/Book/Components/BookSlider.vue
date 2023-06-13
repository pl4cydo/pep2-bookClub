<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';


let a = defineProps({
    category: Object
})


const margin = ref('0px')
const books = ref([]);
const count = ref(0)
// const cateogori = ref(category)


const next = () => {
    const currentMargin = parseInt(margin.value);
    margin.value = (currentMargin - 145) + 'px';
    if (count > 7) {
    }
}

const back = () => {
    const currentMargin = parseInt(margin.value);
    console.log(currentMargin)
    if (currentMargin < 0)
        margin.value = (currentMargin + 145) + 'px';
}


const list = async () => {
    try {
        const responseBook = await axios.get('listBooks');
        books.value = responseBook.data;
        count.value = books.value.length
        console.log(count.value)
    } catch (error) {
        console.error(error);
    }
}

onMounted(() => {
    list()
})

</script>

<template>
    <h1 class="categories-title">Livros</h1>
    <div class="small-slider-container">
        <div class="small-slider" :style="{ left: margin }">
            <div class="books" v-for="book in books" :key="book.id">
                <div v-if="book.category_id == category.a">
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
        <!-- <div v-if="cateogory.">

        </div> -->
        {{ category.a }}

    </div>
</template>
  
<style scoped>
.small-slider-container {
    overflow: hidden;
    position: relative;
    border: 1px solid black;
    width: 100%;
}

.small-slider {
    margin-left: 10px;
    display: flex;
    position: relative;
    align-items: center;
    height: 250px;
    width: 2000px;
    transition: 0.8s ease;
    max-width: none;
}

.small-slider-img {
    width: 140px;
    height: 200px;
    margin-right: 10px;
    transition: transform 0.1s;
    border: solid blueviolet;
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
    color: blueviolet;
    cursor: pointer;
}

#prev-button {
    left: 10px;
}

#next-button {
    right: 10px;
}
</style>
  