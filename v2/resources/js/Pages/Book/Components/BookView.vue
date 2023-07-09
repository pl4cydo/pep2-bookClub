<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Comment from '../../Comment/Comment.vue';
import { onMounted, ref } from 'vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import ButtonFav from '../../Favorite/Component/ButtonFav.vue';
import { CheckCircleIcon } from '@heroicons/vue/24/solid'
import { XCircleIcon } from '@heroicons/vue/24/outline'
import Swal from 'sweetalert2'
import UpdateBook from './UpdateBook.vue';
import DealBook from './DealBook.vue';

const boo = ref(false);
const update = ref(false);
const deal = ref(false);

let a = defineProps({
    books: Array,
    comments: Array,
    userBook: Array,
    categories: Array
})

let ab = a.books[0].id

const form = useForm({
    comments: '',
    book_id: ''
});

const submit = () => {
    form.book_id = ab
    form.post(route('comments.store'))
    form.comments = ''
}

const commentDestroy = (a) => {
    console.log(a)
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não pode reverter isso",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('comments.destroy', a))
            location.reload();
        }
    })

}

</script>

<template >
    <AuthenticatedLayout>

        <Teleport to="body ">
            <UpdateBook v-if="update" :book="books" />
        </Teleport>
        <Teleport to="body ">
            <DealBook v-if="deal" :id="ab" />
        </Teleport>
        <div class="blocao">
            <div class="bloco">
                <!-- <h1>{{ id }}</h1> -->
                <div class="bookView">

                    <div class="test1">
                        <img class="m-5" :src="'/storage/images/' + books[0].image" alt="Books Image">
                    </div>
                    <div class="test2">

                        <div class="intraTest2">
                            <div class="titleBloco">
                                <h1 class="title">{{ books[0].title }}</h1>
                                <div
                                    v-if="a.books[0].user_id == $page.props.auth.user.id || $page.props.auth.user.is_admin">
                                    <button class="opcoes" :onclick="() => update = true">Opções</button>
                                    <div v-if="boo">

                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <p class="mr-5"> Publicado em: {{ books[0].year }} </p>
                                <p> Escritor: {{ books[0].writter }} </p>
                            </div>
                            <div v-for="user in userBook" v-bind:key="user.id">
                                <p v-if="user.id == books[0].user_id" class="mt-2 mb-3">
                                    Proprietário: {{ user.name }}
                                </p>
                            </div>
                            <div v-for="category in categories" v-bind:key="category.id">
                                <h3 v-if="category.id == books[0].category_id" class="mt2 mb-3">Categoria: {{
                                    category.name }}</h3>
                            </div>
                            <div class="dealFav">
                                <div class="flex">Status:
                                    <div v-if="!(books[0].deal)">
                                        <CheckCircleIcon class="check"/>
                                    </div>
                                    <div class="ml-2" v-else>
                                        <!-- Indisponivel -->
                                        <XCircleIcon class="uncheck"/>
                                    </div>
                                </div>

                                <ButtonFav :bookId="books[0].id" />

                                <div v-if="!(a.books[0].user_id == $page.props.auth.user.id)">
                                    <button class="opcoes" :onclick="() => deal = true">Desejo</button>
                                </div>
                            </div>
                            <p class="mt-2 mb-3">Cometário do proprietário: {{ books[0].selfComment }} </p>
                            <p>Sinopse: "{{ books[0].synopsis }}"</p>
                        </div>

                    </div>
                </div>

                <div class="comment">
                    <div class="commentForm">
                        <div class="form">
                            <legend>Escreva um comentario</legend>
                            <form class="flex" name="commentForm" @submit.prevent="submit">
                                <textarea class="textarea" rows="4" cols="80" name="comments" id="comments"
                                    v-model="form.comments">
                                                        </textarea>
                                <PrimaryButton class="PrimaryButton">Send</PrimaryButton>
                            </form>
                        </div>
                    </div>

                    <div class="commentFlow">
                        <div class="comment2">
                            <div v-for=" comment in comments" v-bind:key="comment.id">
                                <div class="commentlist" v-if="comment.book_id == ab">
                                    <div v-for=" userB in userBook" v-bind:key="userB.id">
                                        <div v-if="comment.user_id == userB.id">
                                            <h1>{{ userB.name }}:</h1>
                                        </div>
                                    </div>
                                    <div class="option">
                                        <h1> {{ comment.comment }}</h1>
                                        <div
                                            v-if="a.books[0].user_id == $page.props.auth.user.id || $page.props.auth.user.is_admin">
                                            <!-- {{ comment.id }} -->
                                            <form @submit.prevent="commentDestroy(comment.id)">
                                                <button>Deletar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.blocao {
    padding-top: 0.75rem
        /* 12px */
    ;
    padding-bottom: 0.75rem
        /* 12px */
    ;
    display: flex;
    justify-content: center;
    border-radius: 6px;
}

.bloco {
    border-radius: 6px;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    width: 90%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.check {
    margin-left: 10px;
    color: rgb(10, 187, 10);
    background-color: white;
    border-radius: 50%;
    width: 30px;
    height: 30px;

}

.uncheck {
    margin-left: 10px;
    color: white;

    border-radius: 50%;
    width: 30px;
    height: 30px;

}

.titleBloco {
    width: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.opcoes {
    padding: 10px;
    border: 1px solid white;
    border-radius: 6px;
    margin-right: 5px;
}

.opcoes:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}

.bookView {
    display: flex;
    width: 95%;
    text-align: justify;
    background-color: #283446;
    box-shadow: 0px 5px 5px #131820;
    transition: 0.5s ease-in-out;
    border-radius: 6px;
    margin: 20px;
}

/* .bookView div {
    width: 100%;

} */

.test1 {
    width: 40%;
    display: flex;
    align-content: center;
    justify-content: center;
}

.test2 {
    width: 70%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.intraTest2 {
    width: 90%;
    height: 90%;
}

.dealFav {
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;

}

.test1 img {
    height: 500px;
    width: 320px;
    border: solid white;
    border-radius: 6px;
    box-shadow: 5px 5px 5px #131820;
}

.title {
    font-size: 36px;
    font-weight: bold;
    text-align: start;
    margin-bottom: 10px;
}


.comment {
    background-color: #283446;
    box-shadow: 0px 5px 5px #131820;
    transition: 0.5s ease-in-out;
    border-radius: 6px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.option {
    display: flex;
    justify-content: space-between;
    width: 100%;

}

.commentFlow {
    width: 70%;
}

.commentForm {
    display: flex;
    align-items: center;
    justify-content: center;
}

.form {
    width: 90%;
}

.commentlist {
    display: flex;
    margin: 15px;
    width: 100%;
    padding: 10px;
    box-shadow: 0px 5px 5px #131820;
    background-color: #1f2937;
}

.PrimaryButton {
    margin-left: 20px;
    height: 50px;
    border: 1px solid white;
    color: white;
}

.PrimaryButton:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}

.textarea {
    background-color: transparent;
    border: 2px solid white;
    border-radius: 6px;
    color: white;
    resize: none;
}</style>