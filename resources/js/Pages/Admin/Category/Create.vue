<template>
    <Head title="Categoria" />

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
                                <li>
                                    <span class="text-gray-500 mx-2">/</span>
                                </li>
                                <li>
                                    <Link
                                        :href="route('category.index')"
                                        class="
                                            text-gray-500
                                            hover:text-gray-600
                                        "
                                        >Categorias</Link
                                    >
                                </li>
                                <li>
                                    <span class="text-gray-500 mx-2">/</span>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="
                                            text-gray-500
                                            hover:text-gray-600
                                        "
                                        >Cadastrar Categoria</a
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
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <form @submit.prevent="store">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Nome:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding
                                                border
                                                border-solid
                                                border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700
                                                focus:bg-white
                                                focus:border-green-600
                                                focus:outline-none
                                            "
                                            required
                                        />
                                        <span
                                            class="text-red-500"
                                            v-if="errors.name"
                                            >{{ errors.name }}</span
                                        >
                                    </div>
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Ativo:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <select
                                            v-model="form.active"
                                            class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding
                                                border
                                                border-solid
                                                border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700
                                                focus:bg-white
                                                focus:border-green-600
                                                focus:outline-none
                                            "
                                            required
                                        >
                                            <option selected value="1">
                                                Sim
                                            </option>
                                            <option value="0">Não</option>
                                        </select>
                                        <span
                                            class="text-red-500"
                                            v-if="errors.active"
                                            >{{ errors.active }}</span
                                        >
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="
                                        flex
                                        items-center
                                        px-6
                                        py-2.5
                                        bg-green-600
                                        text-white
                                        font-medium
                                        text-xs
                                        leading-tight
                                        uppercase
                                        rounded
                                        shadow-md
                                        hover:bg-green-700 hover:shadow-lg
                                        focus:bg-green-700
                                        focus:shadow-lg
                                        focus:outline-none
                                        focus:ring-0
                                        active:bg-green-800 active:shadow-lg
                                        transition
                                        duration-150
                                        ease-in-out
                                    "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    <span class="ml-1">Cadastrar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    active: "1",
});

function store() {
    form.post(route("category.store"));
}

const props = defineProps({
    errors: Object,
});
</script>
