<template>
    <Head title="Postagem" />

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
                                        :href="route('post.index')"
                                        class="
                                            text-gray-500
                                            hover:text-gray-600
                                        "
                                        >Postagens</Link
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
                                        >Excluir Postagem</a
                                    >
                                </li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </div>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <form @submit.prevent="destroy">
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Nome:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <input
                                            v-model="form.title"
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
                                                bg-gray-100 bg-clip-padding
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0

                                            "
                                            readonly
                                        />

                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="
                                        flex
                                        items-center
                                        px-6
                                        py-2.5
                                        bg-red-600
                                        text-white
                                        font-medium
                                        text-xs
                                        leading-tight
                                        uppercase
                                        rounded
                                        shadow-md
                                        hover:bg-red-700 hover:shadow-lg
                                        focus:bg-green-700
                                        focus:shadow-lg
                                        focus:outline-none
                                        focus:ring-0
                                        active:bg-red-800 active:shadow-lg
                                        transition
                                        duration-150
                                        ease-in-out
                                    "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                    <span class="ml-1">Excluir</span>
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

const props = defineProps({
    post: Object,
});

const form = useForm({
    title: props.post.title,
});

function destroy() {
    form.delete(route("post.delete", props.post.id));
}
</script>
