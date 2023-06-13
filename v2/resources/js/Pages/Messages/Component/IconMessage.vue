<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const Messages = ref([]);
let num = ref(0);

onMounted(async () => {
  try {
    const response = await axios.get('/message');
    Messages.value = response.data;
} catch (error) {
    console.error(error);
}   
    // console.log(Messages.value[0])
    notificationChange(Messages.value)
    // console.log(Messages.value[0].notification)
});

const notificationChange = (a) => {
    for(let i = 0; i < a.length; i++) {
        if(!(a[i].notification)){
            num.value++
        }
        // console.log(a[i].notification)
    }
    console.log(num.value)
}


</script>

<template>

    <div class="blocoMsg">
        <div v-if="num > 0" class="notfic">
            <p>{{ num }}</p>
        </div>
        <Link :href="route('message.create')">
            <div class="msg"></div>
        </Link>
        <!-- <button :onclick="() => num++">D</button> -->
        <!-- {{ Messages }} -->
    </div>
</template>

<style scoped>
    .blocoMsg {
        width: 100px;
        padding: 1rem;
      /*  background-color: #fff;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        display: flex;
     */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .msg {
        height: 45px;
        width: 45px;
        border: 1px solid white;
        border-radius: 50%;
        margin-left: 5px;
    }

    .msg:hover {
        background-color: blue;
        transition: 0.8s ease;
    }

    .notfic {
        background-color: red;
        height: 25px;
        min-width: 25px;
        width: auto;
        border: 3px solid red;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: absolute;
        margin-top: -30px;
        margin-left: -30px;
    }

    button {
        margin-left: 3px;
    }
</style>