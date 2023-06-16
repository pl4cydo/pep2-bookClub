<script setup>
import { onMounted, ref } from 'vue';

const countS = ref(3);
const marginS = ref('0px');
const banners = ref([
    {
        title: 'Banner 1 (ad)',
        info: 'Informações do banner 1',
        valor: '2,01',
        link: 'Link do banner 1',
        empresa: 'Empresa do banner 1',
        backgroundColor: 'white',
        ad: 1
    },
    {
        title: 'Informativo 2',
        info: 'Informações do banner 2',
        valor: '',
        link: 'Link do banner 2',
        empresa: '',
        backgroundColor: 'black',
        ad: 0
    },
    {
        title: 'Informativo 3',
        info: 'Informações do banner 3',
        valor: '2,03',
        link: 'Link do banner 3',
        empresa: 'Empresa do banner 3',
        backgroundColor: 'white',
        ad: 0
    },
    {
        title: 'Banner 4 (ad)',
        info: 'Informações do banner 4',
        valor: '2,04',
        link: 'Link do banner 4',
        empresa: 'Empresa do banner 4',
        backgroundColor: 'black',
        ad: 1
    }
]);

const jj = () => {
    const currentMarginS = parseInt(marginS.value);
    if (countS.value > 0) {
        marginS.value = (currentMarginS - 760) + 'px';
        console.log(marginS.value)
        countS.value--
        console.log(countS.value)
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
    <div class="highlights-slider"  >
        <div class="test" :style="{ marginLeft: marginS }">
            <div class="boxSlider" v-for="banner in banners"  >
                <div class="banner" >
                    <div class="bannerLeft">
                        <div class="imgBook">

                        </div>
                    </div>
                    <div class="bannerRight">
                        <div class="infoBanner">
                            <h1 class="margin10">{{ banner.title }}</h1>
                            <h1 class="margin10">{{ banner.info }}</h1>
                            <div v-if="banner.ad"> 
                                <h1 class="margin10">{{ banner.valor }}</h1>
                                <h1 class="margin10">{{ banner.empresa }}</h1>
                            </div>
                            <a class="margin10" href="#">{{ banner.link }}</a>
                        </div>
                    </div>
                    <!-- <img src="http://placehold.it/760x256"> -->
                </div>
            </div>
        </div>
    </div>
    <button @click="jj()"> > </button>
</template>

<style scoped>
.highlights-slider {
    display: flex;
    border: 1px solid white;
    width: 760px;
    overflow: hidden;
    position: relative;
}

.test {
    display: flex;
    transition: 0.8s ease;
}

.boxSlider {
    display: flex;
    flex-direction: row;
}

.banner {
    width: 760px;
    height: 256px;
    margin-left: 0%;
    display: flex;
    /* animation-name: fade;
    animation-duration: 1.5s; 
    background-color: blueviolet; */
}

.bannerLeft {
    width: 30%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.imgBook {
    border: 1px solid white;
    width: 95%;
    height: 90%;
}

.bannerRight {
    width: 70%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.infoBanner {
    border: 1px solid white;
    width: 95%;
    height: 90%;
}

.margin10 {
    margin-top: 10px;
    margin-left: 10px;
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