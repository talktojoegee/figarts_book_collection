<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    books: {
        type: Array,
        required: true,
    },
});
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Books
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-3"
                >
                    <div class="flex justify-end items-center mb-6">
                        <button
                            @click="addBook"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                        >
                            Add New Book
                        </button>
                    </div>

                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Author</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Published Year</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="(book, index) in books.data"
                            :key="book.id"
                            class="hover:bg-gray-100 transition duration-150"
                        >
                            <td class="border border-gray-300 px-4 py-2">{{ index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ book.title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ book.author }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ book.published_year }}</td>
                            <td class="border border-gray-300 px-4 py-2 capitalize">
              <span
                  :class="{
                  'text-green-500': book.status === 'available',
                  'text-yellow-500': book.status === 'reserved',
                  'text-red-500': book.status === 'borrowed',
                }"
              >
                {{ book.status }}
              </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-2"
                                    @click="editBook(book.id)"
                                >
                                    Edit
                                </button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    @click="deleteBook(book.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <tr v-if="books.length === 0">
                            <td
                                colspan="5"
                                class="border border-gray-300 px-4 py-2 text-center text-gray-500"
                            >
                                No books available.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

