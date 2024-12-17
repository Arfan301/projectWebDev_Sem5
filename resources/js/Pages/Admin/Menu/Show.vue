<template>
    <Head title="Show Menu" />

    <AdminAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Menu Dashboard</h2>
        </template>
        <div class="mt-4 mx-4">
            <div class="flex justify-between">
                <h5>Show Menu</h5>
                <Link :href="route('admin.menu.index')" class="bg-red-500 text-white py-2 px-5 rounded mb-4">Back</Link>
            </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label>Menu Name</label>
                            <p>
                                {{ menu.name }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Menu Price</label>
                            <p>
                                {{ menu.price }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Menu Description</label>
                            <p>
                                {{ menu.description }}
                            </p>
                        </div>
                    </div>
                </div>

            
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
    menu: Object,
})
</script>