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
        <h1>Message Flow!</h1>
        <div class="messages" v-for="message in Messages">
            <div class="infoMessage">
                <h1> User: </h1>
                <h1> e-mail: {{ message.email }}</h1>
                <h1> Visto: {{ message.notification == true }}</h1>
                <div>
                    <h1>Message:</h1>
                    <p>{{ message.textMessage }}</p>
                </div>
            </div>
            <div class="imageMessage">
                <img :src="'/storage/images/' + message.imageMessage" alt="Message Image">
            </div>
            <!-- {{ message }} -->
        </div>
    </div>
</template>

<style scoped>
.messageFlow {
    border: 1px solid black;
}

.messages {
    height: auto;
    border: 1px solid black;
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
}
</style>