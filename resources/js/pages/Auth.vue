<template>
    <main class="bg-secundaria min-h-screen w-full text-primaria text-center flex flex-col justify-center items-center">
        <div class="mx-[20px] w-full max-w-[600px] lg:max-w-[600px] flex flex-col justify-center items-center"> 
            <div class="my-[5px] flex items-center justify-center">
                <img :src="logo" class="w-[35px] h-[35px] shrink-0 object-contain" alt="Currículo Express">
                <h1 class="font-bold text-[25px] lg:text-[30px]">Currículo Express</h1>
            </div>
            <div class="bg-primaria rounded-[20px] p-5 py-12 lg:p-6 lg:py-12 w-[90%] lg:w-[80%]">
                <div v-if="!cadastrando">
                    <div class="flex flex-col justify-center items-center">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" placeholder="Email">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" placeholder="Senha">
                        <button class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer">Login</button>
                        <p @click="cadastrando = true" class="text-secundaria cursor-pointer">Não possui uma conta?</p>
                    </div>
                </div>
                <div v-else>
                    <div class="flex flex-col justify-center items-center">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="text" placeholder="Nome" v-model="register.name">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" placeholder="Email" v-model="register.email">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" placeholder="Senha" v-model="register.password">
                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" placeholder="Confirmar senha" v-model="register.confirm_password">
                        <button class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer" @click="makeRegister">Cadastro</button>
                        <p @click="cadastrando = false" class="text-secundaria cursor-pointer">Já possui uma conta?</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';

    import logo from '../assets/logo.png';
    import axios from 'axios';
    
    const router = useRouter();

    const cadastrando = ref(false);

    const register = ref({
        name: '',
        email:'',
        password:'',
        confirm_password:''
    })

    const makeRegister = async() => {
        const response = await axios.post('/register', register.value);
        console.log(response.data)
        router.push('/');
    }


</script>
