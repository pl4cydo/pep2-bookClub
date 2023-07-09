<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import InfoPerfil from './Partials/InfoPerfil.vue';
import PersonalBooks from '../Book/Components/PersonalBooks.vue';
import IconMessage from '../Messages/Component/IconMessage.vue';
import Message from '../Messages/Message.vue';
import SelfComments from '../Comment/Components/SelfComments.vue';
import FavBook from '../Favorite/Component/FavBooks.vue'
import BookSliderPersonal from '../Book/Components/BookSliderPersonal.vue';
import { ref } from 'vue';
import DealPerfil from './Partials/DealPerfil.vue';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    books: Array,
    user: Number
});

const navProfile = ref('deal')

</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="bloco">
            <div class="left">
                <InfoPerfil />
            </div>
            <div class="right">
                <div class="navProfile">
                    <button class="button" @click=" navProfile = 'deal'">Transações</button>
                    <button class="button" @click=" navProfile = 'fav'">Favoritos</button>
                    <button class="button" @click=" navProfile = 'mybook'">Meus Livros</button>
                    <button class="button" @click=" navProfile = 'comment'">Comentários já feitos</button>
                    <button class="button" @click=" navProfile = 'option'">Opções</button>
                </div>

                <div class="navFlow">
                    <div v-if="navProfile == 'fav'">
                        <FavBook />
                    </div>
    
                    <div v-if="navProfile == 'mybook'">
                        <!-- <PersonalBooks :books="books" :user="user" /> -->
                        <BookSliderPersonal />
                    </div>
    
                    <div v-if="navProfile == 'comment'">
                        <SelfComments />
                    </div>
    
                    <div v-if="navProfile == 'deal'">
                        <DealPerfil />
                    </div>

                    <div class="p-2" v-if="navProfile == 'option'" >
                        <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
                        <UpdatePasswordForm class="max-w-xl" />
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>


            </div>
        </div>
        <!-- <IconMessage /> -->

    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    margin-top: 15px;
    width: 100%;
    height: auto;
    /* border: 1px solid white; */
    display: flex;
    justify-content: space-between;
}

.bloco * {
    margin-top: 0;
    margin: 5px;
}

.left {
    min-width: 360px;
    width: 30%;
    height: 300px;
    display: flex;
    justify-content: center;
    padding-top: 15px;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 6px;
}

.right {
    width: 70%;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.right * {
    margin-left: 0;
    margin-bottom: 20px;
}

.navProfile {
    min-height: 48px;
    width: 100%;
    height: 8%;
    margin: 0;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 6px;
    display: flex;
    justify-content: left;
    align-items: center;
}

.navFlow {
    margin-top: 10px;
    padding: 15px;
    max-width: 98%;
    min-width: 98%;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
}

.button {
    padding: 5px;
    margin: 0;
    margin-left: 15px;
    margin-right: 10px;
}

.button:hover {
    border-bottom: 1px solid white;
    transition: 0.8s ease;
}

.blocoMsg {
    padding: 1rem;
    background-color: #fff;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    display: flex;
}

.msg {
    height: 50px;
    width: 50px;
    border: 1px solid blue;
    border-radius: 50%;
    margin-left: 5px;
}

.msg:hover {
    background-color: blue;
    transition: 0.8s ease;
}

.notfic {
    background-color: #fff;
    height: 25px;
    width: 25px;
    border: 3px solid red;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: red;
    position: absolute;
}
</style>