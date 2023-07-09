<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import axios from 'axios';

const books = ref([]);
const user = usePage().props.auth.user.id;

const a = defineProps({
    id: Number
})



// Função para obter os livros
const getBooks = async () => {
  try {
    const response = await axios.get(route('book.listBooks'));
    books.value = response.data;
    const responseId = await axios.get('/user-id');
    const userId = responseId.data;
    books.value = books.value.filter(book => book.user_id == userId && !book.deal )
    // console.log(books.value)
  } catch (error) {
    console.error(error);
  }
};

const form = useForm({
    idBook: a.id,
    idUser: user,
    text: '',
    dealBookId: '',
})

const submit = () => {
    form.post(route('deal.store'))
    location.reload();
}


// Chama a função getBooks quando o componente é montado
onMounted(() => {
    getBooks()
});
</script>

<template>
    <div class="container">

        <div class="formPopUp">

            <div class="formHeader">

                <h1>Inciar Transação</h1>
                <div class="headerExit">
                    <Link class="headerExitLink" :href="route('book.bookView', { id: id })">x</Link>
                </div>
            </div>

            <form @submit.prevent="submit">
                <div class="form">

                    <div class="divText">
                        <label class="label" for="selfComment">Fale sobre o estado do livro para a troca</label>
                        <textarea class="textarea" name="text" id="text" v-model="form.text"
                            ></textarea>
                    </div>

                    <div class="bloquinho">
                        <div>

                            <label class="label" for="book_id">Selecione o livro para a troca</label>
                            <select name="book_id" class="input jorge" v-model="form.dealBookId" >
                                <option class="optionCategory" value="" disabled selected hidden>Meus Livros</option>
                                <option class="option" v-for="book in books" :value="book.id"
                                    :key="book.id">
                                        {{ book.title }}
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="divButton">
                        <button type="submit" class="button"> Confirmar </button>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
.container {
    color: white;
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
    height: 300px;
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
    justify-content: space-between;
    width: 100%;
}

.formHeader h1 {
    margin: 10px
}

form {
    width: 90%;
    height: 85%;
}

.textarea {
    height: 100px;
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