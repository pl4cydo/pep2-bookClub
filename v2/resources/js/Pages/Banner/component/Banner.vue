<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const countS = ref(null);
const marginS = ref('0px');
const banners = ref([])

const listBanner = async () => {
    try {
        const response = await axios.get('bannerlist');
        banners.value = response.data;
        countS.value = banners.value.length - 1
    } catch (error) {
        console.error(error)
    }
}

const jj = () => {
    const currentMarginS = parseInt(marginS.value);
    if (countS.value > 0) {
        marginS.value = (currentMarginS - 760) + 'px';
        countS.value--
    } else {
        marginS.value = '0px';
        countS.value = banners.value.length - 1
    }
}

onMounted(() => {
    listBanner()
    setInterval(() => {
        jj()
    }, 5000)
})

</script>

<template>
    <div class="highlights-slider">
        <h2 class="highlights-title">Destaques</h2>
        <div class="test" :style="{ marginLeft: marginS }">
            <div class="boxSlider" v-for="banner in banners" v-bind:key="banner.id">
                <div class="banner">
                    <div class="bannerLeft">
                        <div class="imgBanner">
                            <img :src="'/storage/images/' + banner.image" alt="Book Image" class="small-slider-img">
                        </div>
                    </div>
                    <div class="bannerRight">
                        <div class="infoBanner">
                            <h1 class="margin10">{{ banner.title }}</h1>
                            <h1 class="margin10">Informações: {{ banner.info }}</h1>
                            <div v-if="banner.ad">
                                <p class="margin10">Preço: {{ banner.value }}</p>
                                <p class="margin10">Empresa: {{ banner.company }}</p>
                                <div class="ml-3 m-4">
                                    <!-- {{ banner.link }} -->
                                    <a :href="banner.link" target="_blank">Clique aqui!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button @click="jj()"> > </button> 
    </div>
</template>

<style scoped>
.highlights-slider {
    background-color: #1f2937;
    display: flex;
    flex-direction: column;
    width: 760px;
    overflow: hidden;
    position: relative;
    border-radius: 6px;
    box-shadow: 5px 5px 5px #131820; 
    margin: 20px;
}

.highlights-title {
    padding: 10px;
    padding-bottom: 0;
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
    margin-left: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.imgBanner {
    width: 95%;
    height: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.imgBanner img {
    max-height: 95%;

}

.bannerRight {
    width: 70%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.infoBanner {
    border-radius: 6px;
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