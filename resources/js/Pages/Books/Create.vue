<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";


const form = useForm({
    title: '',
    author: '',
    description: '',
    published_year: '',
});

//const errors = ref({});


const storeBook = () => {
    form.post(route('books.store'));
};
</script>
<template>
    <Head title="Add Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Add New Books
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2>Add New Book</h2>
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


                    <form @submit.prevent="storeBook">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input
                                placeholder="Book Title"
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>

                        </div>

                        <div class="mb-4">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input
                                placeholder="Author"
                                id="author"
                                v-model="form.author"
                                type="text"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            <span v-if="form.errors.author" class="text-red-500 text-sm">{{ form.errors.author }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                placeholder="Enter brief description"
                                id="description"
                                v-model="form.description"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            ></textarea>
                            <span v-if="form.errors.description" class="text-red-500 text-sm">{{ form.errors.description }}</span>
                        </div>


                        <div class="mb-4">
                            <label for="published_year" class="block text-sm font-medium text-gray-700">Published Year</label>
                            <input
                                placeholder="Year"
                                id="published_year"
                                v-model="form.published_year"
                                type="number"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            <span v-if="form.errors.published_year" class="text-red-500 text-sm">{{ form.errors.published_year }}</span>
                        </div>
                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2  rounded-md shadow-md"
                        >
                            Add Book
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

