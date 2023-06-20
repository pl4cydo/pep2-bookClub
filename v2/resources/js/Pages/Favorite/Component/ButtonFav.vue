<script setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { HeartIcon } from '@heroicons/vue/24/solid'
import axios from 'axios';

const fav = ref([])

let a = defineProps({
    bookId: Number,
})

const form = useForm({
    book_id: '',
})

onMounted(() => {
    favs()
    form.book_id = a.bookId
    console.log(form.book_id)
})

const submit = () => {
    form.post(route('favorite.store'))
    alert("Favoritado")
}

const favs = async () => {
    try {
        const response = await axios.get('/listFav');
        fav.value = response.data;
        fav.value = fav.value.filter(fav => fav.book_id === a.bookId);
    } catch (error) {
        console.error(error)
    }
}


</script>

<template>
    <!-- {{ fav.value }} -->
    <!-- {{$page.props.auth.user.id}}
    {{ a.bookId }} -->

    <!-- {{ a }} -->
    <form name="favForm" @submit.prevent="submit">
        <button id="favButton">
            <HeartIcon class="heart" />
        </button>
    </form>

    <!-- <form name="unfavForm">
        <button>
            <HeartIcon class="heart2"/>
        </button>
    </form> -->
</template>

<style scoped>
#favButton {
    height: 40px;
    width: 40px;
    cursor: pointer;
}

.heart {
    color: red;
    width: 40px;
}

#heart:hover {
    color: white;
}

.heart2 {
    color: white;
    width: 40px;
}
</style>