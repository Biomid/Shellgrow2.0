<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { format } from 'date-fns';
import ToastList from "@/Pages/Profile/Partials/ToastList.vue";
import Datepicker from 'flowbite-datepicker/Datepicker';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;
const showErrorToasts = ref(false);

//const formattedDob = ref(format(new Date(user.dob), 'dd.MM.yyyy'));

const form = useForm({
    name: user.name,
    email: user.email,
    dob: user.dob,
    phone: user.phone,
    errorToast: null
});

const handleSubmit = () => {
    // Handle the copy event here
    form.patch(route('profile.update'))
    showErrorToasts.value = true;

    setTimeout(() => {
        showErrorToasts.value = false;
    }, 5000);
};

onMounted(() => {
    const datepickerEl = document.getElementById('datepickerId');
    if (datepickerEl) {
        const datepicker = new Datepicker(datepickerEl, {
            format: "yyyy-mm-dd",
        });

        datepicker.setDate(form.dob);
    }
});
</script>

<template>
<!--        <section>-->
<!--            <header>-->
<!--                <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>-->

<!--                <p class="mt-1 text-sm text-gray-600">-->
<!--                    Update your account's profile information and email address.-->
<!--                </p>-->
<!--            </header>-->

<!--            <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">-->
<!--                <div>-->
<!--                    <InputLabel for="name" value="Name" />-->

<!--                    <TextInput-->
<!--                        id="name"-->
<!--                        type="text"-->
<!--                        class="mt-1 block w-full"-->
<!--                        v-model="form.name"-->
<!--                        required-->
<!--                        autofocus-->
<!--                        autocomplete="name"-->
<!--                    />-->

<!--                </div>-->

<!--                <div>-->
<!--                    <InputLabel for="email" value="Email" />-->

<!--                    <TextInput-->
<!--                        id="email"-->
<!--                        type="email"-->
<!--                        class="mt-1 block w-full"-->
<!--                        v-model="form.email"-->
<!--                        required-->
<!--                        autocomplete="username"-->
<!--                    />-->

<!--                </div>-->

<!--                <div>-->
<!--                    <InputLabel for="phone" value="Phone" />-->

<!--                    <TextInput-->
<!--                        id="phone"-->
<!--                        type="text"-->
<!--                        class="mt-1 block w-full"-->
<!--                        v-model="form.phone"-->
<!--                        required-->
<!--                        autocomplete="phone"-->
<!--                    />-->

<!--                </div>-->

<!--                <div v-if="mustVerifyEmail && user.email_verified_at === null">-->
<!--                    <p class="text-sm mt-2 text-gray-800">-->
<!--                        Your email address is unverified.-->
<!--                        <Link-->
<!--                            :href="route('verification.send')"-->
<!--                            method="post"-->
<!--                            as="button"-->
<!--                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--                        >-->
<!--                            Click here to re-send the verification email.-->
<!--                        </Link>-->
<!--                    </p>-->

<!--                    <div-->
<!--                        v-show="status === 'verification-link-sent'"-->
<!--                        class="mt-2 font-medium text-sm text-green-600"-->
<!--                    >-->
<!--                        A new verification link has been sent to your email address.-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="flex items-center gap-4">-->
<!--                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>-->

<!--                    <Transition-->
<!--                        enter-active-class="transition ease-in-out"-->
<!--                        enter-from-class="opacity-0"-->
<!--                        leave-active-class="transition ease-in-out"-->
<!--                        leave-to-class="opacity-0"-->
<!--                    >-->
<!--                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>-->
<!--                    </Transition>-->
<!--                </div>-->
<!--            </form>-->

<!--            <ToastList :formErrors="form.errors" />-->
<!--        </section>-->

    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
<!--            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">-->
<!--                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">-->
<!--                    Мои данные-->
<!--                </div>-->

<!--                <form @submit.prevent="form.patch(route('profile.update'))" class="space-y-6">-->

<!--                    <div v-if="$page.props.auth.user.roles[0] === 'agent'" class="text-white text-sm px-4 py-2.5 outline-none rounded w-max cursor-pointer">-->
<!--                        <label title="Click to upload" for="button2">-->
<!--                            <img src="../../../assets/upload.png" class="cursor-pointer"/>-->
<!--                        </label>-->
<!--                        <input hidden="" type="file" name="button2" id="button2">-->
<!--                    </div>-->

<!--                    <div>-->
<!--                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"-->
<!--                            label="Фамилия, имя, отчество" required autofocus autocomplete="name" />-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.phone" label="Телефон"-->
<!--                            required autocomplete="username" />-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" label="E-mail"-->
<!--                            required autocomplete="username" />-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <TextInput v-if="$page.props.auth.user.roles[0] !== 'agent'" id="email" type="email"-->
<!--                            class="mt-1 block w-full" v-model="form.dob" label="Дата рождения" required-->
<!--                            autocomplete="username" />-->
<!--                    </div>-->

