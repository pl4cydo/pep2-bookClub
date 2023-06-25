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

    <Teleport to="body ">

        <div class="blocoHeader">
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
        </div>
    </Teleport>


    <div class="bloco">

        <div class="bloquinho">
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

    </div>
</template>

<style scoped>
* {
    color: #f1f1f1;
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px;
    text-shadow: 5px 5px 5px black;
}

.blocoHeader{
    top: 0;
    position: fixed;
    max-width: none;
    width: 100%;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
    padding: 0;
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
    font-weight: 200;
    text-shadow: 5px 5px 5px black;
}

#register-btn,
#login-btn {
    margin-right: 10px;
    border: 1px solid white;
    border-radius: 6px;
    padding: 10px;
    transition: 0.5s;
}

#register-btn:hover,
#login-btn:hover {
    background-color: #2c3b4e;
    border: 1px solid #3e3ec5;
    transition: 0.8s ease;
    color: #ffffff;
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

.bloco {
    padding-top: 8em;
  /*  border: 1px solid white; */
    display: flex;
    justify-content: space-between;
    padding-left: 0;
    padding-right: 0;
    /* min-height: 100vh; */
    background-image: url("dots-darker.jpg");
    background-position: center;
    /* background-color: #f8f8f8; */
    color: #000;
}

.bloquinho {
    border-radius: 6px;
    display: flex;
    width: 90%;
    height: auto;
    padding: 45px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
}


.aside {
    background-color: #1f2937;
    display: flex;
    flex-direction: column;
    text-align: left;
    padding-left: 5px;
    padding-right: 5px;
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
    background-color: #1f2937;
    padding-left: 5px;
    padding-right: 5px;
}

.blocoImg img {
    margin-top: -48px;
}

</style>
