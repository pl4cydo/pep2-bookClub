<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Comment from '../../Comment/Comment.vue'


defineProps({
    id: Number,
    books: Array
})

const form = useForm({
    comments: '',
    book_id: ''
});

const submit = () => {
    form.post(route('comments.store'))
    form.comments = ''
}

</script>

<template >
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <h1>{{ id }}</h1> -->
                    <div v-for="book in books" :key="book.id" class="book">
                        <div v-if="book.id == id" class="bookArea">

                            <div class="bookView">
                                <div class="imgBloc">
                                    <h1 class="title">{{ book.title }}</h1>
                                    <img :src="'/storage/images/' + book.image" alt="Book Image">
                                </div>
                                <div class="infBloc">
                                    <p>{{ book.synopsis }}</p>
                                    <p>Deal: {{ book.deal == 0 ? false : true }}</p>
                                </div>
                            </div>

                            <div class="comment">
                                
                                <div class="commentFlow">
                                    <div class="commentForm">
                                        <form name="commentForm" @submit.prevent="submit">
                                            <legend>Escreva um comentario</legend>
                                            <textarea rows="4" cols="80" name="comments" id="comments" v-model="form.comments"></textarea>
                                            <input type="text" name="book_id" id="book_id" v-model="form.book_id" >
                                            <button>Send</button>
                                        </form>
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

<style>
    .bookArea {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: auto;
    }
    
    .bookView {
        display: flex;
        width: 100%;
        height: auto;
    }

    .bookView div {
        width: 50%;
        
    }

    .imgBloc {
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .imgBloc img {
        height: 500px;
        width: 320px;
    }

    .infBloc {
        border: 1px solid black;
    }

    .comment {
        border: 1px solid black;
    }
</style>