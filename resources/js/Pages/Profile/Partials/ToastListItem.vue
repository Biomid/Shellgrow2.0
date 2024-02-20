<script setup>
defineProps({
    errorMessage: {
        type: [String, Object],
    },
});
</script>

<template>
    <div v-show="errorMessage" class="container mx-auto mt-10 space-y-5">
        <div class="flex justify-between shadow-inner p-4 text-sm text-white rounded-lg bg-rose-400">
            <svg class="flex-shrink-0 inline me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <p class="self-center font-medium">
                {{ typeof errorMessage === 'object' ? Object.values(errorMessage).join(', ') : errorMessage }}
            </p>

            <button class="text-xl align-center cursor-pointer alert-del ml-10">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.16992 14.8299L14.8299 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.8299 14.8299L9.16992 9.16992" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</template>

