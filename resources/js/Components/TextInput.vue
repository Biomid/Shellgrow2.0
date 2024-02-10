<!--<script setup>-->
<!--import { onMounted, ref } from 'vue';-->

<!--const model = defineModel({-->
<!--    type: String,-->
<!--    required: true,-->
<!--});-->

<!--const input = ref(null);-->

<!--onMounted(() => {-->
<!--    if (input.value.hasAttribute('autofocus')) {-->
<!--        input.value.focus();-->
<!--    }-->
<!--});-->

<!--defineExpose({ focus: () => input.value.focus() });-->
<!--</script>-->

<!--<template>-->
<!--    <div-->
<!--        class="relative mt-5"-->
<!--    >-->
<!--        <input type="text" id="floating_outlined" v-model="model" ref="input" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-solid border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />-->
<!--        <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Фамилия, имя, отчество</label>-->
<!--    </div>-->
<!--</template>-->

<!--<script setup>-->
<!--import { onMounted, ref, defineProps, defineExpose } from 'vue';-->

<!--const props = defineProps({-->
<!--    label: {-->
<!--        type: String,-->
<!--        required: true,-->
<!--    },-->
<!--});-->

<!--const model = defineModel({-->
<!--    type: String,-->
<!--    required: true,-->
<!--});-->

<!--const input = ref(null);-->

<!--onMounted(() => {-->
<!--    if (input.value.hasAttribute('autofocus')) {-->
<!--        input.value.focus();-->
<!--    }-->
<!--});-->

<!--defineExpose({ focus: () => input.value.focus() });-->
<!--</script>-->

<!--<template>-->
<!--    <div class="relative mt-5">-->
<!--        <input-->
<!--            type="text"-->
<!--            id="floating_outlined"-->
<!--            v-model="model"-->
<!--            ref="input"-->
<!--            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-solid border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"-->
<!--            placeholder=" "-->
<!--        />-->
<!--        <label-->
<!--            for="floating_outlined"-->
<!--            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1"-->
<!--        >-->
<!--            {{ label }}-->
<!--        </label>-->
<!--    </div>-->
<!--</template>-->

<script setup>
import { onMounted, ref, defineProps, defineExpose } from 'vue';
import { useClipboard } from '@vueuse/core'

const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    password: {
        type: Boolean,
        default: false,
    },
    copyable: {
        type: Boolean,
        default: false,
    }
});

const model = defineModel({
    type: String,
    required: true,
});

const inputId = `input_${Math.random().toString(36).substring(2, 9)}`;
const input = ref('');
const showPassword = ref(false);
const copied = ref(false);

const { copy } = useClipboard()

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

const handleCopy = () => {
    copy(model.value);
    copied.value = true;
    setTimeout(() => {
        copied.value = false;
    }, 2000);
};

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div class="relative mt-5">
        <input
            :type="password ? (showPassword ? 'text' : 'password') : 'text'"
            :id="inputId"
            v-model="model"
            ref="input"
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-solid border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" "
            autocomplete="on"
        />
        <label
            :for="inputId"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1"
        >
            {{ label }}
        </label>

        <button
            v-if="password"
            @click.prevent="showPassword = !showPassword"
            class="absolute inset-y-0 right-0 flex items-center px-2 mr-1"
        >
            <svg v-if="showPassword" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none">
                <path
                    d="M15.58 12C15.58 13.98 13.98 15.58 12 15.58C10.02 15.58 8.42004 13.98 8.42004 12C8.42004 10.02 10.02 8.42004 12 8.42004C13.98 8.42004 15.58 10.02 15.58 12Z"
                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path
                    d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.46997 3.71997 5.17997 5.79997 2.88997 9.39997C1.98997 10.81 1.98997 13.18 2.88997 14.59C5.17997 18.19 8.46997 20.27 12 20.27Z"
                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M14.53 9.47004L9.47004 14.53C8.82004 13.88 8.42004 12.99 8.42004 12C8.42004 10.02 10.02 8.42004 12 8.42004C12.99 8.42004 13.88 8.82004 14.53 9.47004Z"
                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path
                    d="M17.82 5.76998C16.07 4.44998 14.07 3.72998 12 3.72998C8.46997 3.72998 5.17997 5.80998 2.88997 9.40998C1.98997 10.82 1.98997 13.19 2.88997 14.6C3.67997 15.84 4.59997 16.91 5.59997 17.77"
                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path
                    d="M8.42004 19.5301C9.56004 20.0101 10.77 20.2701 12 20.2701C15.53 20.2701 18.82 18.1901 21.11 14.5901C22.01 13.1801 22.01 10.8101 21.11 9.40005C20.78 8.88005 20.42 8.39005 20.05 7.93005"
                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.5099 12.7C15.2499 14.11 14.0999 15.26 12.6899 15.52" stroke="#292D32"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.47 14.53L2 22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M22 2L14.53 9.47" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </button>
        <button
            v-else-if="copyable"
            @click.prevent="handleCopy"
            class="absolute inset-y-0 right-0 flex items-center px-2 mr-1"
        >
            <svg v-if="!copied" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 12.9V17.1C16 20.6 14.6 22 11.1 22H6.9C3.4 22 2 20.6 2 17.1V12.9C2 9.4 3.4 8 6.9 8H11.1C14.6 8 16 9.4 16 12.9Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 6.9V11.1C22 14.6 20.6 16 17.1 16H16V12.9C16 9.4 14.6 8 11.1 8H8V6.9C8 3.4 9.4 2 12.9 2H17.1C20.6 2 22 3.4 22 6.9Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg v-else width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 11.1V6.9C22 3.4 20.6 2 17.1 2H12.9C9.4 2 8 3.4 8 6.9V8H11.1C14.6 8 16 9.4 16 12.9V16H17.1C20.6 16 22 14.6 22 11.1Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 17.1V12.9C16 9.4 14.6 8 11.1 8H6.9C3.4 8 2 9.4 2 12.9V17.1C2 20.6 3.4 22 6.9 22H11.1C14.6 22 16 20.6 16 17.1Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.08008 15L8.03008 16.95L11.9201 13.05" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

    </div>
</template>


