<template>
    <div class="flex justify-center flex-col mt-[20px]">
        <h2 class="font-bold text-[18px]">Formação</h2>
        <input v-model="degree" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Nome do Curso (ex: Engenharia Civil)" type="text">
        <input v-model="institution" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Intituição de Ensino" type="text">
        <input v-model="startYear" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ano de Inicio" type="text">
        <input v-model="finishYear" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ano de Conclusão (ou em andamento)" type="text">
    </div>
</template>

<script setup>
import { toRefs } from 'vue'

const props = defineProps({
  modelValue: {
    type: Object,
    required: true
  }
})

const { degree, institution, startYear, finishYear } = toRefs(props.modelValue)

</script>