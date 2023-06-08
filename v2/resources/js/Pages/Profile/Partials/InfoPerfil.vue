<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;


</script>

<template>

    <h1>Opa</h1>
    {{ user.name }} 
    {{ user.phoneNumber }}
    <h1>
        @{{ user.instagram }}
    </h1>

</template>