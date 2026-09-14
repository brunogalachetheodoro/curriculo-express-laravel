<template>
  <div class="flex flex-col justify-around my-[50px]">
    <h2 class="font-bold text-[18px]">
      Escolha o tamanho da fonte!
    </h2>

    <div class="flex flex-wrap justify-center gap-[10px] my-[30px]">
      <button
        v-for="(size, label) in fontSizes"
        :key="label"
        @click="changeFontSize(size)"
        :class="[
          'border px-[15px] py-[8px] rounded-full font-bold cursor-pointer',
          selectedSize === size
            ? 'bg-primaria text-black border-primaria'
            : 'bg-transparent text-primaria border-primaria'
        ]"
      >
        {{ label }}
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const selectedSize = ref(1);

const fontSizes = {
  "Muito Pequeno": 0.75,
  "Pequeno": 0.9,
  "Médio": 1,
  "Grande": 1.2,
  "Muito Grande": 1.5,
}

const changeFontSize = async (size) => {
  selectedSize.value = size;

  try {
    await axios.put('/curriculum/font-size', {
      font_size: size
    });
  } catch (error) {
    console.log('Error saving font size:', error.response?.data);
  }
}
</script>