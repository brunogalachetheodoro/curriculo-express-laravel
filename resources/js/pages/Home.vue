<template>
  <Topbar />
  <main class="bg-secundaria w-full text-primaria text-center flex justify-center">
  <div class="mx-[20px] w-full max-w-[600px] px-[20px] py-[30px] transition-all duration-1000 ease-in-out" :class="leaving ? 'opacity-0 blur-[3px]' : 'opacity-100 blur-0'">
      <CurriculumFields />
      <Footer />
  </div>
  </main>
</template>

<script setup>
import { ref } from "vue";
import { onBeforeRouteLeave } from "vue-router";
import Topbar from "../components/Topbar.vue";
import CurriculumFields from "../components/CurriculumFields.vue";
import Footer from "../components/Footer.vue";

const leaving = ref(false);

onBeforeRouteLeave((to, from, next) => {
    leaving.value = true;

    setTimeout(() => {
        next();
    }, 1000);
});
</script>