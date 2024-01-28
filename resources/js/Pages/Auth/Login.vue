<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
    errorToast: null,
    showPassword: false,
});

// const submit = () => {
//     form.post(route('login'), {
//         onFinish: () => form.reset('password'),
//     });
// };
const submit = () => {
    form.errorToast = null;
    const loginButton = document.querySelector('.login-button');
    if (loginButton) {
        loginButton.disabled = true;
    }
    axios.get("/sanctum/csrf-cookie").then(response => {
        axios.post("/login", {
            email: form.email,
            password: form.password
        }).then(response => {
            form.post(route('login'), {
                onFinish: () => form.reset('password'),
            });
        }).catch(error => {
            form.errorToast = `Ошибка: ${error.response.data.message}`;
            setTimeout(() => {
                form.errorToast = null;
                if (loginButton) {
                    loginButton.disabled = false;
                }
            }, 3000);
        });
    });
};

const toggleShowPassword = () => {
    form.showPassword = !form.showPassword;
};
</script>

<template>
        <form @submit.prevent="submit" novalidate>
            <div class="items-center h-screen bg-emerald-900 flex flex-col justify-center max-md:px-5">
                <div class="flex w-[421px] max-w-full flex-col items-stretch mt-16 mb-64 max-md:my-10">
                    <img class="aspect-[2.73] object-contain object-center w-full overflow-hidden max-md:max-w-full"
                         src="../../assets/logo.png"/>
                    <span
                        class="items-start bg-white self-center flex w-[337px] max-w-full flex-col mt-24 p-8 rounded-3xl max-md:mt-10 max-md:px-5 relative">
          <div
              class="text-zinc-800 text-center text-3xl font-medium tracking-wide self-stretch whitespace-nowrap"> Вход </div>
          <input v-model="form.email"
                 class="text-neutral-400 text-sm leading-4 whitespace-nowrap justify-center bg-neutral-100 self-stretch mt-5 pl-4 pr-16 py-3 rounded-lg items-start max-md:pr-5"
                 placeholder="Email" required type="text" autocomplete="off"/>

          <div class="relative w-full">
            <div class="absolute inset-y-0 right-0 flex items-center px-2 mt-5">
              <button @click.prevent="toggleShowPassword"
                      class="absolute inset-y-0 right-1 flex items-center px-4 text-gray-600 focus:outline-none">
                  <svg v-if="form.showPassword" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
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
            </div>
            <input v-model="form.password" :type="form.showPassword ? 'text' : 'password'"
                   class="appearance-none rounded-lg w-full py-3 px-3 mt-5 leading-tight bg-gray-100 text-neutral-400 text-sm pr-16"
                   placeholder="Пароль" autocomplete="off"/>
          </div>

          <a class="text-emerald-900 text-sm font-medium leading-4 whitespace-nowrap mt-2.5 self-end" href="#"> Забыли пароль? </a>
          <button :disabled="form.errorToast" type="submit"
                  class="text-white text-center text-sm font-medium leading-4 whitespace-nowrap justify-center items-center bg-emerald-900 self-stretch mt-5 px-16 py-3.5 rounded-lg max-md:px-5">Войти</button>
        </span>
                </div>
            </div>
        </form>
        <div v-if="form.errorToast" class="fixed bottom-5 right-5 animate-fade">
            <div class="flex items-center justify-center p-4 text-sm text-white rounded-lg bg-rose-500 max-w-[500px]"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ form.errorToast }}</span>
                </div>
            </div>
        </div>
</template>
