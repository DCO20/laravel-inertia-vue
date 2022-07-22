<template>
    <Head title="Postagem" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between  ">
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
                            </ol>
                        </nav>
                    </div>
                </nav>
                <Link
                    :href="route('post.create')"
                    class="
                        flex
                        items-center
                        text-white
                        py-1
                        px-4
                        rounded
                        bg-blue-500
                        hover:bg-blue-600
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
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                    </svg>
                    Cadastrar</Link
                >
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

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div
                                    class="
                                        py-2
                                        inline-block
                                        min-w-full
                                        sm:px-6
                                        lg:px-8
                                    "
                                >
                                    <div class="overflow-hidden">
                                        <table class="min-w-full">
                                            <thead class="border-b">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="
                                                            text-sm
                                                            font-medium
                                                            text-gray-900
                                                            px-6
                                                            py-4
                                                            text-left
                                                        "
                                                    >
                                                        Imagem
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="
                                                            text-sm
                                                            font-medium
                                                            text-gray-900
                                                            px-6
                                                            py-4
                                                            text-left
                                                        "
                                                    >
                                                        Nome
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="
                                                            text-sm
                                                            font-medium
                                                            text-gray-900
                                                            px-6
                                                            py-4
                                                            text-left
                                                        "
                                                    >
                                                        Url
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="
                                                            text-sm
                                                            font-medium
                                                            text-gray-900
                                                            px-6
                                                            py-4
                                                            text-left
                                                        "
                                                    >
                                                        Ativo
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="
                                                            text-sm
                                                            font-medium
                                                            text-gray-900
                                                            px-6
                                                            py-4
                                                            text-left
                                                        "
                                                    >
                                                        Ações
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                v-for="post in posts.data"
                                                :key="post.id"
                                            >
                                                <tr class="border-b">
                                                    <td
                                                        class="
                                                            text-sm
                                                            text-gray-900
                                                            font-light
                                                            px-6
                                                            py-4
                                                            whitespace-nowrap
                                                        "
                                                    >
                                                        <img
                                                            class="
                                                                w-10
                                                                h-10
                                                                rounded-full
                                                            "
                                                            :src="image"
                                                            :alt="post.title"
                                                        />
                                                    </td>
                                                    <td
                                                        class="
                                                            text-sm
                                                            text-gray-900
                                                            font-light
                                                            px-6
                                                            py-4
                                                            whitespace-nowrap
                                                        "
                                                    >
                                                        {{ post.title }}
                                                    </td>
                                                    <td
                                                        class="
                                                            text-sm
                                                            text-gray-900
                                                            font-light
                                                            px-6
                                                            py-4
                                                            whitespace-nowrap
                                                        "
                                                    >
                                                        {{ post.url }}
                                                    </td>
                                                    <td
                                                        class="
                                                            text-sm
                                                            text-gray-900
                                                            font-light
                                                            px-6
                                                            py-4
                                                            whitespace-nowrap
                                                        "
                                                    >
                                                        <span
                                                            v-if="
                                                                post.published ==
                                                                true
                                                            "
                                                            class="
                                                                text-xs
                                                                inline-block
                                                                py-1
                                                                px-2.5
                                                                leading-none
                                                                text-center
                                                                whitespace-nowrap
                                                                align-baseline
                                                                font-bold
                                                                bg-green-500
                                                                text-white
                                                                rounded
                                                            "
                                                            >Sim</span
                                                        >
                                                        <span
                                                            v-else
                                                            class="
                                                                text-xs
                                                                inline-block
                                                                py-1
                                                                px-2.5
                                                                leading-none
                                                                text-center
                                                                whitespace-nowrap
                                                                align-baseline
                                                                font-bold
                                                                bg-red-600
                                                                text-white
                                                                rounded
                                                            "
                                                            >Não</span
                                                        >
                                                    </td>

                                                    <td
                                                        class="
                                                            flex
                                                            space-x-4
                                                            text-sm
                                                            text-gray-900
                                                            font-light
                                                            px-6
                                                            py-4
                                                            whitespace-nowrap
                                                        "
                                                    >
                                                        <Link
                                                            :href="
                                                                route(
                                                                    'post.edit',
                                                                    post.id
                                                                )
                                                            "
                                                            class="
                                                                flex
                                                                items-center
                                                                bg-purple-500
                                                                text-white
                                                                rounded
                                                                px-4
                                                                py-1
                                                                hover:bg-purple-800
                                                            "
                                                            ><svg
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
                                                                /></svg
                                                            ><span class="ml-1"
                                                                >Editar</span
                                                            ></Link
                                                        >
                                                        <Link
                                                            :href="
                                                                route(
                                                                    'post.confirm_delete',
                                                                    post.id
                                                                )
                                                            "
                                                            class="
                                                                flex
                                                                items-center
                                                                bg-red-500
                                                                text-white
                                                                rounded
                                                                px-4
                                                                py-1
                                                                hover:bg-red-800
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
                                                                /></svg
                                                            ><span
                                                                >Excluir</span
                                                            ></Link
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end p-5">
                        <template v-for="(link, key) in posts.links" :key="key">
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
    posts: Object,
    image: String
});
</script>
