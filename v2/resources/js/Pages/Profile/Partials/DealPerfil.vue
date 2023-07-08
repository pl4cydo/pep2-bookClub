<script setup>
import { usePage } from "@inertiajs/vue3";
import axios from "axios";
import { onMounted, ref } from "vue";

const wishs = ref([]);
const user = usePage().props.auth.user;

const listWish = async () => {
    try {
        const response = await axios.get(route('deal.create'));
        wishs.value = response.data;
        wishs.value = wishs.value.filter(wish => wish.user_id == user.id);
        console.log(wishs.value)
    } catch (error) {
        console.error(error)
    }
}

onMounted(() => {
    listWish()
})


</script>

<template>
    <div class="bookshelf">
        <div class="bloco">
            <h1>Livros em Transações</h1>


        </div>

        <div class="bloco">
            <h1>Meus Desejos</h1>
            <!-- {{ wishs }} -->
            <div class="blocodobloco" v-for="(wish, index) in wishs" :key="wish.id">
                <div class="blocoDeal">
                    <!-- Conteúdo do bloco de desejo -->
                </div>

                <!-- Quebra de linha a cada três blocos -->
                <div v-if="(index + 1) % 3 === 0">
                    <br>
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

.button {
    color: white;
    padding: 10px;
    border-radius: 6px;
}

.bookshelf {
    width: 100%;
    height: 320px;
    overflow-y: scroll;
    margin: 0;
}

.bloco {
    display: flex;
    flex-direction: column;
    text-align: left;
    justify-content: center;
    color: white;
    padding: 20px;
    border: 1px solid white;
    width: 100%;
    height: auto;
}

.bookshelf div {
    width: 98%;
}

.blocodobloco {
    width: 30%;
    height: auto;
    border: 1px solid blue;
    display: flex;

}

.blocoDeal {
    border: 1px solid white;
    width: 20px;
    height: 200px;
}
</style>