<script setup>
import TextInput from "@/Components/TextInput.vue";
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    bank_name: '',
    bank_bic_code: '',
    account_number: '',
    currency: ''
});

const copied = ref(false);
const handleCopy = () => {
    // Handle the copy event here
    copied.value = true;

    setTimeout(() => {
        copied.value = false;
    }, 3000);
};
</script>

<template>
    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                    Банковские реквизиты
                </div>
                <form class="space-y-6">
                    <div>
                        <TextInput id="bank_name" v-model="form.bank_name" type="text" class="mt-1 block w-full"
                            label="Наименование банка" required autofocus autocomplete="name" :copyable="true" :copied="copied"
                                   @copy="handleCopy"/>
                    </div>
                    <div>
                        <TextInput id="bank_bic_code" v-model="form.bank_bic_code" type="text" class="mt-1 block w-full" label="БИК банка"
                            required autocomplete="username" :copyable="true" :copied="copied"
                                   @copy="handleCopy"/>
                    </div>
                    <div>
                        <TextInput id="account_number" v-model="form.account_number" type="text" class="mt-1 block w-full" label="Номер расчетного счета"
                            required autocomplete="username" :copyable="true" :copied="copied"
                                   @copy="handleCopy"/>
                    </div>
                    <div>
                        <TextInput id="currency" v-model="form.currency" type="text" class="mt-1 block w-full"
                            label="Валюта" required autocomplete="username" :copyable="true" :copied="copied"
                                   @copy="handleCopy"/>
                    </div>

                </form>
            </div>
        </div>

        <div v-if="copied" class="fixed bottom-5 right-5 z-50 space-y-4">
            <div class="container mx-auto mt-10 space-y-5 animate-fade">
                <div class="flex justify-between shadow-inner p-4 text-sm text-white rounded-lg bg-[#44af9c]">
                    <svg class="flex-shrink-0 inline me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <p class="self-center font-medium">
                        Текст скопирован в буфер обмена
                    </p>

                <button class="text-xl align-center cursor-pointer alert-del ml-10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16992 14.8299L14.8299 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.8299 14.8299L9.16992 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


    </div>
</template>

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }

    to {
        opacity: 0;
    }
}

.animate-fade {
    animation: fadeIn 0.5s ease-in-out, fadeOut 0.5s ease-in-out 2.5s;
}
</style>
