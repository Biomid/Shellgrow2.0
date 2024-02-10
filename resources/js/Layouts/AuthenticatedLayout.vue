<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
<!--    <div>-->
<!--        <div class="min-h-screen bg-gray-100">-->
<!--            <nav class="bg-white border-b border-gray-100">-->
<!--                &lt;!&ndash; Primary Navigation Menu &ndash;&gt;-->
<!--                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--                    <div class="flex justify-between h-16">-->
<!--                        <div class="flex">-->
<!--                            &lt;!&ndash; Logo &ndash;&gt;-->
<!--                            <div class="shrink-0 flex items-center">-->
<!--                                <Link :href="route('dashboard')">-->
<!--                                    <ApplicationLogo-->
<!--                                        class="block h-9 w-auto fill-current text-gray-800"-->
<!--                                    />-->
<!--                                </Link>-->
<!--                            </div>-->

<!--                            &lt;!&ndash; Navigation Links &ndash;&gt;-->
<!--                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">-->
<!--                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                                    Dashboard-->
<!--                                </NavLink>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="hidden sm:flex sm:items-center sm:ms-6">-->
<!--                            &lt;!&ndash; Settings Dropdown &ndash;&gt;-->
<!--                            <div class="ms-3 relative">-->
<!--                                <Dropdown align="right" width="48">-->
<!--                                    <template #trigger>-->
<!--                                        <span class="inline-flex rounded-md">-->
<!--                                            <button-->
<!--                                                type="button"-->
<!--                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"-->
<!--                                            >-->
<!--                                                {{ $page.props.auth.user.name }}-->

<!--                                                <svg-->
<!--                                                    class="ms-2 -me-0.5 h-4 w-4"-->
<!--                                                    xmlns="http://www.w3.org/2000/svg"-->
<!--                                                    viewBox="0 0 20 20"-->
<!--                                                    fill="currentColor"-->
<!--                                                >-->
<!--                                                    <path-->
<!--                                                        fill-rule="evenodd"-->
<!--                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"-->
<!--                                                        clip-rule="evenodd"-->
<!--                                                    />-->
<!--                                                </svg>-->
<!--                                            </button>-->
<!--                                        </span>-->
<!--                                    </template>-->

<!--                                    <template #content>-->
<!--                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>-->
<!--                                        <DropdownLink :href="route('logout')" method="post" as="button">-->
<!--                                            Log Out-->
<!--                                        </DropdownLink>-->
<!--                                    </template>-->
<!--                                </Dropdown>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash; Hamburger &ndash;&gt;-->
<!--                        <div class="-me-2 flex items-center sm:hidden">-->
<!--                            <button-->
<!--                                @click="showingNavigationDropdown = !showingNavigationDropdown"-->
<!--                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"-->
<!--                            >-->
<!--                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">-->
<!--                                    <path-->
<!--                                        :class="{-->
<!--                                            hidden: showingNavigationDropdown,-->
<!--                                            'inline-flex': !showingNavigationDropdown,-->
<!--                                        }"-->
<!--                                        stroke-linecap="round"-->
<!--                                        stroke-linejoin="round"-->
<!--                                        stroke-width="2"-->
<!--                                        d="M4 6h16M4 12h16M4 18h16"-->
<!--                                    />-->
<!--                                    <path-->
<!--                                        :class="{-->
<!--                                            hidden: !showingNavigationDropdown,-->
<!--                                            'inline-flex': showingNavigationDropdown,-->
<!--                                        }"-->
<!--                                        stroke-linecap="round"-->
<!--                                        stroke-linejoin="round"-->
<!--                                        stroke-width="2"-->
<!--                                        d="M6 18L18 6M6 6l12 12"-->
<!--                                    />-->
<!--                                </svg>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                &lt;!&ndash; Responsive Navigation Menu &ndash;&gt;-->
<!--                <div-->
<!--                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"-->
<!--                    class="sm:hidden"-->
<!--                >-->
<!--                    <div class="pt-2 pb-3 space-y-1">-->
<!--                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                            Dashboard-->
<!--                        </ResponsiveNavLink>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; Responsive Settings Options &ndash;&gt;-->
<!--                    <div class="pt-4 pb-1 border-t border-gray-200">-->
<!--                        <div class="px-4">-->
<!--                            <div class="font-medium text-base text-gray-800">-->
<!--                                {{ $page.props.auth.user.name }}-->
<!--                            </div>-->
<!--                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>-->
<!--                        </div>-->

