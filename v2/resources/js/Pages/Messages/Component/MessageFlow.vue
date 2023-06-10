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
        <div v-for="message in Messages">
            {{ message }}
        </div>
    </div>

</template>

<style scoped>
    .messageFlow {
        border: 1px solid black;
    }

</style>