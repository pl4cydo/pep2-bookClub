<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout >
        <Head title="Log in" />



        <div class="bloco">
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
    
            <!-- <div class="logoLogin">
                <h1>Login</h1>
            </div> -->
    
            <form class="form" @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />
    
                    <input
                        id="email"
                        type="email"
                        class="input"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
    
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
    
                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
    
                    <TextInput
                        id="password"
                        type="password"
                        class="input"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
    
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
    
                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ml-2 text-sm ">Remember me</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <Link  :href="route('register')" class="underline text-sm  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">Register</Link>
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2"
                    >
                        Forgot your password?
                    </Link>
    
                    <PrimaryButton class="input-btn" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                    
                </div>
            </form>
            
        </div>
    </GuestLayout>
</template>

<style scoped>

.bloco {
    display: flex;
    flex-direction: column;
    width: 400px;
    
}

.form {
    margin-top: 4em;
    padding: 45px;
    width: auto;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 6px;
}

.logoLogin h1 {
    margin-left: -5px;
    font-size: 2em;
    margin-bottom: 20px;
}

.color {
    color: #3e3ec5;
}

.input-btn {
    background-color: #3e3ec5;
}

.input-btn:hover {
    background-color: white;
    color: #3e3ec5;
    transition: 0.8s ease;
}
.input {
    border-radius: 0;
    position: relative;
    margin-bottom: 25px;
    border: 0;
    border-bottom: 1px solid white;
    background: transparent;
    width: 100%;
    padding: 8px 0 5px 0;
    font-size: 16px;
}

.input:focus {
    border: none;
    outline: none;
    border: 1px solid white;
    border-bottom: 1px solid white;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}

.input:hover {
    border-bottom: 1px solid white;
    transition: 0.5s;
}
</style>