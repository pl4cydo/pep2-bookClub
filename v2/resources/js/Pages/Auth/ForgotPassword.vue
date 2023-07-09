<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};

</script>

<template>
    <GuestLayout>
        <div class="blocao">

            <Head title="Forgot Password" />
    
            <div class="mb-4 text-sm text-white-600">
                Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço de e-mail e enviaremos um link de redefinição de senha que permitirá que você escolha uma nova senha.
            </div>
    
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
    
            <form class="form" @submit.prevent="submit">
                <div class="bloco">
                    <label for="email" >Email</label>
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
    
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Email Password Reset Link
                    </PrimaryButton>
                </div>
            </form>
            <div>
                <Link :href="'/'">Back</Link>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>

.blocao {
    margin-top: 100px;
    border-radius: 6px;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    width: 50%;
    padding: 15px;
}

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.bloco {
    width: 50%;
    display: flex;
    align-items: center;
}

.bloco label {
    margin-right: 10px;
}

.input {
    width: 80%;
}
</style>
