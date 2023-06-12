<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    phoneNumber: '',
    instagram: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="bloco">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" />
    
                    <TextInput
                        id="name"
                        type="text"
                        class="input"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
    
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
    
                <div class="mt-4">
                    <InputLabel for="email" value="Email" />
    
                    <TextInput
                        id="email"
                        type="email"
                        class="input"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />
    
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
    
                <div class="mt-4">
                    <InputLabel for="phoneNumber" value="Phone Number" />
    
                    <TextInput
                        id="phoneNumber"
                        type="text"
                        class="input"
                        v-model="form.phoneNumber"
                        required
                        autocomplete="username"
                    />
    
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                
                <div class="mt-4">
                    <InputLabel for="instagram" value="Instagram" />
    
                    <TextInput
                        id="instagram"
                        type="text"
                        class="input"
                        v-model="form.instagram"
                        required
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
                        autocomplete="new-password"
                    />
    
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
    
                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
    
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="input"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />
    
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 m-4"
                    >
                        Already registered?
                    </Link>
    
                    <PrimaryButton class="input-btn" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
        
    </GuestLayout>
</template>

<style scoped>

.bloco {
    width: 400px;
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
