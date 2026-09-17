<template>
    <Topbar />
    <main class="bg-secundaria min-h-screen w-full text-primaria text-center flex flex-col justify-center items-center">        
        <div class="w-full flex flex-col justify-center items-center transition-all duration-1000 ease-in-out" :class="leaving ? 'opacity-0 scale-95 blur-[3px]': 'opacity-100 scale-100 blur-0'">
                <div class="w-full overflow-hidden">
                    <div class="flex justify-center items-center w-[200%] transition-transform duration-1000 ease-in-out" :class="cadastrando ? '-translate-x-1/2' : 'translate-x-0'">
                        <div class="w-1/2 shrink-0 flex justify-center">
                            <div class="w-full max-w-[600px] flex justify-center items-start">
                                <div class="bg-primaria rounded-[20px] p-5 py-12 lg:p-6 lg:py-12 w-[90%] lg:w-[80%]">
                                    <div class="flex flex-col justify-center items-center">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" :placeholder="t('auth.email')" v-model="login.email">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.password')" v-model="login.password">
                                        <button class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer" @click="makeLogin">{{ t('auth.loginButton') }}</button>
                                        <p @click="cadastrando = true" class="text-secundaria cursor-pointer">{{ t('auth.noAccount') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 shrink-0 flex justify-center">
                            <div class="w-full max-w-[600px] flex justify-center items-start">
                                <div class="bg-primaria rounded-[20px] p-5 py-12 lg:p-6 lg:py-12 w-[90%] lg:w-[80%]">
                                    <div class="flex flex-col justify-center items-center">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="text" :placeholder="t('auth.name')" v-model="register.name">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" :placeholder="t('auth.email')" v-model="register.email">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.password')" v-model="register.password">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.confirmPassword')" v-model="register.confirm_password">
                                        <button class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer" @click="makeRegister">{{ t('auth.registerButton') }}</button>
                                        <p @click="cadastrando = false" class="text-secundaria cursor-pointer">{{ t('auth.alreadyAccount') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
        </div>
    </main>
</template>

<script setup>
    import Topbar from "../components/Topbar.vue";
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';
    import { useI18n } from 'vue-i18n';
    import axios from 'axios';
    
    const router = useRouter();
    const { t } = useI18n();

    const cadastrando = ref(false);

    const loadingLogin = ref(false);
    const leaving = ref(false);

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


    const login = ref({
        email: '',
        password: ''
    })

    const makeLogin = async() => {

        loadingLogin.value = true;

        try{
            const response = await axios.post('/login', login.value);
            console.log(response.data)

            leaving.value = true;
            setTimeout(() => {
                router.push('/');
            }, 1000);
        } catch (error){
            loadingLogin.value = false;

            console.log(error);
        }

    }


</script>