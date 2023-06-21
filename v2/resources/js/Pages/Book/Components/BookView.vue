<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Comment from '../../Comment/Comment.vue';
import { onMounted, ref } from 'vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import ButtonFav from '../../Favorite/Component/ButtonFav.vue';
import { CheckCircleIcon, XCircleIcon } from '@heroicons/vue/24/solid'


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
    if(confirm("Como que é, amigo?")) {
        form.delete(route('comments.destroy', a))
    }
    location.reload();
}

</script>

<template >
    <AuthenticatedLayout>
        <div class="py-12 text-white">
            <div class="">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <h1>{{ id }}</h1> -->
                    <div class="bookView">

                        <div class="test1">
                            <img class="m-5" :src="'/storage/images/' + books[0].image" alt="Books Image">
                        </div>
                        <div class="test2">
                            <div class="intraTest2">
                                <h1 class="title">{{ books[0].title }}</h1>
                                <p> Publicado em: {{ books[0].year }} </p>
                                <div v-for="user in userBook" >
                                    <p v-if="user.id == books[0].user_id " class="mt-2 mb-3">
                                        Proprietário: {{ user.name }}
                                    </p>
                                </div>
                                <div v-for="category in categories">
                                    <h3 v-if="category.id == books[0].category_id" class="mt2 mb-3">Categoria: {{ category.name }}</h3>
                                </div>
                                <div class="dealFav">
                                    <p class="flex">Status:
                                        <CheckCircleIcon v-if="!(books[0].deal)" class="check" />
                                    </p>

                                    <ButtonFav :bookId="books[0].id" />
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
                                <div v-for=" comment in comments">
                                    <div class="commentlist" v-if="comment.book_id == ab">
                                        <div v-for=" userB in userBook">
                                            <div v-if="comment.user_id == userB.id">
                                                <h1>{{ userB.name }}:</h1>
                                            </div>
                                        </div>
                                        <div class="option">
                                            <h1> {{ comment.comment }}</h1>
                                            <div v-if="a.books[0].user_id == $page.props.auth.user.id || $page.props.auth.user.is_admin">   
                                                <!-- {{ comment.id }} -->
                                                <form @submit.prevent="commentDestroy(comment.id)">
                                                    <button >Deletar</button>
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
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.check {
    margin-left: 10px;
    color: rgb(10, 187, 10);
    background-color: white;
    border-radius: 50%;
    width: 30px;
    height: 30px;

}

.bookView {
    display: flex;
    width: 100%;
    text-align: justify;
}

/* .bookView div {
    width: 100%;

} */

.test1 {
    border: 1px solid white;
    width: 30%;
}

.test2 {
    border: 1px solid white;
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
    width: 60%;
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
}

.title {
    font-size: 36px;
    font-weight: bold;
    text-align: start;
    margin-bottom: 10px;
}


.comment {
    border: 1px solid white;
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
    color: white;
    resize: none;
}
</style>