<script setup>
import { ref } from 'vue';

let num = ref(0);
</script>

<template>
    <div class="blocoMsg">
        <div v-if="num > 0" class="notfic">
            <p>{{ num }}</p>
        </div>
        <div class="msg"></div>
        <button :onclick="() => num++">D</button>
    </div>
</template>

<style scoped>
    .blocoMsg {
        width: 100px;
        padding: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        display: flex;
    }
    
    .msg {
        height: 50px;
        width: 50px;
        border: 1px solid blue;
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
    }

    button {
        margin-left: 3px;
    }
</style>