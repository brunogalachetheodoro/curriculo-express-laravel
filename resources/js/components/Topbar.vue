<template>
    <header class="bg-secundaria justify-between flex items-center h-[70px] px-[20px] lg:px-[100px]">
        <div class="flex items-end">
            <img class="w-[25px]" :src="logo" alt="Currículo Express">
            <h2 class="text-primaria font-bold">Currículo Express</h2>
        </div>

        <div class="flex">
            <div class="flex items-center cursor-pointer" @click="toggleLanguage">
                <img class="w-[25px] h-[25px] m-[8px]" :src="brazil" alt="Português">
                <div class="border border-primaria w-[50px] h-[30px] rounded-[20px] flex items-center pl-[3px]">
                    <div class="bg-primaria h-[20px] w-[20px] rounded-full transition-transform duration-300" :class="locale === 'en' ? 'translate-x-[20px]' : 'translate-x-0'"></div>
                </div>
                <img class="w-[25px] h-[25px] m-[8px]" :src="usa" alt="English">
            </div>
            <div>                
                <img v-if="isAuthRoute()" class="w-[25px] h-[25px] m-[8px] ml-[20px]" :src="logout_off" alt="Logout-off">
                <img v-else class="w-[25px] h-[25px] m-[8px] ml-[20px] cursor-pointer" :src="logout" alt="Logout" @click="makeLogout">
            </div>
        </div>
    </header>
</template>

<script setup>
    import logo from '../assets/logo.png';
    import brazil from '../assets/brazil.png';
    import usa from '../assets/usa.png';
    import logout from '../assets/logout.png';
    import logout_off from '../assets/logout-off.png';
    import { useLanguage } from '../composables/useLanguage';
    import axios from 'axios';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    const { locale, toggleLanguage } = useLanguage();

    const makeLogout = async() => {
        try {
            await axios.post('/logout');
            router.push('/auth');
        } catch(error){
            console.log('Error logging out:', error);
        }
    };


    const isAuthRoute = () => window.location.pathname === '/auth';
</script>