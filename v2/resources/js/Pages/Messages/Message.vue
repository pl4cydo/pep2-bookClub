<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MessageCreate from './Component/MessageCreate.vue'
import MessageFlowUnviewed from './Component/MessageFlowUnviewed.vue'
import MessageFlowViewed from './Component/MessageFlowViewed.vue';
import { ref } from 'vue';

const change = ref(false)

</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="messageBloco">
                        <div>
                            <button class="button" @click="change = false">Caixa de Mensagens</button>
                            <button class="button" @click="change = true">Mensagens Vistas</button>
                        </div>

                        <div v-if="!change">
                            <!-- <MessageCreate /> -->
                            <MessageFlowUnviewed />
                        </div>

                        <div v-if="change">
                            <MessageFlowViewed />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

.messageBloco {
    display: flex;
    flex-direction: column;
}

.button {
    margin-right: 10px;
    margin-bottom: 10px;
}

.button:hover {
    border-bottom: 1px solid white;
    transition: 0.8s ease;
}

.messageBloco {
    display: flex;
    justify-content: center;
}
</style>