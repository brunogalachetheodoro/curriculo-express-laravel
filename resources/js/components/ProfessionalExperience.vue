<template>
  <div class="flex justify-center flex-col mt-[50px]">
    <h2 class="font-bold text-[18px]">Experiência Profisional</h2>
    <div class="flex justify-center flex-col mt-[20px]">
      <input
        v-model="company1"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Empresa"
        type="text"
      />
      <input
        v-model="position1"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Cargo"
        type="text"
      />
      <input
        v-model="start1"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Inicio"
        type="text"
      />
      <input
        v-model="end1"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Fim (ou Atual)"
        type="text"
      />
      <input
        v-model="responsibilities1"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Responsabilidades"
        type="text"
      />
    </div>
    <div v-if="showSecondExperience" class="flex justify-center flex-col mt-[50px]">
      <input
        v-model="company2"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Empresa"
        type="text"
      />
      <input
        v-model="position2"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Cargo"
        type="text"
      />
      <input
        v-model="start2"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Inicio"
        type="text"
      />
      <input
        v-model="end2"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Fim (ou Atual)"
        type="text"
      />
      <input
        v-model="responsibilities2"
        class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
        placeholder="Responsabilidades"
        type="text"
      />
    </div>
    <button class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px] disabled:opacity-50 disabled:cursor-not-allowed"
      @click="showSecondExperience = true"
      v-if="!showSecondExperience">
      Adicionar nova experiência
    </button>
  </div>
</template>

<script setup>
import { toRefs } from 'vue'
import { ref } from 'vue'

const showSecondExperience = ref(false)

const props = defineProps({
  modelValue: {
    type: Object,
    required: true
  }
})

const { company1, position1, start1, end1, responsibilities1, company2, position2, start2, end2, responsibilities2} = toRefs(props.modelValue)
</script>
