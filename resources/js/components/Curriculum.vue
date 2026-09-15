<template>
  <div
    ref="pdfRef"
    class="flex flex-col m-[15px] md:m-[50px]"
    :style="{ fontSize: baseSizeProp * fontSizeMultiplier + 'px' }"
  >
    <!-- Dados Pessoais -->
    <p
      class="font-bold"
      :style="{ fontSize: 1.3 * baseSizeProp * fontSizeMultiplier + 'px' }"
    >
      {{ curriculum?.name || '' }}
    </p>

    <p
      class="font-semibold"
      :style="{ fontSize: 1.1 * baseSizeProp * fontSizeMultiplier + 'px' }"
    >
      {{ curriculum?.job_title || '' }}
    </p>

    <!-- Hard Skills -->
    <div class="flex w-full mb-[10px] md:mb-[30px]">
      <p>{{ curriculum?.hard_skill_1 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hard_skill_2 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hard_skill_3 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hard_skill_4 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hard_skill_5 || '' }}</p>
    </div>

    <!-- Contato -->
    <div class="flex mb-[10px] md:mb-[30px]">
      <p>{{ curriculum?.phone || '' }}</p>
      <p class="ml-[30px]">{{ curriculum?.email || '' }}</p>
      <p class="ml-[30px]">{{ curriculum?.location || '' }}</p>
    </div>

    <!-- Links -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2
        class="font-bold"
        :style="{ fontSize: 1.2 * baseSizeProp * fontSizeMultiplier + 'px' }"
      >
        Links Importantes
      </h2>

      <div v-if="curriculum?.link_name" class="flex mt-[20px]">
        <a :href="curriculum?.link" target="_blank">
          <p>
            <span v-if="curriculum?.link">🔗 </span>
            {{ curriculum?.link_name || '' }}
          </p>
        </a>
      </div>

      <div v-if="curriculum?.link_name_2" class="flex mt-[10px]">
        <a :href="curriculum?.link_2" target="_blank">
          <p>
            <span v-if="curriculum?.link_2">🔗 </span>
            {{ curriculum?.link_name_2 || '' }}
          </p>
        </a>
      </div>

      <div v-if="curriculum?.link_name_3" class="flex mt-[10px]">
        <a :href="curriculum?.link_3" target="_blank">
          <p>
            <span v-if="curriculum?.link_3">🔗 </span>
            {{ curriculum?.link_name_3 || '' }}
          </p>
        </a>
      </div>
    </div>

    <!-- Sobre -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2
        class="font-bold"
        :style="{ fontSize: 1.2 * baseSizeProp * fontSizeMultiplier + 'px' }"
      >
        Sobre
      </h2>

      <p>{{ curriculum?.about || '' }}</p>
    </div>

    <!-- Educação -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2
        class="font-bold"
        :style="{ fontSize: 1.2 * baseSizeProp * fontSizeMultiplier + 'px' }"
      >
        Educação
      </h2>

      <p>{{ curriculum?.course_name || '' }}</p>
      <p>{{ curriculum?.education_institution || '' }}</p>

      <div class="flex">
        <p class="mr-[10px]">
          {{ curriculum?.education_start_year || '' }}
        </p>

        -

        <p class="ml-[10px]">
          {{ curriculum?.education_end_year || '' }}
        </p>
      </div>
    </div>

    <!-- Experiências -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2
        class="font-bold"
        :style="{ fontSize: 1.2 * baseSizeProp * fontSizeMultiplier + 'px' }"
      >
        Experiência Profissional
      </h2>

      <!-- Experiência 1 -->
      <div class="mt-[10px]">
        <p class="font-bold">
          {{ curriculum?.position || '' }}
        </p>

        <p>
          {{ curriculum?.company || '' }}
        </p>

        <div class="flex">
          <p class="flex">
            {{ curriculum?.start_date || '' }}

            <span
              v-if="curriculum?.end_date"
              class="ml-[10px]"
            >
              - {{ curriculum?.end_date }}
            </span>
          </p>
        </div>

        <p>
          {{ curriculum?.responsibilities || '' }}
        </p>
      </div>

      <!-- Experiência 2 -->
      <div
        v-if="curriculum?.company_2 || curriculum?.position_2"
        class="mt-[30px]"
      >
        <p class="font-bold">
          {{ curriculum?.position_2 || '' }}
        </p>

        <p>
          {{ curriculum?.company_2 || '' }}
        </p>

        <div class="flex">
          <p class="flex">
            {{ curriculum?.start_date_2 || '' }}

            <span
              v-if="curriculum?.end_date_2"
              class="ml-[10px]"
            >
              - {{ curriculum?.end_date_2 }}
            </span>
          </p>
        </div>

        <p>
          {{ curriculum?.responsibilities_2 || '' }}
        </p>
      </div>
    </div>

    <!-- Informações Complementares -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2
        class="font-bold"
        :style="{ fontSize: 1.2 * baseSizeProp * fontSizeMultiplier + 'px' }"
      >
        Informações Complementares
      </h2>

      <ul>
        <li v-if="curriculum?.info_1" class="mt-[10px]">
          {{ curriculum?.info_1 || '' }}
        </li>

        <li v-if="curriculum?.info_2" class="mt-[10px]">
          {{ curriculum?.info_2 || '' }}
        </li>

        <li v-if="curriculum?.info_3" class="mt-[10px]">
          {{ curriculum?.info_3 || '' }}
        </li>

        <li v-if="curriculum?.info_4" class="mt-[10px]">
          {{ curriculum?.info_4 || '' }}
        </li>

        <li v-if="curriculum?.info_5" class="mt-[10px]">
          {{ curriculum?.info_5 || '' }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue'

const props = defineProps({
  curriculum: {
    type: Object,
    default: null,
  },

  baseSize: {
    type: Number,
    default: 14,
  },
})

const pdfRef = ref(null)

const baseSizeProp = computed(() => {
  return props.baseSize
})

const fontSizeMultiplier = computed(() => {
  return Number(props.curriculum?.font_size) || 1
})
</script>

<style scoped>
a {
  color: #0a66c2;
  text-decoration: underline;
}
</style>