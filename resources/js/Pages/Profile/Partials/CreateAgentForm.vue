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
    file: props.user?.file || null,
});

const handleSubmit = () => {
    const formData = new FormData();
    for (const key in form) {
        if (Object.prototype.hasOwnProperty.call(form, key)) {
            formData.append(key, form[key]);
        }
    }

    form.post(route('agent.create'), formData);

};

const handleFileChange = (event) => {
    form.file = event.target.files[0];
};

onMounted(() => {
    if (Object.keys(props.user).length > 0) {
        isBeingUpdated.value = true;
    }
});

</script>

<template>
    <AuthenticatedLayout>
        <div class="min-h-screen h-full bg-[#ecf7f7] flex items-center justify-center sm:ml-64 mt-6 p-4">
            <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
                <form @submit.prevent="handleSubmit" class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
                    <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                        <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                            Данные агента
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
                                <div
                                    class="flex gap-5 justify-between py-2 pr-20 pl-2.5 mt-5 w-full border-t border-b border-solid border-y-gray-200 max-md:flex-wrap max-md:pr-5 max-md:max-w-full"
                                >
                                    <div class="flex-auto my-auto text-zinc-800">
                                        Фотография/аватар
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

