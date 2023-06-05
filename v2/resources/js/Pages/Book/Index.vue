<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage} from '@inertiajs/vue3';

defineProps({
    categories: Array,
    books: Array
});

const form = useForm({
    title: '',
    year: '',
    writter: '',
    image: null,
    category_id: ''
});

const submit = () => {
    form.post(route('book.store'))
    form.title = ''
    form.year = ''
    form.writter = ''
    form.image = null
    form.category_id = ''
}

const handleImageChange = (event) => {
    form.image = event.target.files[0]
}

function getImageUrl(image) {
    return image ? asset('storage/images/' + image) : '';
}

</script>

<template>
    <Head title="Book" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->
                    <div class="bloco">
                        <div class="bloco2" >
                            <h1>Adicionar livros</h1>
                            <Link :href="route('book.create')">Link</Link>
                            <div>
                                <form name="bookForm" @submit.prevent="submit">
                                    <div>
                                        <label for="title">Title</label>
                                        <input id="title" class="input" v-model="form.title" />
                                      </div>
                                      
                                      <div>
                                        <label for="year">Year</label>
                                        <input id="year" class="input" v-model="form.year" />
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
                                        <label for="category_id">Categoria</label>
                                        <input id="category_id" class="input" v-model="form.category_id" />

                                        <select name="category_id" id="category_id" class="input" v-model="form.category_id">
                                            <option value="">Select a category</option>
                                            <option v-for="category in categories" :value="category.id" :key="category.id">
                                              {{ category.name }}
                                            </option>
                                        </select>
                                          
                                      </div>
                                      
                                    <button type="submit" class="button" > Send </button>
                                </form>

                                <div v-for="category in categories">
                                    {{ category.value  }}
                                </div>
                            </div>
                        </div>
                        <div class="bloco2" >
                            <div class="bookshelf">
                                <div v-for="(book, index) in books" :key="book.id" class="book">
                                  <img :src="'/storage/images/' + book.image" alt="Book Image">
                                  <p class="title">{{ book.title }}</p>
                                </div>
                              </div>
                        </div>
                        <div class="bloco2" >
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
    .bloco {
        border: 1px solid black;
        width: auto;
        height: 2000px;
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

      .bookshelf {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }
      
      .book {
        width: 150px;
        margin: 10px;
        text-align: center;
      }
      
      .book img {
        width: 100%;
        height: auto;
      }
      
      .title {
        margin-top: 5px;
      }
      
</style>