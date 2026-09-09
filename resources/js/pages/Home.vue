<template>
  <main class="bg-secundaria w-[100vw] text-primaria text-center flex justify-center">
    <div class="mx-[20px] w-[80vw] lg:w-[600px]">
      <Topbar />
      <CurriculumFields />
      <Footer />
    </div>
  </main>
</template>

<script setup>
  import Topbar from "../components/Topbar.vue";
  import CurriculumFields from "../components/CurriculumFields.vue";
  import Footer from "../components/Footer.vue";
</script>