<template>
    <Head title="Menu" />

    <AdminAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Menu List</h2>
                <Link :href="route('admin.menu.create')" class="bg-blue-500 text-white p-2 rounded">Add Menu</Link>
            </div>
        </template>

        <div v-if="$page.props.flash.message" class="alert bg-green-200 mt-4 mx-5 px-4 py-2">
            {{ $page.props.flash.message }}
        </div>

        <div class="mt-4 mx-4">
            <table class="w-4/5 mx-auto bg-white border border-gray-200 shadow">
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
                    <tr
                        v-for="(item, index) in menus"
                        :key="index"
                    >
                        <td class="py-2 px-4 border">{{ item.id }}</td>
                        <td class="py-2 px-4 border">{{ item.name }}</td>
                        <td class="py-2 px-4 border">{{ item.price }}</td>
                        <td class="py-2 px-4 border">
                            <Link 
                                :href="route('admin.menu.show', item.id)" 
                                class="px-2 oy-1 text-sm bg-blue-300 text-white me-2 rounded inline-block">
                                Show
                            </Link>
                        </td>
                        <td class="py-2 px-4 border">
                            <Link 
                                :href="route('admin.menu.edit', item.id)" 
                                class="px-2 oy-1 text-sm bg-green-500 text-white me-2 rounded inline-block">
                                Edit
                            </Link>
                        </td>
                        <td class="py-2 px-4 border">
                            <button
                                type="submit"
                                class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block"
                                @click="deleteMenu(item.id)"    
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    menus: Array,
});

const form = useForm({});

const deleteMenu = (menuId) => {
    if(confirm('Are you sure you want to delete this menu?')){
        // console.log(route('admin.menu.destroy', menuId));
        form.delete(route('admin.menu.destroy', menuId));
    }
};
</script>