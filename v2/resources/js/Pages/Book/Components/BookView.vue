<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Comment from '../../Comment/Comment.vue';
import { onMounted, ref } from 'vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import ButtonFav from '../../Favorite/Component/ButtonFav.vue';

let a = defineProps({
    books: Array,
    comments: Array,
    userBook: Array
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
                            <div class="dealFav">
                                <p>Status: {{ books[0].deal == 0 ? false : true }}</p>
                                <!-- <img src="../img/green-round-check-tick-mark-icon-free-png-11641123862pususkwq73.png" alt=""> -->
                                <ButtonFav :bookId="books[0].id" />
                            </div>
                            <p>{{ books[0].synopsis }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="comment">
                            <div class="commentForm">

                                <form name="commentForm" @submit.prevent="submit">
                                    <legend>Escreva um comentario</legend>
                                    <textarea rows="4" cols="80" name="comments" id="comments" v-model="form.comments">
                                        </textarea>
                                    <input type="text" name="books_id" id="books_id" v-model="form.book_id" >
                                    <PrimaryButton class="PrimaryButton">Send</PrimaryButton>
                                </form>

                            </div>

                            <div class="commentFlow">
                                <div v-for=" comment in comments">
                                    <div class="commentlist" v-if="comment.book_id == ab">
                                        <div v-for=" userB in userBook">
                                            <div v-if="comment.user_id == userB.id">
                                                <h1>{{ userB.name }}:</h1>
                                            </div>
                                        </div>
                                        <div>
                                            <h1> {{ comment.comment }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
.bookView {
    display: flex;
    width: 100%;
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
}

.commentFlow {
    border: 1px solid white;
}

.commentlist {
    display: flex;
    margin: 15px;
}

.PrimaryButton {
    height: 50px;
    color: black;
}
</style>