<!--                    <button :disabled="form.processing"-->
<!--                        class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">-->
<!--                        Сохранить изменения-->
<!--                    </button>-->
<!--                </form>-->
<!--            </div>-->

            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm">
                <div
                    class="text-base font-medium leading-5 text-emerald-900 max-md:max-w-full"
                >
                    Мои данные
                </div>
                <div class="max-md:max-w-full">
                    <form @submit.prevent="handleSubmit" class="flex max-md:flex-col max-md:gap-0 max-md:">
                        <div class="flex flex-col max-md:ml-0 max-md:w-full">
                            <div v-if="$page.props.auth.user.roles[0] === 'agent'" class="text-white text-sm px-4 py-2.5 mr-5 outline-none rounded w-max cursor-pointer">
                                <label title="Click to upload" for="button2">
                                    <img src="../../../assets/upload.png" class="cursor-pointer"/>
                                </label>
                                <input hidden="" type="file" name="button2" id="button2">
                            </div>
                        </div>
                        <div class="flex flex-col w-full max-md:ml-0 max-md:w-full">
                            <div class="flex flex-col grow leading-[120%] max-md:mt-8">
                                <div>
                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                               label="Фамилия, имя, отчество" required autofocus autocomplete="name" />
                                </div>
                                <div>
                                    <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" label="Телефон"
                                               required autocomplete="username" />
                                </div>
                                <div>
                                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" label="E-mail"
                                               required autocomplete="username" />
                                </div>
                                <div>
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
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button :disabled="form.processing"
                                        class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">
                                    Сохранить изменения
                                </button>
                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </div>
                    </form>

                    <ToastList v-if="showErrorToasts" class="animate-fade" :formErrors="form.errors" />

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
    animation: fadeIn 0.5s ease-in-out, fadeOut 0.5s ease-in-out 4.5s;
}
</style>


<!--<script setup>-->
<!--import InputError from '@/Components/InputError.vue';-->
<!--import InputLabel from '@/Components/InputLabel.vue';-->
<!--import PrimaryButton from '@/Components/PrimaryButton.vue';-->
<!--import TextInput from '@/Components/TextInput.vue';-->
<!--import {ref} from "vue";-->
<!--import {format} from "date-fns";-->
<!--import { Link, useForm, usePage } from '@inertiajs/vue3';-->
<!--defineProps({-->
<!--    mustVerifyEmail: {-->
<!--        type: Boolean,-->
<!--    },-->
<!--    status: {-->
<!--        type: String,-->
<!--    },-->
<!--});-->
<!--const user = usePage().props.auth.user;-->

<!--const formattedDob = ref(format(new Date(user.dob), 'dd.MM.yyyy'));-->

<!--const form = useForm({-->
<!--    name: user.name,-->
<!--    email: user.email,-->
<!--    phone: user.phone-->
<!--});-->
<!--</script>-->

<!--<template>-->
<!--    <section>-->
<!--        <header>-->
<!--            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>-->

<!--            <p class="mt-1 text-sm text-gray-600">-->
<!--                Update your account's profile information and email address.-->
<!--            </p>-->
<!--        </header>-->

<!--        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">-->
<!--            <div>-->
<!--                <InputLabel for="name" value="Name" />-->

<!--                <TextInput-->
<!--                    id="name"-->
<!--                    type="text"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.name"-->
<!--                    required-->
<!--                    autofocus-->
<!--                    autocomplete="name"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.name" />-->
<!--            </div>-->

<!--            <div>-->
<!--                <InputLabel for="email" value="Email" />-->

<!--                <TextInput-->
<!--                    id="email"-->
<!--                    type="email"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.email"-->
<!--                    required-->
<!--                    autocomplete="username"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div>-->
<!--                <InputLabel for="phone" value="Phone" />-->

<!--                <TextInput-->
<!--                    id="phone"-->
<!--                    type="text"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.phone"-->
<!--                    required-->
<!--                    autocomplete="phone"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.phone" />-->
<!--            </div>-->

<!--            <div v-if="mustVerifyEmail && user.email_verified_at === null">-->
<!--                <p class="text-sm mt-2 text-gray-800">-->
<!--                    Your email address is unverified.-->
<!--                    <Link-->
<!--                        :href="route('verification.send')"-->
<!--                        method="post"-->
<!--                        as="button"-->
<!--                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--                    >-->
<!--                        Click here to re-send the verification email.-->
<!--                    </Link>-->
<!--                </p>-->

<!--                <div-->
<!--                    v-show="status === 'verification-link-sent'"-->
<!--                    class="mt-2 font-medium text-sm text-green-600"-->
<!--                >-->
<!--                    A new verification link has been sent to your email address.-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="flex items-center gap-4">-->
<!--                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>-->

<!--                <Transition-->
<!--                    enter-active-class="transition ease-in-out"-->
<!--                    enter-from-class="opacity-0"-->
<!--                    leave-active-class="transition ease-in-out"-->
<!--                    leave-to-class="opacity-0"-->
<!--                >-->
<!--                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>-->
<!--                </Transition>-->
<!--            </div>-->
<!--        </form>-->
<!--    </section>-->
<!--</template>-->
