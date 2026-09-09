<template>
  <div class="flex justify-center flex-col mt-[20px]">
    <h2 class="font-bold text-[18px]">Dados Pessoais</h2>

    <input
      v-model="name"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Nome"
      type="text"
    />

    <input
      v-model="position"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Cargo"
      type="text"
    />

    <input
      v-model="phone"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Telefone"
      type="text"
    />

    <input
      v-model="email"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Email"
      type="text"
    />

    <input
      v-model="location"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Local"
      type="text"
    />

        <h2 class="text-[18px] my-[5px] font-bold">Links Importantes</h2>
    <p class="my-[5px] text-[14px]">
        Links como seu perfil no LinkedIn, portfólio ou o que mais julgar necessário!
    </p>

    <div
        v-for="(link, index) in links"
        :key="index"
        class="flex w-full gap-4 my-[10px]"
    >
        <input
        type="text"
        placeholder="Insira um nome"
        class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
        v-model="link.name"
        />
        <input
        type="text"
        placeholder="Insira um link"
        class="bg-secundaria border border-primaria rounded-[8px] placeholder-primaria pl-[10px] p-[5px] flex-1 min-w-0 placeholder-opacity-60"
        v-model="link.url"
        />
    </div>

    <button 
      @click="adicionarLink" 
      :disabled="links.length >= 3"
      class="bg-primaria text-secundaria text-[18px] font-semibold rounded-[8px] my-[5px] pl-[10px] p-[5px] disabled:opacity-50 disabled:cursor-not-allowed"
    >
      + Adicionar mais links
    </button>
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

const { name, position, phone, email, location } = toRefs(props.modelValue)
</script>
