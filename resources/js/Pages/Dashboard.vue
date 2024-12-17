<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// Accept the 'menus' prop passed from the controller
defineProps({
    menus: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Container -->
                <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <!-- Grid of Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- Loop Through Menus -->
                        <div v-for="menu in menus" :key="menu.id" class="bg-gray-100 p-4 rounded-lg shadow-md">
                            <!-- Food Name -->
                            <h3 class="font-semibold text-lg mb-2 text-gray-800">{{ menu.name }}</h3>
                            <!-- Food Description -->
                            <p class="text-gray-600 mb-2">{{ menu.description }}</p>
                            <!-- Food Price -->
                            <p class="text-blue-500 font-semibold mb-4">Price: Rp {{ menu.price }}</p>
                            <!-- Reservation Button -->
                            <!-- <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out"
                            >
                                Reserve Now
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
