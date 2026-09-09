<template>
  <div>
    <FontSize @change-size="updateSize" :selected="selectedMultiplier"/>
    <div class="flex justify-around py-[20px]">
      <button class="border border-primaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="isOpen = true">
        Visualizar
      </button>
      <button class="bg-primaria text-secundaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="downloadPDF">
        Download
      </button>
    </div>
  </div>

  <CurriculumModal v-if="isOpen" @close="isOpen = false" />

  <div class="offscreen" >
    <Curriculum ref="curriculumComponent" :base-size="baseSize"/>
  </div>

</template>

<script setup>
import { ref, nextTick } from 'vue'
import Curriculum from './Curriculum.vue'
import CurriculumModal from './CurriculumModal.vue'
import FontSize from './FontSize.vue'
import html2pdf from 'html2pdf.js/dist/html2pdf.bundle'
</script>

<style>
.offscreen {
  position: absolute;
  left: -9999px;
  top: 0;
}
</style>
