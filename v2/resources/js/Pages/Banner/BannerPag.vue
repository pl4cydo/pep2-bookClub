<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    info: '',
    value: '',
    link: '',
    company: '',
    image: '',
    ad: '',
});

const submit = () => {
    console.log('aqui')
    form.post(route('banner.store'))
    form.title = ''
    form.info = ''
    form.value = ''
    form.link = ''
    form.company = ''
    form.ad = ''
    form.image = null
    // location.reload();
}

const handleImageChange = (event) => {
    form.image = event.target.files[0]
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="formBody">

                        <form @submit.prevent="submit">
                            <div class="bloco">
                                <div>
                                    <label for="title">Titulo</label>
                                    <input class="input" id="title" v-model="form.title"/>
                                </div>
    
                                <div>
                                    <label for="title">Informações</label>
                                    <input class="input" id="info" v-model="form.info"/>
                                </div>

                                <div>
                                    <label for="value">Valor</label>
                                    <input class="input" id="value" v-model="form.value"/>
                                </div>

                                <div>
                                    <label for="link">Link</label>
                                    <input class="input" id="link" v-model="form.link"/>
                                </div>

                                <div>
                                    <label for="company">Empresa</label>
                                    <input class="input" id="company" v-model="form.company"/>
                                </div>

                                <div class="select">
    
                                    <label class="label" for="ad">Ad / Banner</label>
                                    <select class="text-black" name="ad" id="form.ad"  v-model="form.ad">
                                        <option class="option" value="1" > AD </option>
                                        <option class="option" value="0" > Banner </option>
                                    </select>
    
                                </div>
    
                                <div>
                                    <label class="label" for="image">Image</label>
                                    <input class="input" id="image" type="file"  @change="handleImageChange" />
                                </div>
    
                                <button type="submit" class="button"> Novo banner </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    border: 1px solid white;
    width: 70%;
}

.formBody {
    border-top: none;
    border-radius: 20px;
    border-top-left-radius: 0%;
    border-top-right-radius: 0%;
    height: 80%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 1px solid white;
}

.formBody form {
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.select {
    display: flex;
}

.bloco div {
    display: flex;
}

.button {
    margin-top: 20px;
    color: white;
    border: 1px solid white;
    margin-left: 40px;
    width: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.button:hover {
    background-color: #3e3ec5;
    transition: 0.8s ease;
}


.option {
    background-color: #3e3ec5;
    
}

.input {

    margin-top: 6px;
    left: 10%;
    color: white;
    position: relative;
    border: 0;
    border-bottom: 1px solid white;
    background: transparent;
    width: 70%;
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

.headerTitle {
    height: 100%;
    width: 90%;
    display: flex;
    align-items: center;
}

.headerExit {
    height: 100%;
    width: 10%;
}

.headerExitLink {
    margin-top: 60%;
    margin-left: 30%;
    font-size: 30px;
    color: white;
}
</style>