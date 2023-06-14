<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import axios from 'axios';


const categories = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/category2');
    categories.value = response.data;
  } catch (error) {
    console.error(error);
  }
});

// let a = defineProps({
//     categories: Array
// })



const form = useForm({
    title: '',
    year: '',
    writter: '',
    synopsis: '',
    image: null,
    category_id: ''
});

const submit = () => {
    form.post(route('book.store'))
    form.title = ''
    form.year = ''
    form.writter = ''
    form.synopsis = ''
    form.image = null
    form.category_id = ''
}

const handleImageChange = (event) => {
    form.image = event.target.files[0]
}

</script>

<template>
        <div class="container">

            <div class="formPopUp">
    
                <div class="formHeader">
    
                    <div class="headerTitle">
                        <h1>New Book</h1>
                    </div>
    
                    <div class="headerExit">
                        <Link class="headerExitLink" :href="route('book.index')">x</Link>
                    </div>
                </div>
    
                <div class="formBody">
    
                    <div class="blocoFormBody">
                        <form name="bookForm" @submit.prevent="submit">
                            <div>
                                <label for="title">Title</label>
                                <input id="title" class="input" v-model="form.title" />
                            </div>
    
                            <div>
                                <label for="year">Year</label>
                                <input type="number" id="year" class="input" v-model="form.year" />
                            </div>
    
                            <div>
                                <label for="writer">Writer</label>
                                <input id="writer" class="input" v-model="form.writter" />
                            </div>
    
                            <div>
    
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="input" v-model="form.category_id">
                                    <option value="1">Select a category</option>
                                    <option v-for="category in categories" :value="category.id" :key="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
    
                            </div>
    
                            <div>
                                <label for="synopsis">Sinopse</label>
                                <!-- <input type="textarea" id="synopsis" name="synopsis"> -->
                                <textarea name="synopsis" id="synopsis" cols="30" rows="10" v-model="form.synopsis"></textarea>
    
                            </div>
    
                            <div>
                                <label for="image">Image</label>
                                <input id="image" type="file" class="input" @change="handleImageChange" />
                            </div>
    
                            <button type="submit" class="button"> Send </button>
                        </form>
                    </div>
    
    
                </div>
    
            </div>
    
        </div>
    
</template>

<style scoped>
.container {
    margin-top: 0%;
    height: 100vh;
    width: 100vw;
    /* background-color: aquamarine; */
    position: absolute;
    z-index: 99;
    display: flex;
    backdrop-filter: blur(2px);
    justify-content: center;
}

.formPopUp {
    margin-top: 5%;
    height: 500px;
    width: 700px;
}

.formHeader {
    border: 1px solid gray;
    border-bottom: none;
    height: 30%;
    width: auto;
    background-color: dodgerblue;
    border-radius: 20px;
    border-bottom-left-radius: 0%;
    border-bottom-right-radius: 0%;
    display: flex;
    align-items: center;
}

.formHeader h1 {
    font-size: 50px;
    color: white;
    margin-left: 5%;
}

.formBody {
    border: 1px solid gray;
    border-top: none;
    border-radius: 20px;
    border-top-left-radius: 0%;
    border-top-right-radius: 0%;
    height: 90%;
    width: auto;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.blocoFormBody form {
    /* border: 1px solid black; */
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

}

.input {
    background-color: white;
    color: black;
    padding: 5px;
    width: 100%;
    font-size: 16px;
    border: 1px solid black;
}

.input:focus {
    outline: none;
    border-color: black;
}

.input::placeholder {
    color: gray;
}

.button {
    margin-top: 20px;
    background-color: blue;
    color: aliceblue;
}

 .headerTitle {
    height: 100%;
    width: 90%;
    display: flex;
    align-items: center;
 }

 .headerExit {
    height: 100%;
    width: 10%;
 }

 .headerExitLink {
    margin-top: 60%;
    margin-left: 30%;
    font-size: 30px;
    color: white;
 }
</style>