<template>
    <div class="flex justify-center flex-col mt-[20px]">
        <h2 class="font-bold text-[18px]">Hard Skills</h2>
            <p class="my-[10px]">Hard skills são habilidades técnicas e conhecimentos específicos.</p>
        <!--
        <div class="flex justify-evenly">
            <p class="cursor-pointer" :class="{'font-bold underline': selectedSkill === 'hard'}" @click="selectedSkill = 'hard'">Hard Skills</p>
            <p class="cursor-pointer" :class="{'font-bold underline': selectedSkill === 'soft'}" @click="selectedSkill = 'soft'">Soft Skills</p>
        </div>
        <p class="py-[15px]">
            {{ selectedSkill === 'hard'
                ? 'Hard skills são habilidades técnicas e conhecimentos específicos.'
                : 'Soft skills são habilidades interpessoais e comportamentais.'
            }}
        </p> 
        -->
        
        <div class="flex flex-col" v-if="selectedSkill === 'hard'" >
            <input v-model="hardSkill1" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: JavaScript" type="text">
            <input v-model="hardSkill2" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Excel" type="text">
            <input v-model="hardSkill3" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Edição de vídeo" type="text">
            <input v-model="hardSkill4" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Inglês fluente" type="text">
            <input v-model="hardSkill5" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Operador de Empilhadeira" type="text" v-for="(hardSkill, index) in hardSkills" :key="index">
         <!--  <button :disabled="hardSkills.length > 2" @click="adicionarHard" class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px] disabled:opacity-50 disabled:cursor-not-allowed">+ Adicionar mais </button> --> 
        </div>
        <!--
        <div class="flex flex-col" v-else>
            <input v-model="softSkill1" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Comunicação" type="text">
            <input v-model="softSkill2" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Trabalho em equipe" type="text">
            <input v-model="softSkill3" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Pensamento crítico" type="text">
            <input v-model="softSkill4" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Liderança" type="text">
            <input v-model="softSkill5" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60" placeholder="Ex: Empatia" type="text" v-for="(softSkill, index) in softSkills" :key="index">
        -->
          <!-- <button :disabled="softSkills.length > 2" @click="adicionarSoft" class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px] disabled:opacity-50 disabled:cursor-not-allowed">+ Adicionar mais </button> --> 
        
    </div>
</template>

<script setup>
import {ref} from 'vue'
import { toRefs } from 'vue'

const props = defineProps({
    modelValue: {
        type: Object,
        required: true
    }
})

const { hardSkill1, hardSkill2, hardSkill3, hardSkill4, hardSkill5, softSkill1, softSkill2, softSkill3, softSkill4, softSkill5} = toRefs(props.modelValue)

const selectedSkill = ref('hard')
const hardSkills = ref([''])
const softSkills = ref([''])

function adicionarHard() {
    if(hardSkills.value.length < 3){
        hardSkills.value.push('')
    }
}

function adicionarSoft(){
    if(softSkills.value.length < 3){
        softSkills.value.push('')
    }
}


</script>