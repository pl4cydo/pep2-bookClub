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
    category_id: '',
    selfComment: ''
});

const submit = () => {
    form.post(route('book.store'))
    form.title = ''
    form.year = ''
    form.writter = ''
    form.synopsis = ''
    form.image = null
    form.category_id = ''
    form.selfComment = ''
    // location.reload();
}

const handleImageChange = (event) => {
    form.image = event.target.files[0]
}

</script>

<template>
    <div class="container">

        <div class="formPopUp">

            <div class="formHeader">
                <div class="headerExit">
                    <Link class="headerExitLink" :href="route('dashboard')">x</Link>
                </div>
            </div>

            <form @submit.prevent="submit">
                <div class="form">

                    <div class="bloquinho">
                        <div>
                            <label class="label" for="title">Titulo</label>
                            <input id="title" class="input" v-model="form.title" placeholder="Titulo" />
                        </div>

                        <div>
                            <label class="label" for="year">Ano de Lançamento</label>
                            <input type="number" id="year" class="input" v-model="form.year" placeholder="Lançamento" />
                        </div>
                    </div>

                    <div class="bloquinho">
                        <div>
                            <label class="label" for="writer">Escritor</label>
                            <input id="writer" class="input" v-model="form.writter" placeholder="Escritor" />
                        </div>

                        <div>

                            <label class="label" for="category_id">Categoria</label>
                            <select name="category_id" id="category_id" class="input jorge" v-model="form.category_id" >
                                <option class="optionCategory" value="" disabled selected hidden>Categoria</option>
                                <option class="option" v-for="category in categories" :value="category.id"
                                    :key="category.id">
                                    {{ category.name }}
                                </option>
                            </select>

                        </div>
                    </div>


                    <div class="mt-2">
                        <label class="label" for="image">Image</label>
                        <input id="image" type="file" class="input" @change="handleImageChange" />
                    </div>

                    <div class="divText">
                        <label class="label" for="synopsis">Sinopse</label>
                        <textarea class="textarea" name="synopsis" id="synopsis" v-model="form.synopsis"></textarea>
                    </div>

                    <div class="divText">
                        <label class="label" for="selfComment">Comentário sobre o estado do livro</label>
                        <textarea class="textarea" name="seflComment" id="seflComment"
                            v-model="form.selfComment"></textarea>
                    </div>


                    <div class="divButton">
                        <button type="submit" class="button"> Confirmar </button>
                    </div>
                </div>

                <!-- <div class="formRigth">
                        
                    </div> -->
            </form>
        </div>
    </div>
</template>

<style scoped>
.container {
    top: 0;
    height: 100%;
    width: 100%;
    max-width: none;
    /* background-color: aquamarine; */
    position: fixed;
    z-index: 9998;
    display: flex;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.formPopUp {
    height: 500px;
    width: 400px;
    background-color: #1f2937;
    transition: all 0.3s ease;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    align-items: center;
}


.formHeader {
    border-bottom: none;
    width: auto;
    display: flex;
    justify-content: end;
    width: 100%;
}

form {
    width: 90%;
    height: 85%;
}

.textarea {
    background-color: transparent;
    resize: none;
}

.divButton {
    width: 100%;
    display: flex;
    justify-content: end;
    align-items: center;
}

.button {
    margin-top: 5px;
    color: white;
    border-bottom: 1px solid white;
    margin-left: 40px;
    padding: 10px;

}

.button:hover {
    background-color: #2c3b4e;
    transition: 0.8s ease;
}

.label {
    font-size: 13px;
}

.option {
    background-color: #3e3ec5;
}

.optionCategory {
    font-size: 1px;
    text-align: justify;
}

.bloquinho {
    display: flex;
    justify-content: space-between;
}

.bloquinho * {
    width: 48%;
}

.input {
    color: white;
    border: 0;
    border-bottom: 1px solid white;
    background: transparent;
    width: 100%;
    height: 29px;
    padding: 4px 0 5px 0;
    font-size: 13px; 
}

.jorge {
    height: 29px;
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

.divText {
    padding-top: 10px;
}

.divText textarea {
    width: 100%;
}

</style>