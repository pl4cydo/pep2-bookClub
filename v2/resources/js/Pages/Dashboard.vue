<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import BookSlider from './Book/Components/BookSlider.vue'
import Banner from '../Pages/Banner/component/Banner.vue'



// onMounted(() => {
//     list();
// })


// let a = $page.props.auth.user.name

</script>

<template>
    <Head title="Início" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="text-black ">
            <div class="max-w-7xl mx-auto">
                <div class="bloco">
                    <div class="blocoN">

                        <Banner />

                        <BookSlider :categoryNumber="{ a: null }"/>
                        <BookSlider :categoryNumber="{ a: 1 }"/>
                        <BookSlider :categoryNumber="{ a: 2 }"/>
                        <BookSlider :categoryNumber="{ a: 3 }"/>
                        <BookSlider :categoryNumber="{ a: 4 }"/>
                        <!-- <BookSlider :categoryNumber="{ a: 5 }"/> -->

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    color: white;
    overflow: hidden;
    background-color: #2b384b;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    border-radius: 0.25rem;
    display: flex;
    justify-content: center;

}

.blocoN {
    text-align: left;
    width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
