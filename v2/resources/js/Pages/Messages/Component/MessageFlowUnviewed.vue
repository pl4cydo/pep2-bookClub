<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';


const Messages = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/message');
        Messages.value = response.data;
    } catch (error) {
        console.error(error);
    }
});


</script>

<template>
    <div class="messageFlow">
        <h1 class="ml-4">Caixa de Mensagens</h1>
        <div class="messages" v-for="message in Messages">
            <div class="bloco" v-if="!(message.notification)">
                <div class="infoMessage">
                    <h1> User: {{ message.user_id }} </h1>
                    <h1> e-mail: {{ message.email }}</h1>
                    <div>
                        <h1>Message:</h1>
                        <p>{{ message.textMessage }}</p>
                    </div>
                    <button class="button">Marcar como Visto</button>
                </div>
                <div class="imageMessage">
                    <img :src="'/storage/images/' + message.imageMessage" alt="Message Image">
                </div>
            </div>
            <!-- {{ message }} -->
        </div>
    </div>
</template>

<style scoped>
.messageFlow {
    border: 1px solid white;
}

.messages {
    height: auto;
    border: 1px solid white;
    display: flex;
}

.bloco {
    width: 90%;
    display: flex;
    justify-content: space-between;
}

.messages div {
    margin: 30px;
    margin-bottom: none;
}

.imageMessage img {
    width: 150px;
    height: auto;
    border: solid white;
    border-radius: 6px;
}

.button {
    border: 1px solid white;
    padding: 8px;
}

.button:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}
</style>