<!--                        <div class="mt-3 space-y-1">-->
<!--                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>-->
<!--                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">-->
<!--                                Log Out-->
<!--                            </ResponsiveNavLink>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </nav>-->

<!--            &lt;!&ndash; Page Heading &ndash;&gt;-->
<!--            <header class="bg-white shadow" v-if="$slots.header">-->
<!--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">-->
<!--                    <slot name="header" />-->
<!--                </div>-->
<!--            </header>-->

<!--            &lt;!&ndash; Page Content &ndash;&gt;-->
<!--            <main>-->
<!--                <slot />-->
<!--            </main>-->
<!--        </div>-->
<!--    </div>-->

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img
                            loading="lazy"
                            src="../assets/logo_1.png"
                            class="aspect-[2.73] object-contain object-center w-[160px] overflow-hidden self-center ml-0 max-w-[202px]"
                        />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center space-x-6 ms-3">
                        <div>
                            <div class="text-sm font-bold text-zinc-800">{{ $page.props.auth.user.name }}</div>
                            <div class="text-[#878787] text-xs leading-4 whitespace-nowrap text-right">
                                {{ $page.props.auth.user.roles[0] }}
                            </div>
                        </div>

                        <div>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                <div
                                    class="justify-center items-center bg-[#ac9b6d] self-stretch flex aspect-square flex-col w-10 h-10 px-2 rounded-lg"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17.4395 14.62L19.9995 12.06L17.4395 9.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.75977 12.0601H19.9298" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.7598 20C7.33977 20 3.75977 17 3.75977 12C3.75977 7 7.33977 4 11.7598 4" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </ResponsiveNavLink>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li v-if="$page.props.auth.user.permissions.includes('view main')">
                    <Link href="#">
                        <div class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M17.5401 8.30989C18.8987 8.30989 20.0001 7.20851 20.0001 5.84989C20.0001 4.49127 18.8987 3.38989 17.5401 3.38989C16.1814 3.38989 15.0801 4.49127 15.0801 5.84989C15.0801 7.20851 16.1814 8.30989 17.5401 8.30989Z" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.46001 8.30989C7.81863 8.30989 8.92 7.20851 8.92 5.84989C8.92 4.49127 7.81863 3.38989 6.46001 3.38989C5.10139 3.38989 4 4.49127 4 5.84989C4 7.20851 5.10139 8.30989 6.46001 8.30989Z" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.5401 20.6099C18.8987 20.6099 20.0001 19.5086 20.0001 18.1499C20.0001 16.7913 18.8987 15.6899 17.5401 15.6899C16.1814 15.6899 15.0801 16.7913 15.0801 18.1499C15.0801 19.5086 16.1814 20.6099 17.5401 20.6099Z" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.46001 20.6099C7.81863 20.6099 8.92 19.5086 8.92 18.1499C8.92 16.7913 7.81863 15.6899 6.46001 15.6899C5.10139 15.6899 4 16.7913 4 18.1499C4 19.5086 5.10139 20.6099 6.46001 20.6099Z" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Главная</span>
                        </div>
                    </Link>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view pricing formation')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6.88086 18.1501V16.0801" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 18.15V14.01" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1191 18.1499V11.9299" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1209 5.8501L16.6609 6.3901C14.1109 9.3701 10.6909 11.4801 6.88086 12.4301" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M14.1895 5.8501H17.1195V8.7701" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Ценообразование</span>
                    </a>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view sales')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 8.50488H22" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 16.5049H8" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 16.5049H14.5" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.44 3.50488H17.55C21.11 3.50488 22 4.38488 22 7.89488V16.1049C22 19.6149 21.11 20.4949 17.56 20.4949H6.44C2.89 20.5049 2 19.6249 2 16.1149V7.89488C2 4.38488 2.89 3.50488 6.44 3.50488Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Продажи</span>
                    </a>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view bookings')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 8.50488H22" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 16.5049H8" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 16.5049H14.5" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.44 3.50488H17.55C21.11 3.50488 22 4.38488 22 7.89488V16.1049C22 19.6149 21.11 20.4949 17.56 20.4949H6.44C2.89 20.5049 2 19.6249 2 16.1149V7.89488C2 4.38488 2.89 3.50488 6.44 3.50488Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Бронирования</span>
                    </a>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view owners')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9.16055 10.87C9.06055 10.86 8.94055 10.86 8.83055 10.87C6.45055 10.79 4.56055 8.84 4.56055 6.44C4.56055 3.99 6.54055 2 9.00055 2C11.4505 2 13.4405 3.99 13.4405 6.44C13.4305 8.84 11.5405 10.79 9.16055 10.87Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.4093 4C18.3493 4 19.9093 5.57 19.9093 7.5C19.9093 9.39 18.4093 10.93 16.5393 11C16.4593 10.99 16.3693 10.99 16.2793 11" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.1607 14.56C1.7407 16.18 1.7407 18.82 4.1607 20.43C6.9107 22.27 11.4207 22.27 14.1707 20.43C16.5907 18.81 16.5907 16.17 14.1707 14.56C11.4307 12.73 6.9207 12.73 4.1607 14.56Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.3398 20C19.0598 19.85 19.7398 19.56 20.2998 19.13C21.8598 17.96 21.8598 16.03 20.2998 14.86C19.7498 14.44 19.0798 14.16 18.3698 14" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Собственники</span>
                    </a>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view apartments')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 22H22" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.94922 22L2.99922 9.96999C2.99922 9.35999 3.28922 8.78004 3.76922 8.40004L10.7692 2.95003C11.4892 2.39003 12.4992 2.39003 13.2292 2.95003L20.2292 8.39003C20.7192 8.77003 20.9992 9.34999 20.9992 9.96999V22" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                            <path d="M15.5 11H8.5C7.67 11 7 11.67 7 12.5V22H17V12.5C17 11.67 16.33 11 15.5 11Z" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 16.25V17.75" stroke="#2A2A2A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 7.5H13.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Объекты</span>
                    </a>
                </li>
                <li v-if="$page.props.auth.user.permissions.includes('view users')">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.9695 14.4399C18.3395 14.6699 19.8495 14.4299 20.9095 13.7199C22.3195 12.7799 22.3195 11.2399 20.9095 10.2999C19.8395 9.58992 18.3095 9.34991 16.9395 9.58991" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.96852 7.16C6.02852 7.15 6.09852 7.15 6.15852 7.16C7.53852 7.11 8.63852 5.98 8.63852 4.58C8.63852 3.15 7.48852 2 6.05852 2C4.62852 2 3.47852 3.16 3.47852 4.58C3.48852 5.98 4.58852 7.11 5.96852 7.16Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.99945 14.4399C5.62945 14.6699 4.11945 14.4299 3.05945 13.7199C1.64945 12.7799 1.64945 11.2399 3.05945 10.2999C4.12945 9.58992 5.65945 9.34991 7.02945 9.58991" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0001 14.63C11.9401 14.62 11.8701 14.62 11.8101 14.63C10.4301 14.58 9.33008 13.45 9.33008 12.05C9.33008 10.62 10.4801 9.46997 11.9101 9.46997C13.3401 9.46997 14.4901 10.63 14.4901 12.05C14.4801 13.45 13.3801 14.59 12.0001 14.63Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.0907 17.7799C7.6807 18.7199 7.6807 20.2599 9.0907 21.1999C10.6907 22.2699 13.3107 22.2699 14.9107 21.1999C16.3207 20.2599 16.3207 18.7199 14.9107 17.7799C13.3207 16.7199 10.6907 16.7199 9.0907 17.7799Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Пользователи</span>
                    </a>
                </li>

            </ul>
            <ul v-if="$page.props.auth.user.permissions.includes('view profile')" class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
                <li>
                    <Link :href="route('profile.edit')">
                        <div class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#ecf7f7] group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22" stroke="#2A2A2A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="flex-1 text-neutral-800 text-sm font-medium leading-4 self-center grow whitespace-nowrap my-auto ms-3">Мой профиль</span>
                        </div>
                    </Link>

                </li>
            </ul>
        </div>
    </aside>

    <main>
        <slot />
    </main>

</template>
