<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { format } from 'date-fns';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const formattedDob = ref(format(new Date(user.dob), 'dd.MM.yyyy'));

const form = useForm({
    name: user.name,
    email: user.email,
    dob: formattedDob.value,
    phone: user.phone
});

onMounted(() => {
    formattedDob.value = format(new Date(user.dob), 'dd.MM.yyyy');
});
</script>

<template>
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

    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                    Мои данные
                </div>
                <form @submit.prevent="form.patch(route('profile.update'))" class="space-y-6">
                    <div v-if="$page.props.auth.user.roles[0] === 'agent'" class="relative mt-3">
                        <label title="Click to upload" for="button2">
                            <img src="../../../assets/upload.png" class="aspect-[3.7] cursor-pointer"/>
                        </label>
                        <input hidden="" type="file" name="button2" id="button2">
                    </div>


                    <div>
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                            label="Фамилия, имя, отчество" required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.phone" label="Телефон"
                            required autocomplete="username" />
                    </div>
                    <div>
                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" label="E-mail"
                            required autocomplete="username" />
                    </div>
                    <div>
                        <TextInput v-if="$page.props.auth.user.roles[0] !== 'agent'" id="email" type="email"
                            class="mt-1 block w-full" v-model="form.dob" label="Дата рождения" required
                            autocomplete="username" />
                    </div>

                    <button :disabled="form.processing"
                        class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5">
                        Сохранить изменения
                    </button>

                </form>
                <!--                <div-->
                <!--                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-5 rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
                <!--                >-->
                <!--                    <div class="text-xs text-neutral-400">Фамилия, имя, отчество</div>-->
                <!--                    <div class="text-sm whitespace-nowrap text-zinc-800">-->
                <!--                        Собственников Собственник Собственникович-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div-->
                <!--                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
                <!--                >-->
                <!--                    <div class="text-xs text-neutral-400">Телефон</div>-->
                <!--                    <div class="text-sm text-zinc-800">-->
                <!--                                        <span class="text-zinc-800">+7 </span-->
                <!--                                        ><span class="text-zinc-800">7778901122</span>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div-->
                <!--                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
                <!--                >-->
                <!--                    <div class="text-xs text-neutral-400">E-mail</div>-->
                <!--                    <div class="text-sm text-zinc-800">sobstvennik@gmail.com</div>-->
                <!--                </div>-->
                <!--                <div-->
                <!--                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
                <!--                >-->
                <!--                    <div class="text-xs text-neutral-400">Дата рождения</div>-->
                <!--                    <div class="text-sm text-zinc-800">01.01.1980</div>-->
                <!--                </div>-->
            </div>
        </div>
    </div>

    <!--        <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">-->
    <!--            <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">-->
    <!--                <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">-->
    <!--                    <div class="text-base font-medium text-emerald-900 max-md:max-w-full">-->
    <!--                        Мои данные-->
    <!--                    </div>-->
    <!--                    <div-->
    <!--                        class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-5 rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
    <!--                    >-->
    <!--                        <div class="text-xs text-neutral-400">Фамилия, имя, отчество</div>-->
    <!--                        <div class="text-sm whitespace-nowrap text-zinc-800">-->
    <!--                            Собственников Собственник Собственникович-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div-->
    <!--                        class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
    <!--                    >-->
    <!--                        <div class="text-xs text-neutral-400">Телефон</div>-->
    <!--                        <div class="text-sm text-zinc-800">-->
    <!--                                        <span class="text-zinc-800">+7 </span-->
    <!--                                        ><span class="text-zinc-800">7778901122</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div-->
    <!--                        class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
    <!--                    >-->
    <!--                        <div class="text-xs text-neutral-400">E-mail</div>-->
    <!--                        <div class="text-sm text-zinc-800">sobstvennik@gmail.com</div>-->
    <!--                    </div>-->
    <!--                    <div-->
    <!--                        class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
    <!--                    >-->
    <!--                        <div class="text-xs text-neutral-400">Дата рождения</div>-->
    <!--                        <div class="text-sm text-zinc-800">01.01.1980</div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <button-->
    <!--                    class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5"-->
    <!--                >-->
    <!--                    Сохранить изменения-->
    <!--                </button>-->
    <!--            </div>-->
    <!--        </div>-->
</template>
