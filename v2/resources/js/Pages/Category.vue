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

const formUpdate = useForm({
  name: ''
})

const submitUpdate = (id) => {
  // console.log(id, formUpdate.name)
  formUpdate.put(route('category.update', id), {
    _method: 'PUT', 
  })
  boo = true; 
  formUpdate.name = ''
}

function destroy(id) {
    if (confirm("Tem certeza?")) {
        form.delete(route('category.destroy', id));
    }
}

const boo = ref(true)
const currentDiv = ref(null)

</script>

<template>
  <Head title="Category" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Category</h2>
    </template>

    <div class="py-12 text-black">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 border-t border-gray-200">
            <div class="p-6 text-gray-900">Add Category</div>
            <form name="createForm" @submit.prevent="submit" class="flex">
              <label for="name" class="mr-5 text-xl">Name</label>
              <input id="name" v-model="form.name" class="border border-gray-300 rounded-md px-3 py-2" />
              <button type="submit" class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">
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
            <div class="category">

              <div>
                <h1 class="text-xl">{{ category.name }}</h1>
              </div>

              <div class="flex">
                <button  @click="currentDiv = category.id; boo = !boo"
                  class="px-4 py-2 mr-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                  Opções
                </button>

                <div class="flex" v-if="boo == false && currentDiv === category.id">
                  <form name="updateForm" @submit.prevent="submitUpdate((category.id).toString())" class="flex">

                    <input id="name" class="border border-gray-300 rounded-md px-3 py-2" v-model="formUpdate.name"/>
                    <button 
                      @click="boo = true"
                      type="submit"
                      class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md hover:bg-blue-600"> Confirmar </button>
                  </form>

                  <form name="deleteForm" @submit.prevent="destroy(category.id)">
                    <button 
                    class="px-4 py-2 ml-4 text-white bg-red-500 rounded-md hover:bg-red-600"
                    >
                      Delete
                    </button>
                  </form>

                </div>
              </div>



            </div>

          </div>
        </div>
      </div>
    </div>


  </AuthenticatedLayout>
</template>

<style scoped>
.category {
  display: flex;
  justify-content: space-between;
}
</style>