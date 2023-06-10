<script setup>
import MessageCreate from './Component/MessageCreate.vue'
import MessageFlow from './Component/MessageFlow.vue'


</script>

<template>
    <div class="messageBloco">
        <h1>Messages!</h1>
        
        <MessageCreate />

        <MessageFlow />

    </div>
    
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