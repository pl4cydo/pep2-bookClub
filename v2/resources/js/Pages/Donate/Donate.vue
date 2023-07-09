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
                            <h1 class="font-bold">Doar Livros</h1>
                            <p class="mt-3">Use essa área para se comunicar com a plataforma e facilitar a doação de livros para instituições</p>
                            <p class="mt-3">Doar livros e fomentar a leitura é essencial para a sociedade. Ao compartilharmos livros, estamos oferecendo a oportunidade de explorar novos mundos e expandir o conhecimento. Além disso, a doação de livros promove o desenvolvimento humano, estimula a criatividade e fortalece a empatia. É uma forma de democratizar o acesso à informação e ao aprendizado, conectando pessoas de diferentes origens e realidades. A doação de livros também fortalece a solidariedade e a generosidade, promovendo a valorização da cultura e construindo uma comunidade colaborativa. Cada livro doado é um convite à descoberta e ao diálogo, um investimento no futuro. Vamos abrir espaço em nossas estantes e corações para a doação de livros, compartilhando o prazer da leitura e contribuindo para uma sociedade mais leitora, rica em cultura e humana.</p>
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