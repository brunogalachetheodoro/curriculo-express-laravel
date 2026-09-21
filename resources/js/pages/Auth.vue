<template>
    <Topbar />
    <main class="bg-secundaria min-h-screen w-full text-primaria text-center flex flex-col justify-center items-center">        
        <div class="w-full flex flex-col justify-center items-center transition-all duration-1000 ease-in-out"     :class="[leaving ? 'opacity-0 scale-95 blur-[3px]' : entering ? 'opacity-0 scale-95 blur-[3px]' : 'opacity-100 scale-100 blur-0']">
                <div class="w-full overflow-hidden">
                    <div class="flex justify-center items-center w-[200%] transition-transform duration-1000 ease-in-out" :class="cadastrando ? '-translate-x-1/2' : 'translate-x-0'">
                        <div class="w-1/2 shrink-0 flex justify-center">
                            <div class="w-full max-w-[600px] flex justify-center items-start">
                                <div class="bg-primaria rounded-[20px] p-5 py-12 lg:p-6 lg:py-12 w-[90%] lg:w-[80%]">
                                    <form @submit.prevent="makeLogin" novalidate class="flex flex-col justify-center items-center">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" :placeholder="t('auth.email')" v-model="login.email">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.password')" v-model="login.password">
                                        <p v-if="loginError" class="text-red-500 text-sm my-[5px]">
                                            {{ loginError }}
                                        </p>
                                        
                                        <button v-if="!loadingLogin" type="submit" class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer">
                                            {{ t('auth.loginButton') }}
                                        </button>

                                        <div v-else class="my-[15px] w-[50%] p-[5px] lg:p-[8px] flex justify-center items-center text-secundaria">
                                            <span class="loader"></span>
                                        </div>
                                        <p @click="cadastrando = true" class="text-secundaria cursor-pointer">{{ t('auth.noAccount') }}</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 shrink-0 flex justify-center">
                            <div class="w-full max-w-[600px] flex justify-center items-start">
                                <div class="bg-primaria rounded-[20px] p-5 py-12 lg:p-6 lg:py-12 w-[90%] lg:w-[80%]">
                                    <form @submit.prevent="makeRegister" novalidate class="flex flex-col justify-center items-center">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="text" :placeholder="t('auth.name')" v-model="register.name">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="email" :placeholder="t('auth.email')" v-model="register.email">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.password')" v-model="register.password">
                                        <input class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] w-[90%] p-[5px] lg:p-[8px] lg:w-[75%] placeholder-opacity-60" type="password" :placeholder="t('auth.confirmPassword')" v-model="register.confirm_password">
                                        <p v-if="registerError" class="text-red-500 text-sm my-[5px]">
                                            {{ registerError }}
                                        </p>
                                        
                                        <button v-if="!loadingRegister" type="submit" class="bg-primaria hover:bg-secundaria border-2 border-secundaria rounded-[20px] my-[10px] w-[50%] p-[5px] lg:p-[8px] text-secundaria hover:text-primaria font-semibold transition-colors duration-1000 cursor-pointer">
                                            {{ t('auth.registerButton') }}
                                        </button>

                                        <div v-else class="my-[15px] w-[50%] p-[5px] lg:p-[8px] flex justify-center items-center text-secundaria">
                                            <span class="loader"></span>
                                        </div>
                                        <p @click="cadastrando = false" class="text-secundaria cursor-pointer">{{ t('auth.alreadyAccount') }}</p>
                                    </form>
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
    import { ref, onMounted } from 'vue';
    import { useRouter } from 'vue-router';
    import { useI18n } from 'vue-i18n';
    import axios from 'axios';
    
    const router = useRouter();
    const { t } = useI18n();

    const cadastrando = ref(false);

    const loadingLogin = ref(false);
    const loadingRegister = ref(false);

    const loginError = ref('');
    const registerError = ref('');

    const leaving = ref(false);
    const entering = ref(true);

    onMounted(() => {
        setTimeout(() => {
            entering.value = false;
        }, 100);
    });

    const register = ref({
        name: '',
        email:'',
        password:'',
        confirm_password:''
    })

    const hasEmptyFields = (data) => {
        return Object.values(data).some(value => !value.trim());
    }

    const hasInvalidEmail = (email) => {
        return !email.includes('@');
    }

    const makeRegister = async() => {
        registerError.value = '';

        if (hasEmptyFields(register.value)) {
            registerError.value = t('auth.emptyFields');
            return;
        }

        if (hasInvalidEmail(register.value.email)) {
            registerError.value = t('auth.invalidEmail');
            return;
        }

        loadingRegister.value = true;

        try {
            const response = await axios.post('/register', register.value);
            console.log(response.data)

            leaving.value = true;

            setTimeout(() => {
                router.push('/');
            }, 1000);
         } catch (error) {
            loadingRegister.value = false;

            const code = error.response?.data?.code;

            if (code === 'name_required') {
                registerError.value = t('auth.nameRequired');
                return;
            }

            if (code === 'email_required') {
                registerError.value = t('auth.emailRequired');
                return;
            }

            if (code === 'invalid_email') {
                registerError.value = t('auth.invalidEmail');
                return;
            }

            if (code === 'email_exists') {
                registerError.value = t('auth.emailExists');
                return;
            }

            if (code === 'password_required') {
                registerError.value = t('auth.passwordRequired');
                return;
            }

            if (code === 'password_min') {
                registerError.value = t('auth.passwordMin');
                return;
            }

            if (code === 'password_confirmation_required') {
                registerError.value = t('auth.passwordConfirmationRequired');
                return;
            }

            if (code === 'password_confirmation') {
                registerError.value = t('auth.passwordConfirmation');
                return;
            }

            registerError.value = t('auth.validationError');
        }
    }


    const login = ref({
        email: '',
        password: ''
    })

    const makeLogin = async() => {
        loginError.value = '';

        if (hasEmptyFields(login.value)) {
            loginError.value = t('auth.emptyFields');
            return;
        }

        if (hasInvalidEmail(login.value.email)) {
            loginError.value = t('auth.invalidEmail');
            return;
        }

        loadingLogin.value = true;

        try{
            const response = await axios.post('/login', login.value);
            console.log(response.data)

            leaving.value = true;

            setTimeout(() => {
                router.push('/');
            }, 1000);
        } catch (error) {
            loadingLogin.value = false;

            const code = error.response?.data?.code;

            if (code === 'email_not_found') {
                loginError.value = t('auth.emailNotFound');
                return;
            }

            if (code === 'invalid_password') {
                loginError.value = t('auth.invalidPassword');
                return;
            }

            loginError.value = t('auth.validationError');
        }
    }


