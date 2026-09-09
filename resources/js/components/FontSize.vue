<template>
  <div class="flex flex-col justify-around my-[50px]">
    <h2 class="font-bold text-[18px]">Escolha o tamanho da fonte!</h2>
    <div class="flex justify-around my-[30px]">
      <button
        v-for="(size, label) in fontSizes"
        :key="label"
        @click="$emit('change-size', size)"
        :class="[
          'border px-[15px] py-[8px] rounded-full font-bold',
          selected === size
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
const props = defineProps({
  selected: {
    type: Number,
    default: 1
  }
})

const fontSizes = {
  "Muito Pequeno": 0.75,
  "Pequeno": 0.9,
  "Médio": 1,
  "Grande": 1.2,
  "Muito Grande": 1.5,
}
</script>
