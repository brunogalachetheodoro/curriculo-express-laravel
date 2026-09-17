<template>
    <header class="bg-secundaria justify-between flex items-center h-[70px] px-[20px] lg:px-[100px]">
        <div class="flex items-end">
            <img class="w-[25px]" :src="logo" alt="Currículo Express">
            <h2 class="text-primaria font-bold">Currículo Express</h2>
        </div>

        <div class="flex items-center cursor-pointer" @click="toggleLanguage">
            <img class="w-[25px] h-[25px] m-[8px]" :src="brazil" alt="Português">

            <div class="border border-primaria w-[50px] h-[30px] rounded-[20px] flex items-center pl-[3px]">
                <div class="bg-primaria h-[20px] w-[20px] rounded-full transition-transform duration-300" :class="locale === 'en' ? 'translate-x-[20px]' : 'translate-x-0'"></div>
            </div>

            <img class="w-[25px] h-[25px] m-[8px]" :src="usa" alt="English">
        </div>
    </header>
</template>

<script setup>
    import logo from '../assets/logo.png';
    import brazil from '../assets/brazil.png';
    import usa from '../assets/usa.png';
    import { useLanguage } from '../composables/useLanguage';

    const { locale, toggleLanguage } = useLanguage();
</script>