<template>
    <div>
        <!-- Dados Pessoais -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">Dados Pessoais</h2>

            <input
                v-model="curriculum.name"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Nome"
                type="text"
            />

            <input
                v-model="curriculum.job_title"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Cargo"
                type="text"
            />

            <input
                v-model="curriculum.phone"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Telefone"
                type="text"
            />

            <input
                v-model="curriculum.email"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Email"
                type="email"
            />

            <input
                v-model="curriculum.location"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Local"
                type="text"
            />
        </div>

        <!-- Links -->
        <div class="flex flex-col my-[5px] mt-[20px]">
            <h2 class="text-[18px] my-[5px] font-bold">
                Links Importantes
            </h2>

            <p class="my-[5px] text-[14px]">
                Links como seu perfil no LinkedIn, portfólio ou o que mais julgar necessário!
            </p>

            <!-- Link 1 -->
            <div class="flex w-full gap-4 my-[10px]">
                <input
                    v-model="curriculum.link_name"
                    type="text"
                    placeholder="Insira um nome"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link"
                    type="url"
                    placeholder="Insira um link"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />
            </div>

            <!-- Link 2 -->
            <div
                v-if="visibleLinks >= 2"
                class="flex w-full gap-4 my-[10px]"
            >
                <input
                    v-model="curriculum.link_name_2"
                    type="text"
                    placeholder="Insira um nome"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link_2"
                    type="url"
                    placeholder="Insira um link"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />
            </div>

            <!-- Link 3 -->
            <div
                v-if="visibleLinks >= 3"
                class="flex w-full gap-4 my-[10px]"
            >
                <input
                    v-model="curriculum.link_name_3"
                    type="text"
                    placeholder="Insira um nome"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link_3"
                    type="url"
                    placeholder="Insira um link"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />
            </div>

            <button
                v-if="visibleLinks < 3"
                @click="addLink"
                class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px]"
            >
                + Adicionar mais links
            </button>
        </div>

        <!-- Hard Skills -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">Hard Skills</h2>

            <p class="my-[10px]">
                Hard skills são habilidades técnicas e conhecimentos específicos.
            </p>

            <div class="flex flex-col">
                <input
                    v-for="index in 5"
                    :key="index"
                    v-model="curriculum[`hard_skill_${index}`]"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="hardSkillPlaceholders[index - 1]"
                    type="text"
                />
            </div>
        </div>

        <!-- Objetivo / Sobre -->
        <div class="flex flex-col my-[5px] mt-[20px]">
            <h2 class="text-[18px] my-[5px] font-bold">
                Objetivo / Sobre
            </h2>

            <p class="mb-[20px]">
                Descreva aqui seu objetivo profissional ou fale um pouco sobre você,
                suas experiências e metas.
            </p>

            <textarea
                v-model="curriculum.about"
                class="pl-[10px] bg-secundaria border border-primaria placeholder-primaria rounded h-[200px] placeholder-opacity-60"
                placeholder="Escreva sobre..."
            ></textarea>
        </div>

        <!-- Experiência Profissional -->
        <div class="flex justify-center flex-col mt-[50px]">
            <h2 class="font-bold text-[18px]">
                Experiência Profissional
            </h2>

            <!-- Experience 1 -->
            <div class="flex justify-center flex-col mt-[20px]">
                <input
                    v-model="curriculum.company"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Empresa"
                    type="text"
                />

                <input
                    v-model="curriculum.position"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Cargo"
                    type="text"
                />

                <input
                    v-model="curriculum.start_date"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Início"
                    type="text"
                />

                <input
                    v-model="curriculum.end_date"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Fim (ou Atual)"
                    type="text"
                />

                <input
                    v-model="curriculum.responsibilities"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Responsabilidades"
                    type="text"
                />
            </div>

            <!-- Experience 2 -->
            <div
                v-if="visibleExperiences >= 2"
                class="flex justify-center flex-col mt-[20px]"
            >
                <input
                    v-model="curriculum.company_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Empresa"
                    type="text"
                />

                <input
                    v-model="curriculum.position_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Cargo"
                    type="text"
                />

                <input
                    v-model="curriculum.start_date_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Início"
                    type="text"
                />

                <input
                    v-model="curriculum.end_date_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Fim (ou Atual)"
                    type="text"
                />

                <input
                    v-model="curriculum.responsibilities_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Responsabilidades"
                    type="text"
                />
            </div>

            <button
                v-if="visibleExperiences < 2"
                @click="addExperience"
                class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px]"
            >
                Adicionar nova experiência
            </button>
        </div>

        <!-- Formação -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">
                Formação
            </h2>

            <input
                v-model="curriculum.course_name"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Nome do Curso (ex: Engenharia Civil)"
                type="text"
            />

            <input
                v-model="curriculum.education_institution"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Instituição de Ensino"
                type="text"
            />

            <input
                v-model="curriculum.education_start_year"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Ano de Início"
                type="text"
            />

            <input
                v-model="curriculum.education_end_year"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Ano de Conclusão (ou em andamento)"
                type="text"
            />
        </div>

        <!-- Informações Complementares -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">
                Informações Complementares
            </h2>

            <p class="my-[10px]">
                Adicione informações como inglês, cursos complementares ou serviços voluntários
            </p>

            <input
                v-for="index in 5"
                :key="index"
                v-model="curriculum[`info_${index}`]"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="additionalInfoPlaceholders[index - 1]"
                type="text"
            />
        </div>
    </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import axios from 'axios';

