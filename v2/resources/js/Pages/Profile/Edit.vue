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

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    books: Array,
    user: Number
});

</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12 text-black">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bloco">
                    <div class="left">
                        <InfoPerfil />
                    </div>
                    <div class="right">
                        <div>
                            <FavBook />
                        </div>

                        <div >
                            <!-- <PersonalBooks :books="books" :user="user" /> -->
                            <BookSliderPersonal />
                        </div>

                        <!-- <div >
                            <SelfComments />
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status"
                                class="max-w-xl" />
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <UpdatePasswordForm class="max-w-xl" />
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <DeleteUserForm class="max-w-xl" />
                        </div> -->
                    </div>

                </div>
                <!-- <IconMessage /> -->


            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    width: 100%;
    height: auto;
    /* border: 1px solid white; */
    display: flex;
    justify-content: space-between;
}

.left {
    width: 30%;
    height: 600px;
    border: 1px solid white;
    display: flex;
    justify-content: center;
    padding-top: 15px;
}

.right {
    width: 70%;
    border: 1px solid white;
    display: flex;
    flex-direction: column;
    padding: 20px;
}

.right * {
    padding-bottom: 20px;
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