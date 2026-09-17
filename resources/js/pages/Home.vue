<template>
  <Topbar />
  <main class="bg-secundaria w-full text-primaria text-center flex justify-center">
    <div class="mx-[20px] w-full max-w-[600px] px-[20px] py-[30px]">
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