const curriculum = ref({
    name: '',
    job_title: '',
    phone: '',
    email: '',
    location: '',

    link_name: '',
    link: '',
    link_name_2: '',
    link_2: '',
    link_name_3: '',
    link_3: '',

    hard_skill_1: '',
    hard_skill_2: '',
    hard_skill_3: '',
    hard_skill_4: '',
    hard_skill_5: '',

    about: '',

    company: '',
    position: '',
    start_date: '',
    end_date: '',
    responsibilities: '',

    company_2: '',
    position_2: '',
    start_date_2: '',
    end_date_2: '',
    responsibilities_2: '',

    course_name: '',
    education_institution: '',
    education_start_year: '',
    education_end_year: '',

    info_1: '',
    info_2: '',
    info_3: '',
    info_4: '',
    info_5: '',
});

const loadCurriculum = async () => {
    try {
        const response = await axios.get('/curriculum-fields');

        if (response.data.curriculum) {
            Object.assign(curriculum.value, response.data.curriculum);
        }
    } catch (error) {
        console.log('Error loading curriculum:', error.response?.data);
    }
};

onMounted(() => {
    loadCurriculum();
});

let debounceTimeout;

watch(
    curriculum,
    (newCurriculum)=>{
        clearTimeout(debounceTimeout);

        debounceTimeout = setTimeout(async () => {
            try{
                await axios.put('/curriculum', newCurriculum);
                console.log('Curriculum saved successfully.');
            } catch(error) {
                console.log('error saving curriculum:', error.response?.data);
            }
        }, 1000);
    },
    {deep: true}
)


const hardSkillPlaceholders = [
    'Ex: JavaScript',
    'Ex: Excel',
    'Ex: Edição de vídeo',
    'Ex: Inglês fluente',
    'Ex: Operador de Empilhadeira'
];

const additionalInfoPlaceholders = [
    'Ex: Inglês Avançado',
    'Ex: Curso Online Marketing Digital',
    'Ex: Voluntário na empresa X como Desenvolvedor de Software',
    'Ex: Excel Avançado',
    'Ex: Certificado Node.JS'
];

const visibleLinks = ref(1);

const addLink = () => {
    if (visibleLinks.value < 3) {
        visibleLinks.value++;
    }
};

const visibleExperiences = ref(1);

const addExperience = () => {
    if (visibleExperiences.value < 2) {
        visibleExperiences.value++;
    }
};


</script>