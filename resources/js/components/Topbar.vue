<template>
    <header class="justify-between flex items-center h-[70px]">
        <div class="flex items-end ml-[10px]">
            <img class="w-[25px]" :src="logo" alt="Currículo Express">
            <h2 class="text-primaria font-bold">Currículo Express</h2>
        </div>
        <div class="flex items-center cursor-pointer">
            <img class="w-[25px] h-[25px] m-[8px]" :src= "brazil" alt="">
            <div class="border border-primaria w-[50px] h-[30px] rounded-[20px] flex items-center pl-[3px]">
                <div class="bg-primaria h-[20px] w-[20px] rounded-full"></div>
            </div>
            <img class="w-[25px] h-[25px] m-[8px]" :src= "usa" alt="">
        </div>
    </header>
</template>

<script setup>
    import logo from '../assets/logo.png';
    import brazil from '../assets/brazil.png';
    import usa from '../assets/usa.png';
</script>