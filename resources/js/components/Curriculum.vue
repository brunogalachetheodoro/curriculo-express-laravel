<template>
  <div
    ref="pdfRef"
    class="flex flex-col m-[15px] md:m-[50px]"
    :style="{ fontSize: baseSizeProp + 'px' }"
  >
    <!-- Dados Pessoais -->
    <p class="font-bold" :style="{ fontSize: 1.3 * baseSizeProp + 'px' }">
      {{ curriculum?.name || '' }}
    </p>
    <p class="font-semibold" :style="{ fontSize: 1.1 * baseSizeProp + 'px' }">
      {{ curriculum?.position || '' }}
    </p>

    <!-- Hard Skills -->
    <div class="flex w-full mb-[10px] md:mb-[30px]">
      <p>{{ curriculum?.hardSkill1 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hardSkill2 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hardSkill3 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hardSkill4 || '' }}</p>
      <p class="ml-[10px] md:ml-[20px]">{{ curriculum?.hardSkill5 || '' }}</p>
    </div>

    <!-- Contato -->
    <div class="flex mb-[10px] md:mb-[30px]">
      <p>{{ curriculum?.phone || '' }}</p>
      <p class="ml-[30px]">{{ curriculum?.email || '' }}</p>
      <p class="ml-[30px]">{{ curriculum?.location || '' }}</p>
    </div>

    <!-- Links -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSizeProp + 'px' }">Links Importantes</h2>
      <div class="flex mt-[20px]">
        <a :href="curriculum?.links[0]?.url">
          <p><span v-if="curriculum?.links[0]">🔗 </span>{{ curriculum?.links[0]?.name || '' }}</p>
        </a>
      </div>
      <div class="flex mt-[10px]">
        <a :href="curriculum?.links[1]?.url">
          <p><span v-if="curriculum?.links[1]">🔗 </span>{{ curriculum?.links[1]?.name || '' }}</p>
        </a>
      </div>
      <div class="flex mt-[10px]">
        <a :href="curriculum?.links[2]?.url">
          <p><span v-if="curriculum?.links[2]">🔗 </span>{{ curriculum?.links[2]?.name || '' }}</p>
        </a>
      </div>
    </div>

    <!-- Sobre -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSizeProp + 'px' }">Sobre</h2>
      <p>{{ curriculum?.about || '' }}</p>
    </div>

    <!-- Educação -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSizeProp + 'px' }">Educação</h2>
      <p>{{ curriculum?.degree || '' }}</p>
      <p>{{ curriculum?.institution || '' }}</p>
      <div class="flex">
        <p class="mr-[10px]">{{ curriculum?.startYear || '' }}</p> - 
        <p class="ml-[10px]">{{ curriculum?.finishYear || '' }}</p>
      </div>
    </div>

    <!-- Experiências -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSizeProp + 'px' }">Experiência Profissional</h2>

      <div class="mt-[10px]">
        <p class="font-bold">{{ curriculum?.position1 || '' }}</p>
        <p>{{ curriculum?.company1 || '' }}</p>
        <div class="flex">
          <p class="flex">
            {{ curriculum?.start1 || '' }}
            <span v-if="curriculum?.end1 || '' != ''" class="ml-[10px]"> - {{ curriculum?.end1 || '' }}</span>
          </p>
        </div>
        <p>{{ curriculum?.responsibilities1 || '' }}</p>
      </div>

      <div class="mt-[30px]">
        <p class="font-bold">{{ curriculum?.position2 || '' }}</p>
        <p>{{ curriculum?.company2 || '' }}</p>
        <div class="flex">
          <p class="flex">
            {{ curriculum?.start2 || '' }}
            <span v-if="curriculum?.end2 || '' != ''"> - {{ curriculum?.end2 || '' }}</span>
          </p>
        </div>
        <p>{{ curriculum?.responsibilities2 || '' }}</p>
      </div>
    </div>

    <!-- Informações Complementares -->
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSizeProp + 'px' }">Informações Complementares</h2>
      <ul>
        <li v-if="curriculum?.add1" class="mt-[10px]">{{ curriculum?.add1 || '' }}</li>
        <li v-if="curriculum?.add2" class="mt-[10px]">{{ curriculum?.add2 || '' }}</li>
        <li v-if="curriculum?.add3" class="mt-[10px]">{{ curriculum?.add3 || '' }}</li>
        <li v-if="curriculum?.add4" class="mt-[10px]">{{ curriculum?.add4 || '' }}</li>
        <li v-if="curriculum?.add5" class="mt-[10px]">{{ curriculum?.add5 || '' }}</li>
      </ul>
    </div>

    <!-- Soft Skills -->
    <!--
    <div class="mb-[10px] md:mb-[30px]">
      <h2 class="font-bold" :style="{ fontSize: 1.2 * baseSize + 'px' }">Soft Skills</h2>
      <p>{{ curriculum?.softSkill1 || '' }}</p>
      <p>{{ curriculum?.softSkill2 || '' }}</p>
      <p>{{ curriculum?.softSkill3 || '' }}</p>
      <p>{{ curriculum?.softSkill4 || '' }}</p>
      <p>{{ curriculum?.softSkill5 || '' }}</p>
    </div>
    -->
    
  </div>
</template>

<script setup>
import { ref, onMounted, toRef } from "vue"

</script>

<style scoped>
a {
  color: #0a66c2;
  text-decoration: underline;
}
</style>
