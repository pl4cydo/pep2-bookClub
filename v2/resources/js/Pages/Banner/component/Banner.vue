<script setup>
import { onMounted, ref } from 'vue';

const countS = ref(3);
const marginS = ref('0px');
const banners = ref([
    {
        title: 'Banner 1',
        info: 'Informações do banner 1',
        valor: 'Valor do banner 1',
        link: 'Link do banner 1',
        empresa: 'Empresa do banner 1',
        backgroundColor: 'Cor de fundo do banner 1',
        ad: 'Anúncio do banner 1'
    },
    {
        title: 'Banner 2',
        info: 'Informações do banner 2',
        valor: 'Valor do banner 2',
        link: 'Link do banner 2',
        empresa: 'Empresa do banner 2',
        backgroundColor: 'Cor de fundo do banner 2',
        ad: 'Anúncio do banner 2'
    },
    {
        title: 'Banner 3',
        info: 'Informações do banner 3',
        valor: 'Valor do banner 3',
        link: 'Link do banner 3',
        empresa: 'Empresa do banner 3',
        backgroundColor: 'Cor de fundo do banner 3',
        ad: 'Anúncio do banner 3'
    },
    {
        title: 'Banner 4',
        info: 'Informações do banner 4',
        valor: 'Valor do banner 4',
        link: 'Link do banner 4',
        empresa: 'Empresa do banner 4',
        backgroundColor: 'Cor de fundo do banner 4',
        ad: 'Anúncio do banner 4'
    }
]);

const jj = () => {
    const currentMarginS = parseInt(marginS.value);
    if (countS.value > 0) {
        marginS.value = (currentMarginS - 760) + 'px';
        countS.value--
    } else {
        marginS.value = '0px';
        countS.value = 3
    }
}

// onMounted(() => {
//     setInterval(() => {
//         jj()
//     }, 2000)
// })



</script>

<template>
    <h2 class="highlights-title">Tchucas</h2>
    <div class="highlights-slider">
        <div class="boxSlider" v-for="banner, index in banners" :style="{ marginLeft: marginS }" >
            <!-- {{ banner }} -->
            <div class="banner">
                {{ index }}
            </div>
            <!-- <img class="highlights-img" src="http://placehold.it/760x256">
            <img class="highlights-img" src="http://placehold.it/760x257">
            <img class="highlights-img" src="http://placehold.it/760x258">
            <img class="highlights-img" src="http://placehold.it/760x259"> -->
        </div>
    </div>
    <button @click="jj()"> > </button>
</template>

<style setup>
.highlights-slider {
    display: flex;
    border: 1px solid white;
    overflow: hidden;
    width: 760px;

}

.boxSlider {
    display: flex;
    width: auto;
    transition: 0.8s ease;
}

.banner, .highlights-img {
    width: 760px;
    height: 256px;
    animation-name: fade;
    animation-duration: 1.5s;
    background-color: blueviolet;
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