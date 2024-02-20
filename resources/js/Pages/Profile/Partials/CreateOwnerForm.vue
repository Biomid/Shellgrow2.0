<script setup>

import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import Datepicker from 'flowbite-datepicker/Datepicker';

const props = defineProps(["user"]);

const isBeingUpdated = ref(false);

const form = useForm({
    name: props.user?.name || '',
    email: props.user?.email || '',
    phone: props.user?.phone || '',
    dob: props.user?.dob || null,
    file: props.user?.file || null,
});

const handleSubmit = () => {

    if (!isBeingUpdated) {
        const formData = new FormData();
        for (const key in form) {
            if (Object.prototype.hasOwnProperty.call(form, key)) {
                formData.append(key, form[key]);
            }
        }

        form.post(route('user.create'), formData);
    }
    else {
        console.log(props.user.id);
        form.patch(route('user.update', { id: props.user.id }), {
            onSuccess: () => {
                // Handle success if needed
            },
            onError: () => {
                console.log('something went wrong')
            },
        });
    }
};

const handleFileChange = (event) => {
    form.file = event.target.files[0];
};

const dobHandler = (event) => {
    form.dob = event.target.value;
    console.log(form.dob);
};

onMounted(() => {

    if (Object.keys(props.user).length > 0) {
        console.log('hey');
        isBeingUpdated.value = true;
    }

    const datepickerEl = document.getElementById('datepickerId');
    if (datepickerEl) {
        const datepicker = new Datepicker(datepickerEl, {
            format: "yyyy-mm-dd",
        });

        datepicker.setDate(form.dob);
    }

    console.log(isBeingUpdated);
});

</script>

<template>
    <AuthenticatedLayout>
        <div class="min-h-screen h-full bg-[#ecf7f7] flex items-center justify-center sm:ml-64 mt-6 p-4">
                <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
                    <form @submit.prevent="handleSubmit" class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
                        <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                            <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                                Данные собственника
                            </div>
                            <div class="space-y-6">
                                <div class="flex flex-col grow leading-[120%] max-md:mt-8">
                                    <div>
                                        <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full"
                                                   label="Фамилия, имя, отчество" required autofocus autocomplete="name" />
                                    </div>
                                    <div>
                                        <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" label="Телефон"
                                                   required autocomplete="phone" />
                                    </div>
                                    <div>
                                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" label="E-mail"
                                                   required autocomplete="username" />
                                    </div>
                                    <div class="relative mt-5">
                                        <input
                                            datepicker
                                            datepicker-autohide
                                            type="text"
                                            v-on:change="form.dob"
                                            @click.prevent="dobHandler"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-solid border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=""
                                            id="datepickerId"
                                        />
                                        <label
                                            for="datepickerId"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1"
                                        >
                                            Дата рождения
                                        </label>

                                        <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M3.5 9.08997H20.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11.9955 13.7H12.0045" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.29431 13.7H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.29431 16.7H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="flex gap-5 justify-between py-2 pr-20 pl-2.5 mt-5 w-full border-t border-b border-solid border-y-gray-200 max-md:flex-wrap max-md:pr-5 max-md:max-w-full"
                                    >
                                        <div class="flex-auto my-auto text-zinc-800">
                                            Документ, удостоверяющий личность
                                        </div>
                                        <div
                                            class="flex gap-2.5 justify-between font-medium text-blue-700 whitespace-nowrap"
                                        >
                                            <svg class="w-6 aspect-square" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2 12.3L10.79 13.71C10.01 14.49 10.01 15.76 10.79 16.54C11.57 17.32 12.84 17.32 13.62 16.54L15.84 14.32C17.4 12.76 17.4 10.23 15.84 8.65999C14.28 7.09999 11.75 7.09999 10.18 8.65999L7.76 11.08C6.42 12.42 6.42 14.59 7.76 15.93" stroke="#557BE9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9 22.5H15C20 22.5 22 20.5 22 15.5V9.5C22 4.5 20 2.5 15 2.5H9C4 2.5 2 4.5 2 9.5V15.5C2 20.5 4 22.5 9 22.5Z" stroke="#557BE9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                            <label title="Click to upload" class="grow my-auto underline cursor-pointer" for="exampleInputFile">
                                                Прикрепить файл
                                            </label>
                                            <input
                                                hidden=""
                                                type="file"
                                                name="file"
                                                id="exampleInputFile"
                                                @change="handleFileChange"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

