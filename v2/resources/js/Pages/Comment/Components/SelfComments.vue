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

<template>
    <!-- <h1>Self Comments</h1> -->
    <div class="bloco">
        <table>
          <thead>
            <tr>
              <th>Comment</th>
              <th>Book</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="comment in comments" :key="comment.id" >
                <td v-if="$page.props.auth.user.id == comment.user_id">
                    <h1>Message:</h1>
                    {{ comment.comment }}
                </td>
                <!-- <td v-if="$page.props.auth.user.id == comment.user_id">{{ comment.user_id }}</td> -->
                <td v-if="$page.props.auth.user.id == comment.user_id">
                    <div v-for="book in books" v-bind:key="book.id">
                        <div v-if="comment.book_id == book.id">
                            <!-- {{ comment.book_id }} -->
                            <div class="blocImg">
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
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    table, tbody {
        width: 100%;
        border-radius: 6px;
    }
    
    tr {
        width: 100%;
        border: 1px solid gray;
        display: flex;
        justify-content: space-between;
    }

    td, th {
        margin: 20px;
    }

    .link img {
        height: 90px;
        width: 70px;
    }

    .blocImg {

        overflow: hidden;
        max-width: 70px;
        max-height: 120px;
    }
</style>