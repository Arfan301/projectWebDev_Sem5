<template>
    <Head title="Menu" />

    <AdminAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Menu List</h2>
                <!-- Search Form -->
                <form class="flex items-center bg-gray-200 rounded-lg p-1 w-full md:w-auto mt-4 md:mt-0">
                    <!-- Search Icon -->
                    <span class="pl-3 text-gray-400 hidden md:block">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </span>

                    <!-- Input Field -->
                    <input
                        type="text"
                        placeholder="Search..."
                        id="search"
                        name="search"
                        class="flex-grow bg-transparent text-dark placeholder-gray-500 border-none px-3 w-full md:w-auto"
                        :value="$page.props.search"
                    />

                    <!-- Search Button -->
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-2 focus:ring-2 focus:ring-blue-300"
                    >
                        <span class="hidden md:inline">Search</span>
                        <svg class="w-6 h-6 md:hidden text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </form>
                <Link :href="route('admin.menu.create')" class="bg-blue-500 text-white p-2 rounded mt-4 md:mt-0">Add Menu</Link>
            </div>
        </template>

        <div v-if="$page.props.flash.message" class="alert bg-green-200 mt-4 mx-5 px-4 py-2">
            {{ $page.props.flash.message }}
        </div>

        <div class="mt-4 mx-4">
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 shadow">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left border">Id</th>
                            <th class="py-2 px-4 text-left border">Name</th>
                            <th class="py-2 px-4 text-left border">Price</th>
                            <th class="py-2 px-4 text-left border">View</th>
                            <th class="py-2 px-4 text-left border">Edit</th>
                            <th class="py-2 px-4 text-left border">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="menus.data.length === 0">
                            <td colspan="6" class="py-2 px-4 text-center">No products found.</td>
                        </tr>
                        <tr
                            v-for="(item, index) in menus.data"
                            :key="index"
                        >
                            <td class="py-2 px-4 border">{{ item.id }}</td>
                            <td class="py-2 px-4 border">{{ item.name }}</td>
                            <td class="py-2 px-4 border">{{ item.price }}</td>
                            <td class="py-2 px-4 border">
                                <Link 
                                    :href="route('admin.menu.show', item.id)" 
                                    class="px-2 py-1 text-sm bg-blue-300 text-white mr-2 rounded inline-block">
                                    Show
                                </Link>
                            </td>
                            <td class="py-2 px-4 border">
                                <Link 
                                    :href="route('admin.menu.edit', item.id)" 
                                    class="px-2 py-1 text-sm bg-green-500 text-white mr-2 rounded inline-block">
                                    Edit
                                </Link>
                            </td>
                            <td class="py-2 px-4 border">
                                <button
                                    type="submit"
                                    class="px-2 py-1 text-sm bg-red-500 text-white mr-2 rounded inline-block"
                                    @click="deleteMenu(item.id)"    
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="flex justify-center mt-4">
                <Link
                    v-for="(link, index) in menus.links"
                    :key="index"
                    :href="link.url || '#'"
                    v-html="link.label"
                    :class="{
                        'text-gray-500 cursor-not-allowed': !link.url, 
                        'font-bold': link.active,
                        'hover:bg-gray-200': link.url
                    }"
                    class="px-2 py-1 mx-1 rounded border border-gray-300"
                />
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    menus: Object,
    search: String,
});

const form = useForm({});

const deleteMenu = (menuId) => {
    if(confirm('Are you sure you want to delete this menu?')){
        // console.log(route('admin.menu.destroy', menuId));
        form.delete(route('admin.menu.destroy', menuId));
    }
};
</script>