</script>

<style scoped>
    .loader {
        width: 50px;
        height: 28px;
        --_g: no-repeat radial-gradient(farthest-side, currentColor 94%, #0000);
        background:
            var(--_g) 50% 0,
            var(--_g) 100% 0;
        background-size: 12px 12px;
        position: relative;
        animation: l23-0 1.5s linear infinite;
    }

    .loader::before {
        content: "";
        position: absolute;
        height: 12px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: currentColor;
        left: 0;
        top: 0;
        animation:
            l23-1 1.5s linear infinite,
            l23-2 0.5s cubic-bezier(0, 200, 0.8, 200) infinite;
    }

    @keyframes l23-0 {
        0%, 31% {
            background-position: 50% 0, 100% 0;
        }

        33% {
            background-position: 50% 100%, 100% 0;
        }

        43%, 64% {
            background-position: 50% 0, 100% 0;
        }

        66% {
            background-position: 50% 0, 100% 100%;
        }

        79% {
            background-position: 50% 0, 100% 0;
        }

        100% {
            transform: translateX(calc(-100% / 3));
        }
    }

    @keyframes l23-1 {
        100% {
            left: calc(100% + 7px);
        }
    }

    @keyframes l23-2 {
        100% {
            top: -0.1px;
        }
    }
</style>