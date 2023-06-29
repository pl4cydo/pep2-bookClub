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
        <div class="py-2">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="messageBloco">
                    <div class="navBloco">
                        <button class="button" @click="change = false">Caixa de Mensagens</button>
                        <button class="button" @click="change = true">Mensagens Vistas</button>
                    </div>

                    <div class="area" v-if="!change">
                        <!-- <MessageCreate /> -->
                        <MessageFlowUnviewed />
                    </div>

                    <div class="area" v-if="change">
                        <MessageFlowViewed />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.messageBloco {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-shadow: 5px 5px 5px black;
}

.navBloco {
    background-color: #1f2937;
    box-shadow: 5px 5px 5px #131820;
    padding: 25px;
    width: 100%;
    height: 68px;
} 

.area {
    margin: 10px;
    width: 95%;
    border-radius: 6px;
    background-color: #1f2937;
    box-shadow: 5px 5px 5px #131820;
    padding: 25px;
    display: flex;
    justify-content: center;
}

.button {
    margin-right: 10px;
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