<script setup>
import TextInput from "@/Components/TextInput.vue";
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    bank_name: '',
    bank_bic_code: '',
    account_number: '',
    currency: ''
});

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
                            label="Наименование банка" required autofocus autocomplete="name" :copyable="true"/>
                    </div>
                    <div>
                        <TextInput id="bank_bic_code" v-model="form.bank_bic_code" type="text" class="mt-1 block w-full" label="БИК банка"
                            required autocomplete="username" :copyable="true"/>
                    </div>
                    <div>
                        <TextInput id="account_number" v-model="form.account_number" type="text" class="mt-1 block w-full" label="Номер расчетного счета"
                            required autocomplete="username" :copyable="true" />
                    </div>
                    <div>
                        <TextInput id="currency" v-model="form.currency" type="text" class="mt-1 block w-full"
                            label="Валюта" required autocomplete="username" :copyable="true" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
