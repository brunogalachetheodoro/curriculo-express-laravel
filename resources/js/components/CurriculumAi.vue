<template>
    <section class="mb-[30px] text-left">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-[18px] font-bold text-primaria">Gerar currículo com IA</h2>

            <button
                type="button"
                role="switch"
                :aria-checked="enabled"
                aria-label="Ativar geração de currículo com IA"
                @click="enabled = !enabled"
                :class="enabled ? 'bg-primaria' : 'bg-primaria/25'"
                class="relative flex h-[26px] w-[46px] shrink-0 items-center rounded-full p-[3px] transition-colors duration-200 cursor-pointer"
            >
                <span
                    :class="enabled ? 'translate-x-[20px]' : 'translate-x-0'"
                    class="h-[20px] w-[20px] rounded-full bg-white shadow-sm transition-transform duration-200"
                ></span>
            </button>
        </div>

        <div v-if="enabled" class="mt-[15px] flex flex-col gap-[10px]">
            <p class="text-[14px] text-primaria">
                Cole a descrição da vaga e suas instruções. A IA vai adaptar os campos do currículo com base nas suas informações.
            </p>

            <textarea
                v-model="prompt"
                rows="7"
                :disabled="loading"
                placeholder="Cole aqui a descrição completa da vaga... Se quiser, inclua suas regras específicas para a IA."
                class="w-full min-h-[170px] resize-y rounded-[8px] border border-primaria bg-secundaria p-[10px] text-primaria placeholder-primaria placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-primaria/30 disabled:opacity-60"
            ></textarea>

            <button
                type="button"
                :disabled="loading || !prompt.trim()"
                @click="emit('generate', prompt.trim())"
                class="w-full rounded-[8px] bg-primaria p-[8px] text-[16px] font-semibold text-secundaria transition-opacity hover:opacity-90 disabled:cursor-not-allowed disabled:opacity-50"
            >
                {{ loading ? 'Gerando currículo...' : 'Gerar currículo com IA' }}
            </button>

            <p v-if="error" role="alert" class="text-[13px] text-red-400">{{ error }}</p>
            <p v-if="success" role="status" class="text-[13px] text-primaria">{{ success }}</p>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

defineProps({
    loading: { type: Boolean, default: false },
    error: { type: String, default: '' },
    success: { type: String, default: '' },
});

const emit = defineEmits(['generate']);
const enabled = ref(false);
const prompt = ref('');
</script>
