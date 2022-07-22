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
                                        >Editar Postagem</a
                                    >
                                </li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div
                    v-if="$page.props.flash.message"
                    class="
                        mt-5
                        bg-green-300
                        rounded-lg
                        py-2
                        mb-4
                        text-base text-green-800
                        alert
                    "
                >
                    <span class="ml-3">{{ $page.props.flash.message }}</span>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <form @submit.prevent="update">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Imagem:</label
                                        >
                                        <input
                                            @input="
                                                form.image =
                                                    $event.target.files[0]
                                            "
                                            type="file"
                                            class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1
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
                                        />
                                        <span
                                            class="text-red-500"
                                            v-if="errors.image"
                                            >{{ errors.image }}</span
                                        >
                                    </div>
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Título:</label
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
                                            v-if="errors.title"
                                            >{{ errors.title }}</span
                                        >
                                    </div>
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Publicado:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <select
                                            v-model="form.published"
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
                                            v-if="errors.published"
                                            >{{ errors.published }}</span
                                        >
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Resumo:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <textarea
                                            v-model="form.abstract"
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
                                                focus:border-blue-600
                                                focus:outline-none
                                            "
                                            required
                                        ></textarea>
                                        <span
                                            class="text-red-500"
                                            v-if="errors.abstract"
                                            >{{ errors.abstract }}</span
                                        >
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="form-group mb-6">
                                        <label class="font-semibold"
                                            >Descrição:</label
                                        >
                                        <span class="text-red-500">*</span>
                                        <textarea
                                            v-model="form.description"
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
                                                focus:border-blue-600
                                                focus:outline-none
                                            "
                                            required
                                        ></textarea>
                                        <span
                                            class="text-red-500"
                                            v-if="errors.description"
                                            >{{ errors.description }}</span
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
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        />
                                    </svg>
                                    <span class="ml-1">Editar</span>
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
    errors: Object,
    post: Object,
});

const form = useForm({
    title: props.post.title,
    image: null,
    published: "1",
    abstract: props.post.abstract,
    description: props.post.description,
});

function update() {
    form.put(route("post.update", props.post.id));
}
</script>
