<template>
    <div ref="formContainer">
        <!-- Dados Pessoais -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">{{ t('curriculum.personalData') }}</h2>

            <input
                v-model="curriculum.name"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.name')"
                type="text"
            />

            <input
                v-model="curriculum.job_title"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.jobTitle')"
                type="text"
            />

            <input
                v-model="curriculum.phone"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.phone')"
                type="text"
            />

            <input
                v-model="curriculum.email"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.email')"
                type="email"
            />

            <input
                v-model="curriculum.location"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.location')"
                type="text"
            />
        </div>

        <!-- Links -->
        <div class="flex flex-col my-[5px] mt-[20px]">
            <h2 class="text-[18px] my-[5px] font-bold">
                {{ t('curriculum.importantLinks') }}
            </h2>

            <p class="my-[5px] text-[14px]">
                {{ t('curriculum.importantLinksDescription') }}
            </p>

            <!-- Link 1 -->
            <div class="flex w-full gap-4 my-[10px]">
                <input
                    v-model="curriculum.link_name"
                    type="text"
                    :placeholder="t('curriculum.enterName')"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link"
                    type="url"
                    :placeholder="t('curriculum.enterLink')"
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
                    :placeholder="t('curriculum.enterName')"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link_2"
                    type="url"
                    :placeholder="t('curriculum.enterLink')"
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
                    :placeholder="t('curriculum.enterName')"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />

                <input
                    v-model="curriculum.link_3"
                    type="url"
                    :placeholder="t('curriculum.enterLink')"
                    class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
                />
            </div>

            <button
                v-if="visibleLinks < 3"
                @click="addLink"
                class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px]"
            >
                {{ t('curriculum.addMoreLinks') }}
            </button>
        </div>

        <!-- Hard Skills -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">{{ t('curriculum.hardSkills') }}</h2>

            <p class="my-[10px]">
                {{ t('curriculum.hardSkillsDescription') }}
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
                {{ t('curriculum.objectiveAbout') }}
            </h2>

            <p class="mb-[20px]">
                {{ t('curriculum.objectiveAboutDescription') }}
            </p>

            <textarea
                v-model="curriculum.about"
                class="pl-[10px] bg-secundaria border border-primaria placeholder-primaria rounded h-[200px] placeholder-opacity-60"
                :placeholder="t('curriculum.writeAbout')"
            ></textarea>
        </div>

        <!-- Experiência Profissional -->
        <div class="flex justify-center flex-col mt-[50px]">
            <h2 class="font-bold text-[18px]">
                {{ t('curriculum.professionalExperience') }}
            </h2>

            <!-- Experience 1 -->
            <div class="flex justify-center flex-col mt-[20px]">
                <input
                    v-model="curriculum.company"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.company')"
                    type="text"
                />

                <input
                    v-model="curriculum.position"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.position')"
                    type="text"
                />

                <input
                    v-model="curriculum.start_date"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.start')"
                    type="text"
                />

                <input
                    v-model="curriculum.end_date"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.end')"
                    type="text"
                />

                <input
                    v-model="curriculum.responsibilities"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.responsibilities')"
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
                    :placeholder="t('curriculum.company')"
                    type="text"
                />

                <input
                    v-model="curriculum.position_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.position')"
                    type="text"
                />

                <input
                    v-model="curriculum.start_date_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.start')"
                    type="text"
                />

                <input
                    v-model="curriculum.end_date_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.end')"
                    type="text"
                />

                <input
                    v-model="curriculum.responsibilities_2"
                    class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                    :placeholder="t('curriculum.responsibilities')"
                    type="text"
                />
            </div>

            <button
                v-if="visibleExperiences < 2"
                @click="addExperience"
                class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px]"
            >
                {{ t('curriculum.addExperience') }}
            </button>
        </div>

        <!-- Formação -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">
                {{ t('curriculum.education') }}
            </h2>

            <input
                v-model="curriculum.course_name"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.courseName')"
                type="text"
            />

            <input
                v-model="curriculum.education_institution"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.educationInstitution')"
                type="text"
            />

            <input
                v-model="curriculum.education_start_year"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.educationStartYear')"
                type="text"
            />

            <input
                v-model="curriculum.education_end_year"
                class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
                :placeholder="t('curriculum.educationEndYear')"
                type="text"
            />
        </div>

        <!-- Informações Complementares -->
        <div class="flex justify-center flex-col mt-[20px]">
            <h2 class="font-bold text-[18px]">
                {{ t('curriculum.additionalInformation') }}
            </h2>

            <p class="my-[10px]">
                {{ t('curriculum.additionalInformationDescription') }}
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
import { ref, watch, onMounted, computed } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';

const formContainer = ref(null);

const { t } = useI18n();

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

    const fields = formContainer.value.querySelectorAll('input, textarea, h2, p, button');

    fields.forEach((field, index) => {
        field.classList.add('field-enter');
        field.style.animationDelay = `${index * 100}ms`;
    });
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


const hardSkillPlaceholders = computed(() => [
    t('curriculum.hardSkillExamples.1'),
    t('curriculum.hardSkillExamples.2'),
    t('curriculum.hardSkillExamples.3'),
    t('curriculum.hardSkillExamples.4'),
    t('curriculum.hardSkillExamples.5')
]);

const additionalInfoPlaceholders = computed(() => [
    t('curriculum.additionalInfoExamples.1'),
    t('curriculum.additionalInfoExamples.2'),
    t('curriculum.additionalInfoExamples.3'),
    t('curriculum.additionalInfoExamples.4'),
    t('curriculum.additionalInfoExamples.5')
]);

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

<style scoped>
@keyframes field-enter {
    from {
        opacity: 0;
        transform: translateX(-20px);
        filter: blur(4px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
        filter: blur(0);
    }
}

.field-enter {
    opacity: 0;
    animation: field-enter 300ms ease-out forwards;
}
</style>