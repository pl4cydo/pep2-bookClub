<script setup>
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    email: '',
    textMessage: '',
    imageMessage: null,
});

const submit = () => {
    form.post(route('message.store'))
    form.email = ''
    form.textMessage = ''
    form.imageMessage = null
}

const handleImageChange = (event) => {
    form.imageMessage = event.target.files[0]
}

</script>

<template>
    <form name="messageForm" class="formMessage" @submit.prevent="submit">
        <h1>Mensagem para o adms</h1>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" v-model="form.email" />
        </div>

        <div>
            <label for="textMessage">Message</label>
            <textarea name="textMessage" id="textMessage" cols="30" rows="10" v-model="form.textMessage"></textarea>
        </div>

        <div>
            <label for="imageMessage">Image</label>
            <input id="imageMessage" type="file" class="input" @change="handleImageChange" />
        </div>      

        <button type="submit" class="button"> Send </button>
    </form>

</template>

<style scoped>
.formMessage{
    display: flex;
    flex-direction: column;
    border: 1px solid black;
}

.formMessage div {
    margin: 10px;
}

</style>