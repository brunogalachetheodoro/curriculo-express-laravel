<template>
    <div class="flex flex-col my-[5px] mt-[20px]">
        <h2 class="text-[18px] my-[5px] font-bold">Objetivo/ Sobre</h2>
        <p class="mb-[20px]">    Descreva aqui seu objetivo profissional ou fale um pouco sobre você, suas experiências e metas.</p>
        <!-- Aplicar depois
        <p class="my-[5px] text-[14px]">Você pode inserir palavras chaves e seu objetivo será gerado por IA</p>
                <div class="flex justify-center items-center">
                <p>Gerar por IA</p>
                <div class="border border-primaria w-[50px] h-[30px] rounded-[20px] flex items-center pl-[3px] m-[20px] cursor-pointer" @click="toggleSelected">
                    <div class="bg-primaria h-[20px] w-[20px] rounded-full transform transition-transform duration-300" :class="selected === 'ai' ? 'translate-x-0': 'translate-x-[22px]'"></div>
                </div>
                <p>Escrever sozinho</p>
            </div>
            
            <div v-if ="selected === 'ai'" class="flex flex-col">
                <input type="text" placeholder="Área de Atuação (ex: Vendas, Design)" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <input type="text" placeholder="Segmento (ex: Tecnologia, Saúde)" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <input type="text" placeholder="Principais Atividades (ex: Organização de estoque) " class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <input type="text" placeholder="Resultados Relevantes (ex: Aumento de vendas)" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <input type="text" placeholder="Objetivo profissional (ex: Crescer na área x)" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <input type="text" placeholder="Valor que deseja gerar (ex: Resultados consistentes)" class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder:text-[12px]">
                <button class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px]">GERAR</button>
            </div>
            -->
            <textarea v-model="about" class="pl-[10px] bg-secundaria border border-primaria placeholder-primaria rounded h-[200px] placeholder-opacity-60" type="text" name="" id="" placeholder="Escreva sobre..." ></textarea>
    </div>

</template>

<script setup>
import {ref, toRefs} from 'vue'
    const selected = ref('ai')

    function toggleSelected(){
        selected.value = selected.value === 'ai' ? 'manual' : 'ai'
    }

    const props = defineProps({
    modelValue: {
        type: Object,
        required: true
    }
    })

    const { about } = toRefs(props.modelValue)
</script>