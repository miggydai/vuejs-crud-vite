<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {Head, Link, } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/inertia-vue3';
    defineProps({
        posts: Array,
    });
    const form = useForm();
    function destroy(id) {
        if (confirm("are you sure you want to delete")) {
            form.delete(route('posts.destroy', id));
        }
    }
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2>
                Laravel 9 Vue JS Crud app
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                :href="route('posts.create')"
                            >
                                Create Post
                            </Link>
                        </div>
                        <table className="table-fixed w-full">
                            <thead>
                                <tr className="bg-gray-100">
                                    <th className="px-4 py-2 w-20">No.</th>
                                    <th className="px-4 py-2">Title</th>
                                    <th className="px-4 py-2">Body</th>
                                    <th className="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts" :key="post.id">
                                    <td className="border px-4 py-2">{{ post.id }}</td>
                                    <td className="border px-4 py-2">{{ post.title }}</td>
                                    <td className="border px-4 py-2">{{ post.body }}</td>
                                    <td className="border px-4 py-2">
                                        <Link
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                            :href="route('posts.edit', post.id)"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            @click="destroy(post.id)"
                                            tabIndex="-1"
                                            type="button"
                                            className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>