<template>
    <router-view />
</template>

<script setup>
import { onMounted } from 'vue';
import { useLanguage } from './composables/useLanguage';

const { loadLanguage } = useLanguage();

onMounted(() => {
    loadLanguage();
});
</script>