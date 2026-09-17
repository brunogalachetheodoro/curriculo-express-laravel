<template>
  <div>
    <FontSize/>
    <div class="flex justify-around py-[20px]">
      <button class="border border-primaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="openModal">
        {{ t('curriculum.actions.preview') }}
      </button>
      <button class="bg-primaria text-secundaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="downloadPDF">
        {{ t('curriculum.actions.download') }}
      </button>
    </div>
  </div>

  <CurriculumModal v-if="isOpen" :curriculum="curriculum" @close="isOpen = false" />

  <div class="offscreen" >
    <Curriculum ref="curriculumComponent" :curriculum="curriculum" :base-size="baseSize"/>
  </div>

</template>

<script setup>
import { ref, nextTick } from 'vue'
import axios from 'axios'
import Curriculum from './Curriculum.vue'
import CurriculumModal from './CurriculumModal.vue'
import FontSize from './FontSize.vue'
import html2pdf from 'html2pdf.js/dist/html2pdf.bundle'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const isOpen = ref(false)
const curriculum = ref(null)
const curriculumComponent = ref(null)

const openModal = async () => {
  try {
    const response = await axios.get('/curriculum-fields')

    curriculum.value = response.data.curriculum
    isOpen.value = true
  } catch (error) {
    console.log('Error loading curriculum:', error.response?.data)
  }
}

const downloadPDF = async () => {
  try {
    const response = await axios.get('/curriculum-fields')

    curriculum.value = response.data.curriculum

    await nextTick()

    const element = curriculumComponent.value?.$el

    if (!element) {
      console.log('Curriculum element not found.')
      return
    }

    const options = {
      margin: 0,
      filename: 'curriculo.pdf',
      image: {
        type: 'jpeg',
        quality: 0.98,
      },
      html2canvas: {
        scale: 2,
        useCORS: true,
      },
      jsPDF: {
        unit: 'mm',
        format: 'a4',
        orientation: 'portrait',
      },
    }

    await html2pdf()
      .set(options)
      .from(element)
      .save()
  } catch (error) {
    console.log(
      'Error generating PDF:',
      error.response?.data || error
    )
  }
}
</script>

<style>
.offscreen {
  position: absolute;
  left: -9999px;
  top: 0;
}
</style>