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

    <div>
      <div class="formBloc">
        <div class="p-6">Add Category</div>
        <form name="createForm" @submit.prevent="submit" class="flex">
          <label for="name" class="mr-5 text-xl">Name</label>
          <input id="name" v-model="form.name" class="input" />
          <button type="submit" class="button">
            Send
          </button>
        </form>

      </div>

      <div class="formBloc">

        <div class="p-6">Categories:</div>
        <div v-for="category in categories" v-bind:key="category.id" class="p-6 border-t border-gray-200">
          <div class="category">
  
            <div>
              <h1 class="text-xl">{{ category.name }}</h1>
            </div>
  
            <div class="blocoButton">
              <button @click="currentDiv = category.id; boo = !boo"
                class="button2">
                Opções
              </button>
  
              <div class="flex" v-if="boo == false && currentDiv === category.id">
                <form name="updateForm" @submit.prevent="submitUpdate((category.id).toString())" class="flex">
  
                  <input id="name" class="input2" v-model="formUpdate.name" />
                  <button @click="boo = true" type="submit"
                    class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md hover:bg-blue-600"> Confirmar </button>
                </form>
  
                <form name="deleteForm" @submit.prevent="destroy(category.id)">
                  <button class="px-4 py-2 ml-4 text-white bg-red-500 rounded-md hover:bg-red-600">
                    Delete
                  </button>
                </form>
  
              </div>
            </div>
  
  
  
          </div>
  
        </div>
      </div>
    </div>


  </AuthenticatedLayout>
</template>

<style scoped>
* {
  color: white;
  padding: 5px;
}

.category {
  display: flex;
  justify-content: space-between;
}

.formBloc {
  margin-bottom: 16px;
  background-color: #1f2937;
  box-shadow: 0px 5px 5px #131820;
}

.formBloc * {
  padding: 15px;
}

.input {
  margin-top: 6px;
  left: 10%;
  color: white;
  border: 0;
  border-bottom: 1px solid white;
  background: transparent;
  width: 40%;
  height: 10%;
  padding: 8px 0 5px 0;
  font-size: 13px;
}

.input:focus {
  border: none;
  outline: none;
  border-bottom: 1px solid #3e3ec5;
}

.input:hover {
  border-bottom: 1px solid #3e3ec5;
  transition: 0.5s;
}

.input::placeholder {
  color: gray;
}

.button {
  margin: 20px;
  color: white;
  border: 1px solid white;
  margin-left: 40px;
  width: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 15px;
}

.button:hover {
  background-color: #3e3ec5;
  transition: 0.8s ease;
}

.button2 {
  height: 60px;
  padding: 8px 16px; /* Equivalente a px-4 py-2 */
  margin-right: 16px; /* Equivalente a mr-4 */
  color: white;
  background-color: #3b82f6; /* Equivalente a bg-blue-500 */
  border-radius: 4px; /* Equivalente a rounded-md */
}

.button2:hover {
  background-color: #2563eb; /* Equivalente a hover:bg-blue-600 */
}

.blocoButton {
  display: flex;
  justify-content: center;
  align-items: center;
}

.input2 {
  color: black;
  border: 1px solid #ccc; /* Equivalente a border border-gray-300 */
  border-radius: 4px; /* Equivalente a rounded-md */
  padding: 8px 12px; /* Equivalente a px-3 py-2 */
}
</style>