<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <teleport to="body"> 
        <div class="blocoHeader">
            <header class="header">
                <div id="title">
                    <h1>Book</h1>
                    <h1>Club</h1>
                </div>
        
            </header>
        </div>
    </teleport>


    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <!-- <div>
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div> -->

        <div >
            <slot />
        </div>
    </div>
</template>

<style scoped>
* {
    color: white;
    max-width: 1200px;
    margin: 0 auto;
    padding: 6px;
    text-shadow: 5px 5px 5px black;
}

.blocoHeader{
    top: 0;
    position: fixed;
    max-width: none;
    width: 100%;
    padding: 0;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    top: 0;
    right: 0;
}

#title {
    margin-left: 0;
    flex-direction: column;
    line-height: 10px;
    font-size: 2em;
    padding: 0%;
}

#title h1 {
    font-size: 20px;
}

#register-btn,
#login-btn {
    color: white;
    margin-right: 10px;
    border: 2px solid #3e3ec5;
    border-radius: 8px;
    padding: 10px;
    transition: 0.5s;
}

#register-btn:hover,
#login-btn:hover {
    background: #3e3ec5;
    color: #ffffff;
    transition: 0.3s all;
}

/* .dark .bloco {
    background-image: url("dots-lighter.jpg");
    background-color: #111;
    color: #fff;
  } */

.canLogin {
    /* position: fixed; */
    margin-right: 0;
    padding: 6px;
    text-align: right;
    padding: 0%;
}

.link {
    font-weight: 600;
    color: #666666;
}

.link:hover {
    color: #000000;
}

.link.dark {
    color: #666666;
}

.link.dark:hover {
    color: #ffffff;
}

.link:focus {
    outline: none;
    outline-width: 2px;
    border-radius: 0.125rem;
    outline-color: #f00;
}
</style>