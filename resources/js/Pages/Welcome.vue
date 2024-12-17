<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Aetherium">
        <link rel="icon" href="/assets/favicon.png" type="image/png">
    </Head>

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="absolute top-0 left-0 p-4">
            <img src="/assets/favicon.png" alt="Aetherium Logo" class="h-14 w-auto">
        </div>

        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-3xl text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-gray-400"
                >Dashboard</Link
            >

            <template v-else>
                <span></span>
                <Link
                    :href="route('login')"
                    class="font-semibold text-3xl text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-gray-400"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-10 font-semibold text-3xl text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-gray-400"
                    >Register</Link
                >
            </template>
        </div>

        <div class="text-white">
            <h2 style="font-size: 250px;" class="aetherium-text">Aetherium</h2>
        </div>
    </div>
</template>

<style>
@font-face {
    font-family: 'CopperplateGothicStd';
    src: url('/assets/CopperplateGothicStd-29BC.otf') format('opentype');
}

.aetherium-text {
    font-family: 'CopperplateGothicStd', serif;
    font-size: 250px;
}
.bg-dots-darker {
    background: url('/assets/Aetherium.png') no-repeat center center;
    background-size: cover;
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url('/assets/Aetherium.png') no-repeat center center;
        background-size: cover;
    }
}
</style>