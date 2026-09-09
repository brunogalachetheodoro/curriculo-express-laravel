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
                v-model="curriculum.position"
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

            <div
                v-for="(link, index) in curriculum.links"
                :key="index"
                class="flex w-full gap-4 my-[10px]"
            >
                <input
                    v-model="link.name"
                    type="text"
                    placeholder="Insira um nome"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="link.url"
                    type="url"
                    placeholder="Insira um link"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />
            </div>

            <button
                @click="adicionarLink"
                :disabled="curriculum.links.length >= 3"
                class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px] disabled:opacity-50 disabled:cursor-not-allowed"
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
                    v-for="(skill, index) in curriculum.hardSkills"
                    :key="index"
                    v-model="curriculum.hardSkills[index]"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="hardSkillPlaceholders[index]"
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

            <div
                v-for="(experience, index) in curriculum.experiences"
                :key="index"
                class="flex justify-center flex-col mt-[20px]"
            >
                <input
                    v-model="experience.company"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Empresa"
                    type="text"
                />

                <input
                    v-model="experience.position"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Cargo"
                    type="text"
                />

                <input
                    v-model="experience.start"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Início"
                    type="text"
                />

                <input
                    v-model="experience.end"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Fim (ou Atual)"
                    type="text"
                />

                <input
                    v-model="experience.responsibilities"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    placeholder="Responsabilidades"
                    type="text"
                />
            </div>

            <button
                v-if="curriculum.experiences.length < 2"
                @click="adicionarExperiencia"
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
                v-model="curriculum.education.degree"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Nome do Curso (ex: Engenharia Civil)"
                type="text"
            />

            <input
                v-model="curriculum.education.institution"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Instituição de Ensino"
                type="text"
            />

            <input
                v-model="curriculum.education.startYear"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                placeholder="Ano de Início"
                type="text"
            />

            <input
                v-model="curriculum.education.finishYear"
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
                v-for="(info, index) in curriculum.additionalInfo"
                :key="index"
                v-model="curriculum.additionalInfo[index]"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="additionalInfoPlaceholders[index]"
                type="text"
            />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const curriculum = ref({
    name: '',
    position: '',
    phone: '',
    email: '',
    location: '',

    links: [
        {
            name: '',
            url: ''
        }
    ],

    hardSkills: [
        '',
        '',
        '',
        '',
        ''
    ],

    about: '',

    experiences: [
        {
            company: '',
            position: '',
            start: '',
            end: '',
            responsibilities: ''
        }
    ],

    education: {
        degree: '',
        institution: '',
        startYear: '',
        finishYear: ''
    },

    additionalInfo: [
        '',
        '',
        '',
        '',
        ''
    ]
});

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

const adicionarLink = () => {
    if (curriculum.value.links.length < 3) {
        curriculum.value.links.push({
            name: '',
            url: ''
        });
    }
};

const adicionarExperiencia = () => {
    if (curriculum.value.experiences.length < 2) {
        curriculum.value.experiences.push({
            company: '',
            position: '',
            start: '',
            end: '',
            responsibilities: ''
        });
    }
};
</script>