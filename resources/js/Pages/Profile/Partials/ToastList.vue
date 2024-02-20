<script setup>
import ToastListItem from "@/Pages/Profile/Partials/ToastListItem.vue";

const props = defineProps({
    formErrors: {
        type: Object
    },
});

</script>

<template>
    <div class="fixed bottom-5 right-5 z-50 space-y-4">
        <ToastListItem v-for="(error, index) in formErrors" :key="index" :errorMessage="error"/>
    </div>
</template>
