<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const margin = ref('0px')


const next = () => {
    const currentMargin = parseInt(margin.value);
    margin.value = (currentMargin - 400) + 'px';
}   

const back = () => {
    const currentMargin = parseInt(margin.value);
    console.log(currentMargin)
    if(currentMargin < 0)
    margin.value = (currentMargin + 400) + 'px';
}   



// let a = $page.props.auth.user.name

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12 text-black">
            <div class="max-w-7xl mx-auto">
                <div class="bloco">
                    <div class="blocoN">
                        <div class="p-6 text-gray-900">You're logged in!</div>
                        <h1>{{ $page.props.auth.user.name }}</h1>
                        <h1>{{ $page.props.auth.user.is_admin }}</h1>

                        <h2 class="highlights-title">Tchucas</h2>
                        <div class="highlights-slider" >
                            <img class="highlights-img fade" src="http://placehold.it/760x256">
                            <img class="highlights-img fade" src="http://placehold.it/760x257">
                            <img class="highlights-img fade" src="http://placehold.it/760x258">
                            <img class="highlights-img fade" src="http://placehold.it/760x259">
                        </div>

                        <h1 class="categories-title">Bungas</h1>
                        <div class="small-slider-container">
                            <div class="small-slider" :style="{ left: margin }">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                                <img class="small-slider-img" src="http://placehold.it/140x200">
                            </div>
                            <div class="small-button-container">
                                <button id="prev-button" @click="back()" class="prev-button">&lt;</button>
                                <button id="next-button" @click="next()" class="next-button">&gt;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    background-color: white;
    overflow: hidden;
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
    border: 1px solid black;
}

.highlights-slider {
    max-width: fit-content;
    display: flex;
    border: solid blueviolet;
    overflow: hidden;
}

.highlights-img {
    width: 760px;
    height: 256px;
}

.fade {
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

.small-slider-container {
    overflow: hidden;
    position: relative;
}

.small-slider {
    display: flex;
    scroll-behavior: smooth;
    position: relative;
    align-items: center;
    width: auto;
    transition: 0.8s ease;
}

.small-slider-img {
    width: 140px;
    height: 200px;
    margin-right: 10px;
    transition: transform .10s;
    border: solid blueviolet;
}

.small-slider-img:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.small-button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    left: 10px;
    z-index: 1;
}

.prev-button,
.next-button {
    background: none;
    border: none;
    font-size: 24px;
    color: blueviolet;
    cursor: pointer;
}

#prev-button {
    left: 10px;
}

#next-button {
    right: 10px;
}
</style>
