<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router, usePage} from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    books: {
        type: Array,
        required: true,
    },
});
const form = useForm({});
const { flash } = usePage().props;

let pageNumber = ref(1),
    searchTerm = ref(usePage().props.search ?? "");

const pageNumberUpdated = (link) => {
    pageNumber.value = link.url.split("=")[1];
};

let booksUrl = computed(() => {
    const url = new URL(route("books.index"));

    url.searchParams.set("page", pageNumber.value);

    if (searchTerm.value) {
        url.searchParams.set("search", searchTerm.value);
    }
    return url;
});

watch(
    () => booksUrl.value,
    (updateUrl) => {
        router.visit(updateUrl,{
            preserveScroll: true,
            preserveState: true,
            replace: true,
        });
       /* if (updateUrl) {
            pageNumber.value = 1;
        }*/
    }
);

const deleteBook = (id) => {
    if (confirm('Are you sure you want to delete this book?')) {
        form.delete(route('books.destroy',id), {
            onSuccess: () => alert('Book deleted successfully!'),
        });
    }
};
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
                    <input
                        type="text"
                        v-model="searchTerm"
                        placeholder="Search book records"
                        id="search"
                        class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div class="flex justify-end items-center mb-6">
                        <Link
                            :href="route('books.create')"
                            :active="route().current('books.index')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                        >
                            Add New Book
                        </Link>
                    </div>


                    <div>
                        <!-- Success Alert -->
                        <div
                            v-if="flash.success"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        >
                            {{ flash.success }}
                        </div>

                        <!-- Error Alert -->
                        <div
                            v-if="flash.error"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        >
                            {{ flash.error }}
                        </div>
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
                                <Link
                                    :href="route('books.show',book.id)"
                                    class="text-blue-500 hover:underline"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="route('books.edit',book.id)"
                                    class="text-green-500 hover:underline"
                                >
                                    Edit
                                </Link>
                                <button
                                    @click="deleteBook(book.id)"
                                    class="text-red-500 hover:underline"
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
                    <Pagination
                        :data="books"
                        :pageNumberUpdated="pageNumberUpdated"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

