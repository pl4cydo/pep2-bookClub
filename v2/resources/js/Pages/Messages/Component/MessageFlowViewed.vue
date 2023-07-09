<script setup>
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';


const Messages = ref([]);
const users = ref([])

onMounted(async () => {
    try {
        const response = await axios.get('/message');
        Messages.value = response.data;

        const response2 = await axios.get(route('deal.users'))
        users.value = response2.data;
    } catch (error) {
        console.error(error);
    }
});

const form = useForm({})

const messageUpdate = (id) => {
    form.put(route('message.update', id)), {
        _method: 'PUT',
    }
    location.reload();
}


</script>

<template>
    <div class="messageFlow">
        <h1 class="ml-4">Mensages Vistas</h1>
        <div class="messages" v-for="message in Messages" v-bind:key="message.id">
            <div class="bloco" v-if="message.notification">
                <div class="infoMessage">
                    <div class="meuovao" v-for="user in users" v-bind:key="user.id">
                        <h1 class="meuovo" v-if="user.id == message.user_id">
                            User: {{ user.name }}
                        </h1>
                    </div>
                    <div>
                        <h1> e-mail: {{ message.email }}</h1>
                    </div>
                    <div>
                        <h1>Message:</h1>
                        <p>{{ message.textMessage }}</p>
                    </div>
                    <form name="messageUpdate2" @submit.prevent="messageUpdate(message.id)">
                        <button class="button">Marcar como NÃO Visto</button>
                    </form>
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
    width: 95%;
}

.messages {
    height: auto;
    width: 100%;
    display: flex;
    justify-content: center;
}

.bloco {
    border-radius: 6px;
    width: 90%;
    display: flex;
    justify-content: space-between;
    box-shadow: 5px 5px 5px #131820;
    background-color: #242f3f;
}

.messages div {
    margin: 15px;
    margin-bottom: none;
}

.imageMessage img {
    width: 150px;
    height: auto;
    border: 1px solid white;
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