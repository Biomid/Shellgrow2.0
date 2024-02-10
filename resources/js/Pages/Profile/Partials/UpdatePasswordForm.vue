<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                    Мой пароль
                </div>
                <form @submit.prevent="updatePassword" class="space-y-6">
                    <div>
                        <TextInput
                            id="current_password"
                            ref="currentPasswordInput"
                            v-model="form.current_password"
                            type="password"
                            label="Текущий пароль"
                            class="mt-1 block w-full"
                            autocomplete="current-password"
                            :password="true"
                        />
                    </div>
                    <div>
                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            label="Новый пароль"
                            type="password"
                            class="mt-1 block w-full"
                            autocomplete="new-password"
                            :password="true"
                        />
                    </div>
                    <div>
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            label="Повторите новый пароль"
                            type="password"
                            class="mt-1 block w-full"
                            autocomplete="new-password"
                            :password="true"
                        />
                    </div>

                    <button
                        :disabled = "form.processing" class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5"
                    >
                        Сохранить изменения
                    </button>

                </form>
            </div>
        </div>
    </div>
</template>
