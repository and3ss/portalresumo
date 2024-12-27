<script setup>
import { Head } from '@inertiajs/vue3';
import PostCard from './PostCard.vue';
const props = defineProps({
    posts: Array
});
</script>
<template>

    <Head title="Início" />
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-2">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-8 mb-2">
                <h2 class="mb-1 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Portal
                    Resumo</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Última notícias por estado.</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </div>
        </div>
    </section>
</template>
