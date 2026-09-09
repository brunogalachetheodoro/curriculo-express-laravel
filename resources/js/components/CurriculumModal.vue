<template>
  <div v-if="curriculum" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 text-left text-black">
    <div class="bg-white rounded-2xl shadow-lg max-w-3xl w-full max-h-[90vh] overflow-y-auto p-6 relative">
      <div class="flex flex-col m-[15px] md:m-[50px]">
        <button 
          @click="$emit('close')" 
          class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl">
          ✕
        </button>

        <!-- Dados Pessoais -->
        <p class="font-bold text-[18px] md:text-[26px]">{{ curriculum.name }}</p>
        <p class="text-[12px] md:text-[16px] font-semibold">{{ curriculum.position }}</p>

        <!-- Hard Skills -->
        <div class="flex w-full text-[10px] md:text-[12px] mb-[10px] md:mb-[30px]">
          <p>{{ curriculum.hardSkill1 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hardSkill2 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hardSkill3 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hardSkill4 }}</p>
          <p class="ml-[10px] md:ml-[20px]">{{ curriculum.hardSkill5 }}</p>
        </div>

        <!-- Contato -->
        <div class="flex text-[12px] md:text-[16px] mb-[10px] md:mb-[30px]">
          <p>{{ curriculum.phone }}</p>
          <p class="ml-[30px]">{{ curriculum.email }}</p>
          <p class="ml-[30px]">{{ curriculum.location }}</p>
        </div>

        <!-- Links -->
        <div class="mb-[10px] md:mb-[30px] text-[12px] md:text-[16px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Links Importantes</h2>
          <div class="flex">
            <p>{{ curriculum.links[0]?.name }}</p>
          </div>
          <div class="flex">
            <p>{{ curriculum.links[1]?.name }}</p>
          </div>
          <div class="flex">
            <p>{{ curriculum.links[2]?.name }}</p>
          </div>
        </div>

        <!-- Sobre -->
        <div class="mb-[10px] text-[12px] md:text-[16px] md:mb-[30px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Sobre</h2>
          <p>{{ curriculum.about }}</p>
        </div>

        <!-- Educação -->
        <div class="mb-[10px] text-[12px] md:text-[16px] md:mb-[30px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Educação</h2>
          <p>{{ curriculum.degree }}</p>
          <p>{{ curriculum.institution }}</p>
          <div class="flex">
              <p class="mr-[10px]">{{ curriculum.startYear }}</p> - <p class="ml-[10px]">{{ curriculum.finishYear }}</p>
          </div>
        </div>

        <!-- Experiências -->
        <div class="mb-[10px] text-[12px] md:text-[16px] md:mb-[30px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Experiência Profissional</h2>

          <div class="mt-[10px]">
              <p class="font-bold">{{ curriculum.position1 }}</p>
              <p>{{ curriculum.company1 }}</p>
              <div class="flex">
                <p class="flex">
                  {{ curriculum.start1 }}
                  <span v-if="curriculum.end1 != ''" class="ml-[10px]"> - {{ curriculum.end1 }}</span>
                </p>
              </div>
              <p>{{ curriculum.responsibilities1 }}</p>
          </div>

          <div class="mt-[30px]">
              <p class="font-bold">{{ curriculum.position2 }}</p>
              <p>{{ curriculum.company2 }}</p>
              <div class="flex">
                <p class="flex">
                  {{ curriculum.start2 }}
                  <span v-if="curriculum.end2 != ''"> - {{ curriculum.end2 }}</span>
                </p>
              </div>
              <p>{{ curriculum.responsibilities2 }}</p>
          </div>
        </div>

        <div class="mb-[10px] text-[12px] md:text-[16px] md:mb-[30px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Informações Complementares</h2>
          <ul class="list-disc ml-[20px]">
            <li v-if="curriculum?.add1" class="mt-[10px]">{{ curriculum?.add1 || '' }}</li>
            <li v-if="curriculum?.add2" class="mt-[10px]">{{ curriculum?.add2 || '' }}</li>
            <li v-if="curriculum?.add3" class="mt-[10px]">{{ curriculum?.add3 || '' }}</li>
            <li v-if="curriculum?.add4" class="mt-[10px]">{{ curriculum?.add4 || '' }}</li>
            <li v-if="curriculum?.add5" class="mt-[10px]">{{ curriculum?.add5 || '' }}</li>
          </ul>
        </div>

        <!-- Soft Skills -->
        <!--
        <div class="mb-[10px] text-[12px] md:text-[16px] md:mb-[30px]">
          <h2 class="font-bold text-[16px] md:text-[22px]">Soft Skills</h2>
          <p>{{ curriculum.softSkill1 }}</p>
          <p>{{ curriculum.softSkill2 }}</p>
          <p>{{ curriculum.softSkill3 }}</p>
          <p>{{ curriculum.softSkill4 }}</p>
          <p>{{ curriculum.softSkill5 }}</p>
        </div>
        -->
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";

const curriculum = ref(null);

onMounted(async () => {
  const uuid = localStorage.getItem("anonymous_uuid");
  if (!uuid) return console.error("UUID não encontrado no localStorage!");

  try {
    const res = await fetch(`http://curriculoexpress.whf.bz/api/getData.php?uuid=${uuid}`);
    curriculum.value = await res.json();
  } catch (err) {
    console.error("Erro ao buscar currículo:", err);
  }
});


</script>