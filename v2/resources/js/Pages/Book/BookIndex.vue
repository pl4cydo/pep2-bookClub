<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage} from '@inertiajs/vue3';
import ListBooks from './Components/ListBooks.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
// import Createbook from './Create/Index.vue'
import { ref } from 'vue';
import Createbook from './Components/Create.vue'
import Search from './Components/Search.vue';
import MessageCreate from '../Messages/Component/MessageCreate.vue';

defineProps({
    categories: Array,
    books: Array
});



</script>

<template>
    <Head title="Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->
                    <div class="bloco">

                      <div class="bloco2">
                        <!-- <PrimaryButton :onclick="changeBoo" >Novo Livro</PrimaryButton> -->
                        <!-- <Createbook /> -->
                        <Search />
                      </div>

                        <div class="bloco2" >
                            <h1>Adicionar livros</h1>
                            <!-- <Link :href="route('book.create')">Link</Link> -->
                            <div>
                                <!-- <form name="bookForm" @submit.prevent="submit">
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
                                          <label for="image">Image</label>
                                          <input id="image" type="file" class="input" @change="handleImageChange" />
                                      </div>

                                      <div>
                                          <label for="synopsis">Sinopse</label>
                                          <textarea name="synopsis" id="synopsis" cols="30" rows="10" v-model="form.synopsis"></textarea>

                                      </div>
                                                                            
                                      <div>
                                        <select name="category_id" id="category_id" class="input" v-model="form.category_id">
                                            <option value="">Select a category</option>
                                            <option v-for="category in categories" :value="category.id" :key="category.id">
                                              {{ category.name }}
                                            </option>
                                        </select>
                                          
                                      </div>
                                      
                                    <button type="submit" class="button" > Send </button>
                                </form> -->

                                <div v-for="category in categories" v-bind:key="category.id">
                                    {{ category.value  }}
                                </div>
                            </div>
                        </div>

                        <!-- <div class="bloco2" >
                          <div v-for="book in books" :key="book.id" >
                            <div class="boom">
                              {{ book }}
                              <Link class="link" :href="route('book.bookView', { id:book.id })">Link</Link>
                            </div>
                          </div>
                        </div> -->

                          <!-- <Createbook :categories="categories" v-if="boo"/> -->

                        <div class="bloco2" >
                          <ListBooks :books="books"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <MessageCreate />
              </div>
          </div>
        </div>      


    </AuthenticatedLayout>
</template>

<style scoped>
    .boom {
      border: 1px solid black;
    }

    

    .bloco {
        border: 1px solid black;
        width: auto;
        height: auto;
        display: flex;
        flex-direction: column;
        /*justify-content: center; */
        align-items: center;
    }
    .bloco2 {
        margin-top: 5%;
        border: 1px solid black;
        width: 90%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }
    .bloco2 form {
        width: 90%;
        height: 60%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }
    .input {
        background-color: white;
        color: black;
        padding: 5px;
        width: 200px;
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
        background-color: blue;
        color: aliceblue;
      }

      
      
</style>