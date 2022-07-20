<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <nav
                    class="
                        relative
                        flex flex-wrap
                        items-center
                        justify-between
                        py-1
                        bg-gray-100
                        text-gray-500
                        hover:text-gray-700
                        focus:text-gray-700
                        shadow-lg
                        navbar navbar-expand-lg navbar-light
                    "
                >
                    <div
                        class="
                            container-fluid
                            w-full
                            flex flex-wrap
                            items-center
                            justify-between
                            px-6
                        "
                    >
                        <nav
                            class="bg-grey-light rounded-md w-full"
                            aria-label="breadcrumb"
                        >
                            <ol class="list-reset flex">
                                <li>
                                    <Link
                                        :href="route('dashboard')"
                                        class="
                                            text-gray-500
                                            hover:text-gray-600
                                        "
                                        >Home</Link
                                    >
                                </li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
</script>
