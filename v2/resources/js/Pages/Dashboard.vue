<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import BookSlider from './Book/Components/BookSlider.vue'





// let a = $page.props.auth.user.name

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12 text-black ">
            <div class="max-w-7xl mx-auto">
                <div class="bloco">
                    <div class="blocoN">
                        <!-- <div class="p-6 text-gray-900">You're logged in!</div>
                        <h1>{{ $page.props.auth.user.name }}</h1>
                        <h1>{{ $page.props.auth.user.is_admin }}</h1> -->

                        <!-- <h2 class="highlights-title">Tchucas</h2>
                        <div class="highlights-slider" >
                            <img class="highlights-img fade" src="http://placehold.it/760x256">
                            <img class="highlights-img fade" src="http://placehold.it/760x257">
                            <img class="highlights-img fade" src="http://placehold.it/760x258">
                            <img class="highlights-img fade" src="http://placehold.it/760x259">
                        </div> -->

                        <BookSlider :category="{ a: 1 }"/>
                        <BookSlider :category="{ a: 2 }"/>
                        <BookSlider :category="{ a: 3 }"/>

                        
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    background-color: #1f2937;
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

</style>
