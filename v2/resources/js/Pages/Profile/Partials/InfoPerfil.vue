<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;


</script>

<template>
    <div class="bloco2">
        <!-- <h1>Opa</h1>
        
            <h1>
                
            </h1> -->
        <div class="info">
            <h1>User: {{ user.name }} </h1>
        </div>
        <div class="contact">
            <h1>
                Contato: {{ user.phoneNumber }}
            </h1>
            <h1>
                instagram: @{{ user.instagram }}
            </h1>
        </div>
    </div>
</template>

<style scoped>
.bloco2 {
    color: white;
    display: flex;
    flex-direction: column;
    width: 90%;
    height: 90%;
}

.info {

    width: 100%;
    height: 40%;
    display: flex;
    align-items: center;

}

.contact {
    width: 100%;
    height: 60%;
    display: flex;
    justify-content: center;
    flex-direction: column;
}
</style>