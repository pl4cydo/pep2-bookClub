<script setup>
import { Link, useForm, usePage } from "@inertiajs/vue3";
import axios from "axios";
import { onMounted, ref } from "vue";
import { LinkIcon } from '@heroicons/vue/24/solid'

const wishs = ref([]);
const user = usePage().props.auth.user;
const books = ref([]);
const filteredBooks = ref([]);
const bookOwners = ref([]);
const filterOwners = ref([]);

// const testDeals = ref([]);

const deals = ref([]);
const filterMyBook = ref([]);

const listWish = async () => {
    try {
        const response = await axios.get(route('deal.create'));
        wishs.value = response.data;
        wishs.value = wishs.value.filter(wish => wish.user_id == user.id);
        deals.value = response.data;

    } catch (error) {
        console.error(error);
    }
}

const listBooks = async () => {
    try {
        const responseBook = await axios.get(route('book.listBooks'));
        books.value = responseBook.data;

        filteredBooks.value = books.value.filter(book => {
            return wishs.value.some(wish => wish.book_id === book.id);
        });

        filterMyBook.value = books.value.filter(book => book.user_id == user.id);

        deals.value = deals.value.filter(deal => {
            return filterMyBook.value.some(book => book.id == deal.book_id && book.user_id == user.id);
        })
        console.log(deals.value)
        // console.log(filteredBooks)
    } catch (error) {
        console.error(error);
    }
}

const listUser = async () => {
    try {
        const response3 = await axios.get(route('deal.users'));
        bookOwners.value = response3.data;
        // console.log(bookOwners.value)


        // filterOwners.value = bookOwners.value.filter(owner => {
        //     return wishs.value.some(wish => wish.user_id === owner.id);
        // })

    } catch (error) {
        console.error(error)
    }
}

onMounted(() => {
    listWish()
    listBooks()
    listUser()
})

const destroy = (id) => {
    useForm({}).delete(route('deal.destroy', id));
    location.reload();
};

const finshDeal = (id) => {
    useForm({}).put(route('deal.update', id))
}



</script>

<template>
    <div class="bookshelf">

        <div class="bloco">
            <h1>Livros em Transações</h1>

            <div class="blocodobloco opa" v-for="wish in deals.slice().reverse()" :key="wish.id">
                <!-- {{ wish }} -->
                <div class="info1">
                    <h1 class="flex">Livro:
                        <div class="absolute ml-12" v-for="fil2 in filterMyBook" v-bind:key="fil2.id">
                            <div v-if="fil2.id == wish.book_id">{{ fil2.title }}</div>
                        </div>
                    </h1>
                    
                    <div v-for="owner in bookOwners" v-bind:key="owner.id">
                        <div v-if="owner.id === wish.user_id">
                            <h1>Usuário Interessado: {{ owner.name }} </h1>
                            <h1>Contato do Interessado: {{ owner.phoneNumber }} </h1>
                            <h1>Instagram: @{{ owner.instagram }}</h1>
                        </div>
                    </div>

                    <h1 class="flex">Livro para troca:
                        <div class="absolute ml-32" v-for="fil2 in books" v-bind:key="fil2.id">
                            <div v-if="fil2.id == wish.deal_book_id">
                                <Link class="flex" :href="route('book.bookView', { id: fil2.id })">
                                    {{ fil2.title }}
                                    <LinkIcon class="icon"/>
                                </Link>
                            </div>
                        </div>
 
                    </h1>
                </div>
                <div class="info2">
                    <h1 class="flex">Estado: <div class="ml-2" v-if="wish.finish == true" > Finalizado </div> <div class="ml-2" v-else> Em aberto</div></h1>
                    <h1>Text: {{ wish.text }}</h1>
                </div>
                <div class="jorge" v-if="!wish.finish" >
                    <button class="button" @click="finshDeal(wish.id)">Confirmar</button>
                    <button class="button" @click="destroy(wish.id)" > Negar</button>
                </div>
            </div>
        </div>

        <div class="bloco">
            <h1>Meus Desejos</h1>
            <!-- {{ wishs }} -->
            <div class="blocodobloco " v-for="wish in wishs" :key="wish.id">
                <div class="blocoDeal">
                    <div v-for="filter in filteredBooks" v-bind:key="filter.id">
                        <!-- {{ filter }} -->
                        <h1 v-if="filter.id == wish.book_id">Livro: {{ filter.title }}</h1>
                        <h1 v-if="filter.id == wish.book_id">
                            <div v-for="filt in bookOwners" v-bind:key="filt.id">
                                <div v-if="filter.user_id == filt.id">
                                    Dono do Livro: {{ filt.name }}
                                </div>
                            </div>
                        </h1>
                    </div>
                    <h1>Texto enviado: {{ wish.text }}</h1>
                </div>
                <div class="blocoDeal">
                    <div v-for="fil in books" v-bind:key="fil.id">
                        <h1 v-if="wish.deal_book_id == fil.id">Livro para troca: {{ fil.title }}
                            
                        </h1>
                    </div>
                    <form class="formButton" @submit.prevent="destroy(wish.id)">
                        <button class="button button2" type="submit">Cancelar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>
::-webkit-scrollbar {
    width: 0.5em;
}

::-webkit-scrollbar-track {
    background: transparent;
}

::-webkit-scrollbar-thumb {
    background: transparent;
}



.bookshelf {
    width: 100%;
    height: auto;
    overflow-y: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.bloco {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    text-align: left;
    justify-content: center;
    color: white;
    padding: 20px;
}


.blocodobloco {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    background-color: #283446;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 6px;
    margin: 5px;
}

.opa {
    padding: 15px;
    justify-content: left;
}

.icon {
    width: 15px;
    color: white;

}

.blocoDeal {

    height: 100%;
    width: 50%;
    padding: 10px;
}

.formButton {

    display: flex;
    justify-content: right;
}

.button {
    margin-left: 20px;
    padding: 5px;
    border-radius: 6px;
    height: 50px;
    border: 1px solid white;
    color: white;
}

.button2 {margin: 20px}

.button:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}

.jorge {
    display: flex;
    flex-direction: column;
    
}

.jorge * {
    margin-bottom: 10px;
}

.info1 {
    overflow: hidden;
    width: 60%;
}

.info2 {

    width: 40%;
}
</style>