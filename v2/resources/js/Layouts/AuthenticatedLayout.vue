<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Createbook from '../Pages/Book/Components/Create.vue'
import PrimaryButton from '../Components/PrimaryButton.vue';
import Search from '../Pages/Book/Components/Search.vue'
import IconMessage from '../Pages/Messages/Component/IconMessage.vue'

const showingNavigationDropdown = ref(false);

let boo = ref(false);

function changeBoo() {
    boo.value = !boo.value;
    console.log(boo)
}

</script>

<template>
    <div>
        <Teleport to="body ">
            <Createbook v-if="boo" />
            <div class="large">
                <nav class="header">
                    <!-- Primary Navigation Menu -->
                    <div class="navLink">
                        <!-- <div class="flex justify-between h-16"> -->
                        <div class="flexDiv">
                            <div id="title">
                                <h1>Book</h1>
                                <h1>Club</h1>
                            </div>
                            <!-- Navigation Links -->
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Início
                            </NavLink>
                            <!-- <div v-if="$page.props.auth.user.is_admin" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    <NavLink :href="route('category.index')" :active="route().current('category.index')">
                                        Category
                                    </NavLink>
                                </div> -->
                            <!-- <NavLink :href="route('book.index')" :active="route().current('book.index')">
                                    Book
                                </NavLink> -->
                        </div>
        
                        <div class="SeachBloc">
                            <Search />
                        </div>
        
                        <div v-if="$page.props.auth.user.is_admin">
                            <IconMessage />
                        </div>
        
                        <button class="button" :onclick="changeBoo">Novo Livro</button>
        
        
                        <div class="ml-3 relative flex">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ $page.props.auth.user.name }}
        
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>
        
                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <div v-if="$page.props.auth.user.is_admin">
                                        <DropdownLink :href="route('category.index')"> Category </DropdownLink>
                                        <DropdownLink :href="route('message.create')"> Message </DropdownLink>
                                        <DropdownLink :href="route('banner.index')"> Banner </DropdownLink>
                                    </div>
                                    <DropdownLink :href="route('message.donate')"> Doar </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
        
        
                        <!-- Hamburger -->
                        <!-- <div class="-mr-2 flex items-center sm:hidden">
                                            <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path :class="{
                                                        hidden: showingNavigationDropdown,
                                                        'inline-flex': !showingNavigationDropdown,
                                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 6h16M4 12h16M4 18h16" />
                                                    <path :class="{
                                                        hidden: !showingNavigationDropdown,
                                                        'inline-flex': showingNavigationDropdown,
                                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div> -->
                        <!-- </div> -->
                    </div>
        
                    <!-- Responsive Navigation Menu -->
                    <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </ResponsiveNavLink>
                        </div>
        
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                            </div>
                            <!-- <Createbook v-if="boo" /> -->
                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </Teleport>



        <!-- Page Heading -->
        <!-- <header class="bg-white shadow" v-if="$slots.header">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <slot name="header" />
                        </div>
                    </header> -->

        <!-- Page Content -->
        <main class="py-28 ">
            <slot />
        </main>
    </div>
</template>

<style scoped>

* {
    color: white;
    max-width: 1200px;
    margin: 0 auto;
    /* padding: 15px; */
    text-shadow: 5px 5px 5px black;
}

.large {
    width: 100%;
    max-width: none;
    height: auto;
    top: 0;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #1f2937;
    box-shadow: 0px 5px 5px #131820;
}

.header {
    background-color: #1f2937;
    color: #f1f1f1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    top: 0;
    right: 0;
    padding: 0%;
    padding: 15px;
}

#title {
    margin-left: 0;
    flex-direction: column;
    line-height: 10px;
    font-size: 2em;
}

#title h1 {
    font-weight: 200;
    padding: 15px;
    text-shadow: 5px 5px 5px black;
}

.jorge {
    /* background-color: #1f2937;
    display: flex;
    width: 100vw;
    justify-content: center;
    align-items: center; */
    padding: 0%;
}




.flexDiv {
    display: flex;

    padding: 0%;
    margin: 0%;
}

.SeachBloc {
    height: 100%;
    width: 40%;
}

.nav {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    border-bottom-width: 1px;
}

.navLink {
    align-items: center;
    padding: 0%;
    max-width: 7xl;
    margin: 0%;
    display: flex;
    justify-content: space-between;

    width: 100%;
}

@media (min-width: 640px) {
    .navLinks {
        padding-left: 4.5rem;
        padding-right: 4.5rem;
    }
}

@media (min-width: 1024px) {
    .navLinks {
        padding-left: 6rem;
        padding-right: 6rem;
    }
}

.button {
    color: white;
    padding: 10px;
    border-left: none;
}

.button:hover {
    border-radius: 6px;
    background-color: #2c3b4e;
    border: 1px solid #3e3ec5;
    transition: 0.8s ease;
}
</style>