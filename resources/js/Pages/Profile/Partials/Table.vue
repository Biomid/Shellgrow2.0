<template>
    <AuthenticatedLayout />
    <div class="min-h-screen h-full bg-[#ecf7f7] flex items-center justify-center sm:ml-64 mt-6 p-4">
        <div v-if="loading" role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
        <div v-else class="w-full bg-white max-w-4xl p-5 rounded-2xl shadow-lg">
            <div class="w-full overflow-x-scroll md:overflow-auto max-w-7xl 2xl:max-w-none mt-2">

                <div class="bg-white border-gray-200 dark:bg-gray-900">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto mb-3">
                        <div class="flex md:order-1">
                            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                            <div class="relative hidden md:block">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.06176 7.66957C5.48796 4.24494 8.82961 2.01028 12.5393 2.00037C16.5375 1.97932 20.0926 4.5403 21.339 8.33934C22.5853 12.1384 21.2381 16.3076 18.0044 18.6591C14.7707 21.0105 10.3893 21.007 7.15934 18.6504L4.27934 21.5304C3.98652 21.8228 3.51216 21.8228 3.21934 21.5304C2.92689 21.2376 2.92689 20.7632 3.21934 20.4704L6.00934 17.6804C3.40324 15.0402 2.63556 11.0942 4.06176 7.66957ZM5.39891 14.1693C6.59638 17.055 9.41508 18.9344 12.5393 18.9304V18.8904C16.7796 18.885 20.2219 15.4606 20.2493 11.2204C20.2534 8.09611 18.374 5.27742 15.4883 4.07994C12.6026 2.88247 9.27967 3.54232 7.07048 5.75152C4.86129 7.96071 4.20144 11.2836 5.39891 14.1693Z" fill="#2A2A2A"/>
                                    </svg>
                                    <span class="sr-only">Search icon</span>
                                </div>
                                <input v-model="searchTerm" @input="searchUsers" type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск по собственникам">
                            </div>
                            <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                                </svg>
                            </button>
                        </div>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-search">
                            <Link :href="route('user.create.form')" class="text-white bg-emerald-800 hover:bg-emerald-900 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55">
                                <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 12H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 18V6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Добавить собственника
                            </Link>
                            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <table class="table-auto overflow-scroll md:overflow-auto w-full text-left font-inter border">
                    <!-- Table headers -->
                    <thead class="rounded-lg text-base text-white font-semibold w-full">
                    <tr class="bg-[#F0F6F6]">
                        <th class="py-3 px-3 text-black text-sm font-medium whitespace-nowrap">
                            ID
                        </th>
                        <th class="py-3 px-3 text-black text-sm font-medium whitespace-nowrap">
                            ФИО собственника
                        </th>
                        <th class="py-3 px-3 justify-center gap-1 text-black text-sm font-medium whitespace-nowrap">
                            Телефон
                        </th>
                        <th class="py-3 px-3 text-black text-sm font-medium whitespace-nowrap">
                            E-mail
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Table rows -->
                        <tr v-for="(data, index) in rowsToShow" :key="index" @click="navigateToUserForm(data.id)" class="cursor-pointer">
                            <td class="py-2 px-3 font-normal text-sm" :class="[index === 0 ? 'border-t-2 border-stone-300' : 'border-t', index === rowsToShow.length ? 'border-y' : '']">
                                {{ data.id }}
                            </td>
                            <td class="py-2 px-3 text-sm font-medium" :class="[index === 0 ? 'border-t-2 border-stone-300' : 'border-t', index === rowsToShow.length ? 'border-y' : '']">
                                {{ data.name }}
                            </td>
                            <td class="py-2 px-3 text-sm font-medium" :class="[index === 0 ? 'border-t-2 border-stone-300' : 'border-t', index === rowsToShow.length ? 'border-y' : '']">
                                {{ data.phone }}
                            </td>
                            <td class="py-2 px-3 text-sm font-medium" :class="[index === 0 ? 'border-t-2 border-stone-300' : 'border-t', index === rowsToShow.length ? 'border-y' : '']">
                                {{ data.email }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="flex gap-5 justify-between self-stretch pr-2 mt-5 w-full text-sm whitespace-nowrap max-md:flex-wrap max-md:max-w-full"
            >
                <div class="flex gap-2.5 justify-between">
                    <div class="grow leading-5 text-slate-300">Показано на странице:</div>
                    <div class="flex gap-0 justify-center my-auto text-zinc-800">
                        <select
                            class="grow my-auto block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="rowsLimit"
                            @change="initializeTable"
                        >
                            <option v-for="pageSize in [2, 5, 10, 20]" :key="pageSize" :value="pageSize">
                                {{ pageSize }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-2.5 my-auto">
                    <div class="leading-[140%] text-slate-300">Всего</div>
                    <div class="text-zinc-800">{{ productList.length }}</div>
                </div>
                <ul
                    class="flex gap-4 justify-center py-px text-center leading-[164%] text-slate-300"
                >
                    <li :class="['prev-btn', 'flex items-center justify-center disabled', currentPage === 0 ? 'pointer-events-none' : ' cursor-pointer']" @click="previousPage">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.15 7.05009C15.2834 7.21675 15.3542 7.40009 15.3625 7.60009C15.3709 7.80009 15.3 7.97509 15.15 8.12509L10.75 12.5251L15.175 16.9501C15.3084 17.0834 15.3709 17.2626 15.3625 17.4876C15.3542 17.7126 15.2834 17.8918 15.15 18.0251C14.9834 18.1918 14.8042 18.2709 14.6125 18.2626C14.4209 18.2543 14.25 18.1751 14.1 18.0251L9.12505 13.0501C9.04171 12.9668 8.98338 12.8834 8.95005 12.8001C8.91671 12.7168 8.90005 12.6251 8.90005 12.5251C8.90005 12.4251 8.91671 12.3334 8.95005 12.2501C8.98338 12.1668 9.04171 12.0834 9.12505 12.0001L14.075 7.05009C14.225 6.90009 14.4 6.82926 14.6 6.83759C14.8 6.84592 14.9834 6.91675 15.15 7.05009Z" fill="#2A2A2A"/>
                            <path d="M15.15 7.05009C15.2834 7.21675 15.3542 7.40009 15.3625 7.60009C15.3709 7.80009 15.3 7.97509 15.15 8.12509L10.75 12.5251L15.175 16.9501C15.3084 17.0834 15.3709 17.2626 15.3625 17.4876C15.3542 17.7126 15.2834 17.8918 15.15 18.0251C14.9834 18.1918 14.8042 18.2709 14.6125 18.2626C14.4209 18.2543 14.25 18.1751 14.1 18.0251L9.12505 13.0501C9.04171 12.9668 8.98338 12.8834 8.95005 12.8001C8.91671 12.7168 8.90005 12.6251 8.90005 12.5251C8.90005 12.4251 8.91671 12.3334 8.95005 12.2501C8.98338 12.1668 9.04171 12.0834 9.12505 12.0001L14.075 7.05009C14.225 6.90009 14.4 6.82926 14.6 6.83759C14.8 6.84592 14.9834 6.91675 15.15 7.05009Z" fill="black" fill-opacity="0.2"/>
                        </svg>
                    </li>
                    <li v-for="(data, index) in customPagination" :key="index" :class="['flex items-center justify-center cursor-pointer', currentPage === index ? 'underline' : 'border-[#E4E4EB] ']" @click="changePage(index)">
                        {{ index + 1 }}
                    </li>
                    <li :class="['flex items-center justify-center', currentPage === totalPage - 1 ? 'pointer-events-none' : ' cursor-pointer']" @click="nextPage">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.84995 17.9499C8.71662 17.7832 8.64579 17.5999 8.63745 17.3999C8.62912 17.1999 8.69995 17.0249 8.84995 16.8749L13.25 12.4749L8.82495 8.04991C8.69162 8.91658 8.62912 7.73741 8.63745 7.51241C8.64579 7.28741 8.71662 7.10824 8.84995 6.97491C9.01662 6.80824 9.19579 6.72908 9.38745 6.73741C9.57912 6.74574 9.74995 6.82491 9.89995 6.97491L14.875 11.9499C14.9583 12.0332 15.0166 12.1166 15.05 12.1999C15.0833 12.2832 15.1 12.3749 15.1 12.4749C15.1 12.5749 15.0833 12.6666 15.05 12.7499C15.0166 12.8332 14.9583 12.9166 14.875 12.9999L9.92495 17.9499C9.77495 18.0999 9.59995 18.1707 9.39995 18.1624C9.19995 18.1541 9.01662 18.0832 8.84995 17.9499Z" fill="#2A2A2A"/>
                            <path d="M8.84995 17.9499C8.71662 17.7832 8.64579 17.5999 8.63745 17.3999C8.62912 17.1999 8.69995 17.0249 8.84995 16.8749L13.25 12.4749L8.82495 8.04991C8.69162 8.91658 8.62912 7.73741 8.63745 7.51241C8.64579 7.28741 8.71662 7.10824 8.84995 6.97491C9.01662 6.80824 9.19579 6.72908 9.38745 6.73741C9.57912 6.74574 9.74995 6.82491 9.89995 6.97491L14.875 11.9499C14.9583 12.0332 15.0166 12.1166 15.05 12.1999C15.0833 12.2832 15.1 12.3749 15.1 12.4749C15.1 12.5749 15.0833 12.6666 15.05 12.7499C15.0166 12.8332 14.9583 12.9166 14.875 12.9999L9.92495 17.9499C9.77495 18.0999 9.59995 18.1707 9.39995 18.1624C9.19995 18.1541 9.01662 18.0832 8.84995 17.9499Z" fill="black" fill-opacity="0.2"/>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <AuthenticatedLayout />
</template>

<script>
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: { UpdateProfileInformationForm, AuthenticatedLayout, Link },
    data() {
        return {
            productList: [],
            rowsLimit: 5,
            rowsToShow: [],
            customPagination: [],
            totalPage: 0,
            currentPage: 0,
            searchTerm: "",
            loading: false,
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            try {
                this.loading = true;
                const response = await axios.get('/api/owners');
                this.productList = response.data;
                this.initializeTable();
            } catch (error) {
                console.error('Error fetching users:', error);
                this.loading = false;
            } finally {
                this.loading = false
            }
        },
        searchUsers() {
            const searchTerm = this.searchTerm.toLowerCase();
            this.rowsToShow = this.productList.filter((user) => {
                const lowerCasePhone = user.phone.toLowerCase(); // Convert phone to lowercase for case-insensitive search

                // Check if the searchTerm matches the name, email, or formatted phone
                return (
                    user.name.toLowerCase().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm) ||
                    lowerCasePhone.includes(searchTerm) ||
                    lowerCasePhone.replace(/\D/g, "").includes(searchTerm) // Also check phone without non-digit characters
                );
            });
        },
        nextPage() {
            const startIndex = this.rowsLimit * (this.currentPage + 1);
            const endIndex = startIndex + this.rowsLimit;
            this.rowsToShow = this.productList.slice(startIndex, endIndex);
            this.currentPage += 1;
        },
        changePage(value) {
            const startIndex = value * this.rowsLimit;
            const endIndex = startIndex + this.rowsLimit;
            this.rowsToShow = this.productList.slice(startIndex, endIndex);
            this.currentPage = value;
        },
        previousPage() {
            const startIndex = (this.currentPage - 1) * this.rowsLimit;
            const endIndex = startIndex + this.rowsLimit;
            this.rowsToShow = this.productList.slice(startIndex, endIndex);
            if (this.currentPage > 1) {
                this.currentPage -= 1;
            } else {
                this.currentPage = 0;
            }
        },
        initializeTable() {
            const filteredUsers = this.productList.filter((user) => {
                const searchRegex = new RegExp(this.searchTerm, "i");
                return (
                    searchRegex.test(user.name) ||
                    searchRegex.test(user.phone) ||
                    searchRegex.test(user.email)
                );
            });

            this.rowsToShow = filteredUsers.slice(0, this.rowsLimit);
            this.totalPage = Math.ceil(filteredUsers.length / this.rowsLimit);
            this.customPagination = Array(this.totalPage).fill(null);
            this.currentPage = 0;
        },
        navigateToUserForm(id) {
            this.$inertia.visit(route('user', id));
        }
    },
};
</script>
