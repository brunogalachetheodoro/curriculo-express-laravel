<template>
  <div v-if="curriculum" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 text-left text-black">
    <div class="bg-white rounded-2xl shadow-lg max-w-3xl w-full max-h-[90vh] overflow-y-auto p-6 relative">
      <div class="flex flex-col m-[15px] md:m-[50px]">

        <button
          @click="$emit('close')"
          class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl"
        >
          ✕
        </button>

        <!-- Dados Pessoais -->
        <p
          class="font-bold"
          :style="{ fontSize: `calc(18px * ${fontSizeMultiplier})` }"
        >
          {{ curriculum.name }}
        </p>

        <p
          class="font-semibold"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          {{ curriculum.job_title }}
        </p>

        <!-- Hard Skills -->
        <div
          class="flex w-full mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(10px * ${fontSizeMultiplier})` }"
        >
          <p>{{ curriculum.hard_skill_1 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hard_skill_2 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hard_skill_3 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hard_skill_4 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hard_skill_5 }}</p>
        </div>

        <!-- Contato -->
        <div
          class="flex mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <p>{{ curriculum.phone }}</p>
          <p class="ml-[30px]">{{ curriculum.email }}</p>
          <p class="ml-[30px]">{{ curriculum.location }}</p>
        </div>

        <!-- Links -->
        <div
          class="mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <h2
            class="font-bold"
            :style="{ fontSize: `calc(16px * ${fontSizeMultiplier})` }"
          >
            Links Importantes
          </h2>

          <div class="flex" v-if="curriculum.link_name">
            <p>{{ curriculum.link_name }}</p>
          </div>

          <div class="flex" v-if="curriculum.link_name_2">
            <p>{{ curriculum.link_name_2 }}</p>
          </div>

          <div class="flex" v-if="curriculum.link_name_3">
            <p>{{ curriculum.link_name_3 }}</p>
          </div>
        </div>

        <!-- Sobre -->
        <div
          class="mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <h2
            class="font-bold"
            :style="{ fontSize: `calc(16px * ${fontSizeMultiplier})` }"
          >
            Sobre
          </h2>

          <p>{{ curriculum.about }}</p>
        </div>

        <!-- Educação -->
        <div
          class="mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <h2
            class="font-bold"
            :style="{ fontSize: `calc(16px * ${fontSizeMultiplier})` }"
          >
            Educação
          </h2>

          <p>{{ curriculum.course_name }}</p>

          <p>{{ curriculum.education_institution }}</p>

          <div class="flex">
            <p class="mr-[10px]">
              {{ curriculum.education_start_year }}
            </p>

            -

            <p class="ml-[10px]">
              {{ curriculum.education_end_year }}
            </p>
          </div>
        </div>

        <!-- Experiências -->
        <div
          class="mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <h2
            class="font-bold"
            :style="{ fontSize: `calc(16px * ${fontSizeMultiplier})` }"
          >
            Experiência Profissional
          </h2>

          <!-- Experiência 1 -->
          <div class="mt-[10px]">
            <p class="font-bold">
              {{ curriculum.position }}
            </p>

            <p>
              {{ curriculum.company }}
            </p>

            <div class="flex">
              <p class="flex">
                {{ curriculum.start_date }}

                <span
                  v-if="curriculum.end_date"
                  class="ml-[10px]"
                >
                  - {{ curriculum.end_date }}
                </span>
              </p>
            </div>

            <p>
              {{ curriculum.responsibilities }}
            </p>
          </div>

          <!-- Experiência 2 -->
          <div
            v-if="curriculum.company_2 || curriculum.position_2"
            class="mt-[30px]"
          >
            <p class="font-bold">
              {{ curriculum.position_2 }}
            </p>

            <p>
              {{ curriculum.company_2 }}
            </p>

            <div class="flex">
              <p class="flex">
                {{ curriculum.start_date_2 }}

                <span
                  v-if="curriculum.end_date_2"
                  class="ml-[10px]"
                >
                  - {{ curriculum.end_date_2 }}
                </span>
              </p>
            </div>

            <p>
              {{ curriculum.responsibilities_2 }}
            </p>
          </div>
        </div>

        <!-- Informações Complementares -->
        <div
          class="mb-[10px] md:mb-[30px]"
          :style="{ fontSize: `calc(12px * ${fontSizeMultiplier})` }"
        >
          <h2
            class="font-bold"
            :style="{ fontSize: `calc(16px * ${fontSizeMultiplier})` }"
          >
            Informações Complementares
          </h2>

          <ul class="list-disc ml-[20px]">
            <li v-if="curriculum.info_1" class="mt-[10px]">
              {{ curriculum.info_1 }}
            </li>

            <li v-if="curriculum.info_2" class="mt-[10px]">
              {{ curriculum.info_2 }}
            </li>

            <li v-if="curriculum.info_3" class="mt-[10px]">
              {{ curriculum.info_3 }}
            </li>

            <li v-if="curriculum.info_4" class="mt-[10px]">
              {{ curriculum.info_4 }}
            </li>

            <li v-if="curriculum.info_5" class="mt-[10px]">
              {{ curriculum.info_5 }}
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  curriculum: {
    type: Object,
    required: true,
  },
})

const fontSizeMultiplier = computed(() => {
  return Number(props.curriculum?.font_size) || 1
})
</script>