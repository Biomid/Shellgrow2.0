<script setup>

import TextInput from "@/Components/TextInput.vue";
</script>

<template>
    <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
        <div class="flex flex-col grow max-md:mt-5 max-md:max-w-full">
            <div class="flex flex-col p-5 bg-white rounded-xl shadow-sm leading-[120%] max-md:max-w-full">
                <div class="text-base font-medium text-emerald-900 max-md:max-w-full">
                    Мой агент
                </div>
                <form class="space-y-6">
                    <div class="flex items-center gap-4 mt-3">
                        <img class="w-20 h-20 rounded-full" src="../../../assets/agent_icon.png" alt="">
                        <div class="font-medium ml-4">
                            <div>Агент Агентов</div>
                        </div>
                    </div>
                    <div>
                        <TextInput id="agent_phone" type="text" class="mt-1 block w-full"
                                   label="Телефон" required autofocus autocomplete="name"/>
                    </div>
                    <div>
                        <TextInput id="agent_email" type="email" class="mt-1 block w-full" label="E-mail"
                                   required autocomplete="username"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
