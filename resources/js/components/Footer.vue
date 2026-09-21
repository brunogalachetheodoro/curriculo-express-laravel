<template>
  <div>
    <FontSize/>
    <div ref="actionsContainer" class="flex justify-around py-[20px]">
      <button class="border border-primaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="openModal">
        {{ t('curriculum.actions.preview') }}
      </button>
      <button class="bg-primaria text-secundaria font-bold p-[5px] w-[150px] rounded-[10px] cursor-pointer" @click="downloadPDF">
        {{ t('curriculum.actions.download') }}
      </button>
    </div>
  </div>
  <Transition name="modal">
    <CurriculumModal v-if="isOpen" :curriculum="curriculum" @close="isOpen = false" />
  </Transition>
  <div class="offscreen" >
    <Curriculum ref="curriculumComponent" :curriculum="curriculum" :base-size="baseSize"/>
  </div>

</template>

<script setup>
import { ref, nextTick, onMounted } from 'vue'
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

const actionsContainer = ref(null)

onMounted(() => {
    const fields = actionsContainer.value.querySelectorAll('button');

    fields.forEach((field, index) => {
        field.classList.add('field-enter');
        field.style.animationDelay = `${4700 + (index * 100)}ms`;
    });
});

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

<style scoped>

@keyframes field-enter {
    from {
        opacity: 0;
        transform: translateX(-20px);
        filter: blur(4px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
        filter: blur(0);
    }
}

.field-enter {
    opacity: 0;
    animation: field-enter 300ms ease-out forwards;
}

.offscreen {
    position: absolute;
    left: -9999px;
    top: 0;
}
</style>

<style>
.modal-enter-active,
.modal-leave-active {
    transition: opacity 500ms ease-in-out;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

.modal-enter-to,
.modal-leave-from {
    opacity: 1;
}

.modal-enter-active .modal-content,
.modal-leave-active .modal-content {
    transition:
        opacity 500ms ease-in-out,
        transform 500ms ease-in-out,
        filter 500ms ease-in-out;
}

.modal-enter-from .modal-content,
.modal-leave-to .modal-content {
    opacity: 0;
    transform: translateY(50px);
    filter: blur(4px);
}

.modal-enter-to .modal-content,
.modal-leave-from .modal-content {
    opacity: 1;
    transform: translateY(0);
    filter: blur(0);
}
</style>