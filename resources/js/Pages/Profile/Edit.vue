<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import BankDetails from "./Partials/BankDetails.vue";
import MyAgent from "./Partials/MyAgent.vue";
import { Head } from '@inertiajs/vue3';
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";

export default {
    name: "tabs",
    components: {UpdateProfileInformationForm, AuthenticatedLayout, Head, UpdatePasswordForm, BankDetails, MyAgent},
    data() {
        return {
            openTab: 1
        }
    },
    methods: {
        toggleTabs: function(tabNumber){
            this.openTab = tabNumber
        }
    }
}
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div class="p-4 bg-[#ecf7f7] h-screen sm:ml-64 mt-6">
            <div class="p-4 mt-6">
                <div class="flex gap-5 max-md:flex-col max-md:gap-0 max-md: mt-6">
                    <div class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col text-base font-medium leading-5 text-emerald-900 max-md:mt-5">
                            <button
                                class="flex gap-5 justify-between px-5 py-5 rounded-xl shadow-sm"
                                v-on:click="toggleTabs(1)" v-bind:class="{'bg-white hover:bg-gray-200': openTab !== 1, 'text-white bg-emerald-900': openTab === 1}"
                            >
                                <div class="self-start mt-1">Мои данные</div>
                                <svg
                                    class="w-6 aspect-square"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008"
                                        :stroke="openTab === 1 ? 'white' : '#014745'"
                                        stroke-width="1.5"
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                v-if="$page.props.auth.user.roles[0] === 'owner'"
                                class="flex gap-5 justify-between px-5 py-5 mt-2.5 rounded-xl shadow-sm"
                                v-on:click="toggleTabs(2)" v-bind:class="{'bg-white hover:bg-gray-200': openTab !== 2, 'text-white bg-emerald-900': openTab === 2}"
                            >
                                <div class="self-start mt-1">Банковские реквизиты</div>
                                <svg
                                    class="w-6 aspect-square"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008"
                                        :stroke="openTab === 2 ? 'white' : '#014745'"
                                        stroke-width="1.5"
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                class="flex gap-5 justify-between px-5 py-5 mt-2.5 rounded-xl shadow-sm"
                                v-on:click="toggleTabs(3)" v-bind:class="{'bg-white hover:bg-gray-200': openTab !== 3, 'text-white bg-emerald-900': openTab === 3}"
                            >
                                <div class="self-start mt-1">Мой пароль</div>
                                <svg
                                    class="w-6 aspect-square"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008"
                                        :stroke="openTab === 3 ? 'white' : '#014745'"
                                        stroke-width="1.5"
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                v-if="$page.props.auth.user.roles[0] === 'owner'"
                                class="flex gap-5 justify-between px-5 py-5 mt-2.5 rounded-xl shadow-sm"
                                v-on:click="toggleTabs(4)" v-bind:class="{'bg-white bg-white hover:bg-gray-200': openTab !== 4, 'text-white bg-emerald-900': openTab === 4}"
                            >
                                <div class="self-start mt-1">Мой агент</div>
                                <svg
                                    class="w-6 aspect-square"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008"
                                        :stroke="openTab === 4 ? 'white' : '#014745'"
                                        stroke-width="1.5"
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
<!--                    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">-->
<!--                        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">-->
<!--                            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">-->
<!--                                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">-->
<!--                                    Мои данные-->
<!--                                </div>-->
<!--                                <div-->
<!--                                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-5 rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
<!--                                >-->
<!--                                    <div class="text-xs text-neutral-400">Фамилия, имя, отчество</div>-->
<!--                                    <div class="text-sm whitespace-nowrap text-zinc-800">-->
<!--                                        Собственников Собственник Собственникович-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div-->
<!--                                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
<!--                                >-->
<!--                                    <div class="text-xs text-neutral-400">Телефон</div>-->
<!--                                    <div class="text-sm text-zinc-800">-->
<!--                                        <span class="text-zinc-800">+7 </span-->
<!--                                        ><span class="text-zinc-800">7778901122</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div-->
<!--                                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap bg-white rounded-lg border border-solid border-stone-300 max-md:pr-5 max-md:max-w-full"-->
<!--                                >-->
<!--                                    <div class="text-xs text-neutral-400">E-mail</div>-->
<!--                                    <div class="text-sm text-zinc-800">sobstvennik@gmail.com</div>-->
<!--                                </div>-->
<!--                                <div-->
<!--                                    class="flex flex-col items-start py-1.5 pr-20 pl-4 mt-4 whitespace-nowrap rounded-lg border border-solid bg-neutral-100 border-stone-300 max-md:pr-5 max-md:max-w-full"-->
<!--                                >-->
<!--                                    <div class="text-xs text-neutral-400">Дата рождения</div>-->
<!--                                    <div class="text-sm text-zinc-800">01.01.1980</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <button-->
<!--                                class="justify-center self-start px-11 py-3.5 mt-5 text-sm font-medium leading-4 text-center text-white whitespace-nowrap rounded-lg bg-emerald-900 max-md:px-5"-->
<!--                            >-->
<!--                                Сохранить изменения-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <UpdateProfileInformationForm-->
<!--                        class="max-w-xl"-->
<!--                    />-->
                    <template v-if="openTab === 1">
                        <UpdateProfileInformationForm class="max-w-xl" />
                    </template>
                    <template v-if="openTab === 2">
                        <BankDetails class="max-w-xl" />
                    </template>
                    <template v-else-if="openTab === 3">
                        <UpdatePasswordForm class="max-w-xl" />
                    </template>
                    <template v-else-if="openTab === 4">
                        <MyAgent class="max-w-xl" />
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<!--<script setup>-->
<!--import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';-->
<!--import DeleteUserForm from './Partials/DeleteUserForm.vue';-->
<!--import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';-->
<!--import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';-->
<!--import { Head } from '@inertiajs/vue3';-->
<!--import { onMounted } from 'vue';-->

<!--defineProps({-->
<!--    mustVerifyEmail: {-->
<!--        type: Boolean,-->
<!--    },-->
<!--    status: {-->
<!--        type: String,-->
<!--    },-->
<!--});-->

<!--</script>-->

<!--<template>-->
<!--    <Head title="Profile" />-->

<!--    <AuthenticatedLayout>-->

<!--        <div class="p-4 bg-[#ecf7f7] h-screen sm:ml-64 mt-6">-->
<!--            <div class="py-12">-->
<!--                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-20">-->
<!--                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">-->
<!--                        <UpdateProfileInformationForm-->
<!--                            :must-verify-email="mustVerifyEmail"-->
<!--                            :status="status"-->
<!--                            class="max-w-xl"-->
<!--                        />-->
<!--                    </div>-->

<!--                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">-->
<!--                        <UpdatePasswordForm class="max-w-xl" />-->
<!--                    </div>-->

<!--                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">-->
<!--                        <DeleteUserForm class="max-w-xl" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </AuthenticatedLayout>-->
<!--</template>-->


