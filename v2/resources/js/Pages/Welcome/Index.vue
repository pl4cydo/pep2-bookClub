<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BookList from '../Book/Components/ListBooks.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
});

</script>

<template>
    <Head title="Welcome" />
    <header class="header">

        <div id="title">
            <h1>Book</h1>
            <h1>Club</h1>
        </div>

        <div v-if="canLogin" class="canLogin">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" id="login-btn">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" id="login-btn">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" id="register-btn">Register</Link>
            </template>
        </div>

    </header>

    <div class="bloco">

        <div class="aside">
            <h2><span>Compartilhe histórias</span></h2>
            <h2>Crie universos</h2>
            <p>
                A plataforma Book Club tem o objetico de fazer as historias guardadas serem compartilhas para cada universo pessoal. Foca em comunidades o Book Club vem com a proposta de falicitar a junção de pessoas para troca de livros e doações para instituições. 

            </p>
            <p>
                Every living creature on earth dies alone
            </p>
            <p>
                痛みは避けられない、苦しみはオプションだ
            </p>
        </div>

        <div class="blocoImg">
            <img src="./logo2.png" alt="Book-logo">
        </div>

    </div>
</template>

<style scoped>
* {
    background: #1f2937;
    color: #f1f1f1;
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px;
}

.header {
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
    background-color: #f1f1f1;
    padding: 0%;
}

#title h1 {
    font-weight: 200;
}

#register-btn,
#login-btn {
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

.bloco {
    margin-top: 50px;
  /*  border: 1px solid white; */
    position: relative;
    display: flex;
    justify-content: space-between;

    /* min-height: 100vh; */
    height: auto;
    background-image: url("dots-darker.jpg");
    background-position: center;
    /* background-color: #f8f8f8; */
    color: #000;
}



.aside {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.aside h2 {
    font-size: 50px;
    line-height: 10px;
    margin-left: 10px;
}

.aside span {
    color: #3e3ec5;
    margin-left: -20px;
}

.aside p {
    line-height: 20px;
    max-width: 500px;
    font-size: medium;
}

.blocoImg {
    overflow: hidden;
    height: 385px;
    position:relative;
}

.blocoImg img {
    margin-top: -48px;
}

</style>
