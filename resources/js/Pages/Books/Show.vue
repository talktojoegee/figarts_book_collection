<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";


defineProps({
    book: {
        type: Object,
        required: true
    }
})

//console.log(book);



</script>
<template>
    <Head title="Edit Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Book Details
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2>Book Details</h2>
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-3"
                >
                    <div class="flex justify-end items-center mb-6">
                        <Link
                            :href="route('books.index')"
                            :active="route().current('books.index')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                        >
                            Manage Books
                        </Link>

                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Title:</h3>
                        <p class="text-gray-600">{{ book.title }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Author:</h3>
                        <p class="text-gray-600">{{ book.author }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Description:</h3>
                        <p class="text-gray-600">{{ book.description }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Published Year:</h3>
                        <p class="text-gray-600">{{ book.published_year }}</p>
                    </div>

                    <div class="mt-6">
                        <Link
                            :href="route('books.index')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-md"
                        >
                            Back to Books
                        </Link>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

