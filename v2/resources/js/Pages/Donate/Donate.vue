<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MessageCreate from '../Messages/Component/MessageCreate.vue';


</script>

<template>
    <Head title="Doar" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book</h2>
        </template> -->

        <div class="pt-6 text-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bloco">
                    <div class="blocoLeft">
                        <div class="left">
                            <h1>Doar Livros</h1>
                            <p class="mt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                        </div>
                    </div>
                    <div class="blocoRigth">
                        <MessageCreate />
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
.bloco {
    overflow: hidden;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    border-radius: 0.25rem;
    display: flex;
}

.blocoLeft {
    width: 50%;
}

.left {
    padding: 30px;
    text-align: justify;
}

.blocoRigth {
    width: 50%;
}
</style>