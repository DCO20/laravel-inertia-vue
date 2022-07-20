<template>
    <div class="flex justify-end p-5">
        <template v-for="(link, key) in links" :key="key">
            <div
                v-if="link.url === null"
                v-html="link.label"
                class="
                    mb-1
                    mr-1
                    px-4
                    py-1
                    text-gray-400 text-sm
                    leading-4
                    border
                    rounded-full
                "
            ></div>
            <Link
                v-else
                :href="link.url"
                v-html="link.label"
                class="
                    mb-1
                    mr-1
                    px-4
                    py-1
                    text-sm
                    leading-4
                    outline-none
                    transition-all
                    duration-300
                    rounded-full
                    shadow-md
                    focus:shadow-md
                    hover:bg-blue-600 hover:text-white
                "
                :class="{
                    'border-0 bg-blue-600 outline-none transition-all duration-300 rounded-full text-white shadow-md focus:shadow-md':
                        link.active,
                }"
        /></template>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    links: Array,
});
</script>
