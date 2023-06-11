<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MessageCreate from './Component/MessageCreate.vue'
import MessageFlow from './Component/MessageFlow.vue'


</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="messageBloco">
                        <div>
                            <h1>Messages!</h1>
                            <!-- <MessageCreate /> -->
                            <MessageFlow />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>


.formMessage {
    display: flex;
    flex-direction: column;
    border: 1px solid black;
}

.formMessage div {
    margin: 10px;
}

.messageBloco{
    display: flex;
    justify-content: center;
}
</style>