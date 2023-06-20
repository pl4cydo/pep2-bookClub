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
    location.reload();
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
                    <Link class="headerExitLink" :href="route('dashboard')">x</Link>
                </div>
            </div>

            <div class="formBody">

                <form @submit.prevent="submit">
                    <div class="formLeft">
                        <div>
                            <label class="label" for="title">Titulo</label>
                            <input id="title" class="input" v-model="form.title" />
                        </div>

                        <div>
                            <label class="label" for="year">Ano de Lançamento</label>
                            <input type="number" id="year" class="input" v-model="form.year" />
                        </div>

                        <div>
                            <label class="label" for="writer">Escritor</label>
                            <input id="writer" class="input" v-model="form.writter" />
                        </div>

                        <div>

                            <label class="label" for="category_id">Categoria</label>
                            <select name="category_id" id="category_id" class="input" v-model="form.category_id">
                                <option class="option" value="1">Select a category</option>
                                <option class="option" v-for="category in categories" :value="category.id" :key="category.id">
                                    {{ category.name }}
                                </option>
                            </select>

                        </div>

                        <div>
                            <label class="label" for="image">Image</label>
                            <input id="image" type="file" class="input" @change="handleImageChange" />
                        </div>
                    </div>

                    <div class="formRigth">
                        <div>
                            <label class="label" for="synopsis">Sinopse</label>
                            <textarea class="textarea" name="synopsis" id="synopsis" cols="25" rows="5" v-model="form.synopsis"></textarea>
                        </div>
                        <button type="submit" class="button"> Novo Livro </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    margin-top: 0%;
    height: 100%;
    width: 100vw;
    /* background-color: aquamarine; */
    position: absolute;
    z-index: 99;
    display: flex;
    backdrop-filter: blur(2px);
    justify-content: center;
}

.formPopUp {
    margin-top: 10%;
    height: 400px;
    width: 700px;
    border: 1px solid white;
    background-color: #1f2937;
}

.formHeader {
    border-bottom: none;
    height: 20%;
    width: auto;
    border-radius: 20px;
    display: flex;
    align-items: center;
}

.formHeader h1 {
    font-size: 50px;
    color: white;
    margin-left: 5%;
}

.formBody {
    border-top: none;
    border-radius: 20px;
    border-top-left-radius: 0%;
    border-top-right-radius: 0%;
    height: 80%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.formBody form {
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
}

.formLeft {
    border: 1px solid white;
    width: 50%;
    height: 100%;
}

.formLeft * {
    padding: 15px;
    padding-bottom: 0%;
    display: flex;
    flex-direction: column;
}

.formRigth {
    border: 1px solid white;
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.formRigth * {
    padding: 15px;
    padding-bottom: 0%;
}

.textarea {
    margin-top: 10px;
    margin-left: 30px;
    background-color: transparent;
    resize: none;
}

.button {
    margin-top: 20px;
    color: white;
    border: 1px solid white;
    margin-left: 40px;
    width: 180px;
    padding: 10px   ;
}

.button:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}

.label {
    position: absolute;
    font-size: 12px;
    margin-top: -25px;
}

.option {
    background-color: #3e3ec5; 
}

.input {
    margin-top: 6px;
    left: 10%;
    color: white;
    position: relative;
    border: 0;
    border-bottom: 1px solid white;
    background: transparent;
    width: 70%;
    height: 10%;
    padding: 8px 0 5px 0;
    font-size: 13px;
}

.input:focus {
    border: none;
    outline: none;
    border-bottom: 1px solid #3e3ec5;
}

.input:hover {
    border-bottom: 1px solid #3e3ec5;
    transition: 0.5s;
}

.input::placeholder {
    color: gray;
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