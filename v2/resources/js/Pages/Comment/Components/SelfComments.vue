<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';


const comments = ref([]);
const books = ref([])

onMounted(async () => {
    try {

        const response2 = await axios.get('listBooks')
        books.value = response2.data;

        const response = await axios.get('/comments');
        comments.value = response.data;
    } catch (error) {
        console.error(error);
    }

});


</script>

<!-- <template>
    <h1>Self Comments</h1>
    <div v-for="comment in comments" >
        <div v-if="$page.props.auth.user.id == comment.user_id">
            <div class="flex">
                <h1>Comment:</h1>
                <p> {{ comment.comment }} </p>
            </div>
            <div class="flex">
                <h1>Nome:</h1>
                <p> {{ comment.user_id }} </p>
            </div>
            <div class="flex">
                <h1>Book:</h1>
                <p> {{ comment.book_id }} </p>
            </div>
        </div>
    </div>
</template> -->

<template>
    <!-- <h1>Self Comments</h1> -->
    <div class="bloco">
        <table>
          <thead>
            <tr>
              <th>Comment</th>
              <th>Nome</th>
              <th>Book</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="comment in comments" :key="comment.id" >
                <td v-if="$page.props.auth.user.id == comment.user_id">{{ comment.comment }}</td>
                <!-- <td v-if="$page.props.auth.user.id == comment.user_id">{{ comment.user_id }}</td> -->
                <td v-if="$page.props.auth.user.id == comment.user_id">
                    <div v-for="book in books">
                        <div v-if="comment.book_id == book.id">
                            <!-- {{ comment.book_id }} -->
                            <div>
                                <Link class="link" :href="route('book.bookView', { id:book.id })"><img :src="'/storage/images/' + book.image" alt="Book Image"></Link>
                                {{ book.title }}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
          </tbody>
        </table>
    </div>

  </template>


<style scoped>
    .bloco {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    tr {
        border: 1px solid black;
        display: flex;
        justify-content: space-between;
    }

    td {
        margin: 20px;
    }

    table {
        width: 60%;
    }

    .link img {
        height: 230px;
        width: 150px;
    }
</style>