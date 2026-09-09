<template>
  <div class="flex justify-center flex-col mt-[20px]">
    <h2 class="font-bold text-[18px]">Informações Complementares</h2>
      <p class="my-[10px]">Adicione informações como inglês, cursos complementares ou serviços voluntários</p>

    <input
      v-model="add1"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Ex: Inglês Avançado"
      type="text"
    />

    <input
      v-model="add2"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Ex: Curso Online Marketing Digital"
      type="text"
    />

    <input
      v-model="add3"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Ex: Voluntário na empresa X como Desenvolvedor de Software"
      type="text"
    />

    <input
      v-model="add4"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Ex: Excel Avançado"
      type="text"
    />

    <input
      v-model="add5"
      class="bg-secundaria border border-primaria rounded-[8px] my-[5px] placeholder-primaria pl-[10px] p-[5px] placeholder-opacity-60"
      placeholder="Ex: Certificado Node.JS"
      type="text"
    />
  </div>
</template>

<script setup>
import { toRefs } from 'vue'

</script>
