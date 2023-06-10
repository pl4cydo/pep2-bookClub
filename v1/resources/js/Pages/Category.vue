<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import axios from 'axios';
// import route from 'vendor/tightenco/ziggy/src/js';
import { onMounted, reactive } from 'vue';


// defineProps({
//     categories: Array,
// });

const form = useForm({
    name: ''
});

const submit = () => {
    form.post(route('category.store'))
    form.name = ''
}



// const categories = reactive([]);

// onMounted(async () => {
//   try {
//     const response = await axios.get(route('category.index')); // Replace 'axios' with your preferred HTTP client
//     categories.value = response.data;
//   } catch (error) {
//     console.error(error);
//   }
// });


</script>

<template>
    <Head title="Category" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Category</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Add Category</div>
                    <div class="p-6">
                        <form name="createForm" @submit.prevent="submit">
                          <div class="flex">
                            <InputLabel for="name" value="Name" class="mr-5 text-xl " />
                            <TextInput id="name" v-model="form.name" class="border border-gray-300 rounded-md px-3 py-2" />
                            <PrimaryButton>Send</PrimaryButton>
                          </div>
                        </form>
                      </div>                 
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Categories:</div>
                    <div v-for="category in categories" >
                        <h1>
                            {{ category.name }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
