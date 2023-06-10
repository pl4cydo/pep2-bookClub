<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    categories: Array,
});


const form = useForm({
    name: ''
});

const submit = () => {
    form.post(route('category.store'))
    form.name = ''
}

const boo = ref(true)

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
            <div class="p-6 border-t border-gray-200">
              <div class="p-6 text-gray-900">Add Category</div>
              <form name="createForm" @submit.prevent="submit" class="flex">
                <label for="name" class="mr-5 text-xl">Name</label>
                <input
                  id="name"
                  v-model="form.name"
                  class="border border-gray-300 rounded-md px-3 py-2"
                />
                <button
                  type="submit"
                  class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                >
                  Send
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">Categories:</div>
            <div v-for="category in categories" class="p-6 border-t border-gray-200">
              <div>
                <h1 class="text-xl">{{ category.name }}</h1>
                <div v-if="boo">Opraaaa</div>
                <button @click="boo = false" class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                  Vai
                </button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      

    </AuthenticatedLayout>
</template>

<style>


</style>