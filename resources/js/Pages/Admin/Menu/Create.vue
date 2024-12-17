<template>
    <Head title="Create Menu" />

    <AdminAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Menu Dashboard</h2>
        </template>

        <div class="mt-4 mx-4">
            <div class="flex justify-between">
                <h5>Create Menu</h5>
                <Link :href="route('admin.menu.index')" class="bg-red-500 text-white py-2 px-5 rounded mb-4">Back</Link>
            </div>
            <form @submit.prevent="saveProduct()">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label>Menu Name</label>
                            <input type="text" v-model="form.name" class="py-1 w-full">
                            <div v-if="errors.name" class="text-red-500">{{ errors.name }}</div>
                        </div>
                        <div class="mb-3">
                            <label>Menu Price</label>
                            <input type="text" v-model="form.price" class="py-1 w-full">
                            <div v-if="errors.price" class="text-red-500">{{ errors.price }}</div>
                        </div>
                        <div class="mb-3">
                            <label>Menu Description</label>
                            <textarea 
                                v-model="form.description" 
                                class="py-2 w-full border rounded px-2"
                                rows="3"
                            ></textarea>
                            <div v-if="errors.description" class="text-red-500">{{ errors.description }}</div>
                        </div>
                        <div class="mb-3">
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-blue-500 text-white py-2 px-5 rounded mb-4"
                            >
                                <span v-if="form.processing">Saving...</span>
                                <span v-else>Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object,
})

const form = useForm({
    name: '',
    price: '',
    description: '',
});

const saveProduct = () => {
    const res = form.post(route('admin.menu.store'));
    if(res){
        form.reset();
    }
};
</script>
