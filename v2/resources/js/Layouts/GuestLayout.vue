<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="header">
        <div id="title">
            <h1>Book</h1>
            <h1>Club</h1>
        </div>

    </header>

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-800">
        <!-- <div>
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div> -->

        <div class="sm:max-w-md mt-2 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<style scoped>
* {
    color: white;
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px;
}

.header {
    color: #f1f1f1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    top: 0;
    right: 0;
    border-bottom: 1px solid white;
}

#title {
    margin-left: 0;
    flex-direction: column;
    line-height: 10px;
    font-size: 2em;
    padding: 0%;
}

#title h1 {
    font-weight: 200;
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