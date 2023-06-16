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
        <div class="bloco">
            <div>
                <h1>Mensagem para os administradores</h1>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" class="input" v-model="form.email" />
            </div>
    
            <div class="divBloco">
                <label for="textMessage">Message</label>
                <textarea class="textarea" name="textMessage" id="textMessage" cols="10" rows="5" v-model="form.textMessage"></textarea>
            </div>
    
            <div>
                <label for="imageMessage">Image</label>
                <input id="imageMessage" type="file" class="input" @change="handleImageChange" />
            </div>      
    
            <div>
                <button type="submit" class="button"> Send </button>
            </div>
        </div>
    </form>

</template>

<style scoped>


.formMessage div {
    margin: 10px;
}

.bloco {
    padding: 15px;
}

.textarea {
    background-color: transparent;
}

.button {
    border: 1px solid white;
    padding: 15px;
    padding-left: 20px;
    padding-right: 20px;
}

.button:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}

.input {
    color: white;
    position: relative;
    border: 0;
    border-bottom: 1px solid white;
    background: transparent;
    width: 70%;
    padding: 8px 0 5px 0;
    font-size: 16px;
}

.input:focus {
    border: none;
    outline: none;
    border-bottom: 1px solid #3e3ec5;
}

.input:hover {
    border-bottom: 1px solid #3e3ec5;
    transition: 0.5s;
}

.divBloco {
    display: flex;
    flex-direction: column;
}


</style>