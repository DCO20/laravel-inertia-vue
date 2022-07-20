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
                        <div class="grid grid-cols-12 gap-4">
                            <div
                                class="
                                    flex flex-col
                                    col-span-full
                                    sm:col-span-6
                                    xl:col-span-4
                                    bg-white
                                    shadow-lg
                                    rounded-sm
                                    border border-slate-200
                                "
                            >
                                <div class="px-5 pt-5">
                                    <header
                                        class="
                                            flex
                                            justify-between
                                            items-start
                                            mb-2
                                        "
                                    >
                                        <img
                                            src="../../../../../public/img/icon-01.svg"
                                            width="32"
                                            height="32"
                                        />
                                        <div class="relative inline-flex">
                                            <button
                                                class="
                                                    text-slate-200
                                                    hover:text-slate-500
                                                    rounded-full
                                                    false
                                                "
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            ></button>
                                        </div>
                                    </header>
                                    <h2
                                        class="
                                            text-lg
                                            font-semibold
                                            text-slate-800
                                            mb-2
                                        "
                                    >
                                        Categorias
                                    </h2>
                                    <div
                                        class="
                                            text-xs
                                            font-semibold
                                            text-slate-400
                                            uppercase
                                            mb-1
                                        "
                                    >
                                        Total
                                    </div>
                                    <div class="flex items-start">
                                        <div
                                            class="
                                                text-3xl
                                                font-bold
                                                text-slate-800
                                                mr-2
                                            "
                                        >
                                            {{ categories }}
                                        </div>
                                    </div>
                                    <div
                                        class="
                                            mt-5
                                            mb-5
                                            text-sm
                                            font-semibold
                                            text-white
                                            px-2
                                            py-1
                                            bg-green-500
                                            rounded-full
                                        "
                                    >
                                        <Link :href="route('category.index')">Mais Informações</Link>
                                    </div>
                                </div>

                            </div>
                          <div
                                class="
                                    flex flex-col
                                    col-span-full
                                    sm:col-span-6
                                    xl:col-span-4
                                    bg-white
                                    shadow-lg
                                    rounded-sm
                                    border border-slate-200
                                "
                            >
                                <div class="px-5 pt-5">
                                    <header
                                        class="
                                            flex
                                            justify-between
                                            items-start
                                            mb-2
                                        "
                                    >
                                        <img
                                            src="../../../../../public/img/icon-02.svg"
                                            width="32"
                                            height="32"
                                        />
                                        <div class="relative inline-flex">
                                            <button
                                                class="
                                                    text-slate-400
                                                    hover:text-slate-500
                                                    rounded-full
                                                    false
                                                "
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            ></button>
                                        </div>
                                    </header>
                                    <h2
                                        class="
                                            text-lg
                                            font-semibold
                                            text-slate-800
                                            mb-2
                                        "
                                    >
                                        Postagens
                                    </h2>
                                    <div
                                        class="
                                            text-xs
                                            font-semibold
                                            text-slate-400
                                            uppercase
                                            mb-1
                                        "
                                    >
                                        Total
                                    </div>
                                    <div class="flex items-start">
                                        <div
                                            class="
                                                text-3xl
                                                font-bold
                                                text-slate-800
                                                mr-2
                                            "
                                        >
                                            7
                                        </div>
                                    </div>
                                    <div
                                        class="
                                            mt-5
                                            mb-5
                                            text-sm
                                            font-semibold
                                            text-white
                                            px-2
                                            py-1
                                            bg-green-500
                                            rounded-full
                                        "
                                    >
                                        Mais Informações
                                    </div>
                                </div>

                            </div>
                        </div>
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

const props = defineProps({
    categories: Array,
});
</script>