<!--                        <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full mt-3">-->
<!--                            <div class="text-base font-medium text-emerald-900 max-md:max-w-full">-->
<!--                                Пароль-->
<!--                            </div>-->
<!--                            <div class="space-y-6">-->
<!--                                <div class="flex flex-col grow leading-[120%] max-md:mt-8">-->
<!--                                    <div>-->
<!--                                        <div class="relative mt-5">-->
<!--                                            <input-->
<!--                                                id="passwordField"-->
<!--                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-solid border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"-->
<!--                                                placeholder=""-->
<!--                                                autocomplete="on"-->
<!--                                            />-->
<!--                                            <label-->
<!--                                                for="passwordField"-->
<!--                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1"-->
<!--                                            >-->
<!--                                                Пароль-->
<!--                                            </label>-->

<!--                                            <button-->
<!--                                                @click.prevent="generatePassword"-->
<!--                                                class="absolute text-[#014745] inset-y-0 right-0 flex items-center px-2 mr-1"-->
<!--                                            >-->
<!--                                                Cгенерировать-->
<!--                                            </button>-->

<!--                                        </div>-->
<!--                                    </div>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="flex justify-between items-center gap-4">-->
<!--                            <button v-if="!isBeingUpdated" type="submit"-->
<!--                                    class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">-->
<!--                                Сохранить-->
<!--                            </button>-->
<!--                            <button v-else type="submit"-->
<!--                                    class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">-->
<!--                                Сохранить изменения-->
<!--                            </button>-->
<!--                            <Transition-->
<!--                                enter-active-class="transition ease-in-out"-->
<!--                                enter-from-class="opacity-0"-->
<!--                                leave-active-class="transition ease-in-out"-->
<!--                                leave-to-class="opacity-0"-->
<!--                            >-->
<!--                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>-->
<!--                            </Transition>-->
<!--                        </div>-->
                        <div
                            class="flex gap-4 justify-between text-sm font-medium leading-4 text-center whitespace-nowrap max-md:flex-wrap"
                        >
                            <button v-if="!isBeingUpdated" type="submit"
                                    class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">
                                Сохранить
                            </button>
                            <button v-else type="submit"
                                    class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">
                                Сохранить изменения
                            </button>
                            <button v-if="isBeingUpdated"
                                class="justify-center self-start px-11 py-2.5 mt-5 inline-flex items-center text-emerald-900 text-sm font-medium text-center leading-4 bg-white border rounded-lg whitespace-nowrap border-emerald-900 border-solid max-md:px-5"
                            >
                                <svg class="me-3" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.5 5.97998C18.17 5.64998 14.82 5.47998 11.48 5.47998C9.5 5.47998 7.52 5.57998 5.54 5.77998L3.5 5.97998" stroke="#014745" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 4.97L9.22 3.66C9.38 2.71 9.5 2 11.19 2H13.81C15.5 2 15.63 2.75 15.78 3.67L16 4.97" stroke="#014745" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.35 9.14001L18.7 19.21C18.59 20.78 18.5 22 15.71 22H9.29002C6.50002 22 6.41002 20.78 6.30002 19.21L5.65002 9.14001" stroke="#014745" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.83 16.5H14.16" stroke="#014745" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 12.5H15" stroke="#014745" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Удалить собственника
                            </button>
                        </div>
                    </form>
            </div>
        </div>


    </AuthenticatedLayout>



</template>

