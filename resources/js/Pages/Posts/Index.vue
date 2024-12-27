<script setup>
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import PostCard from './PostCard.vue';
const props = defineProps({
    posts: Array,
    portals: Array
});
const selectedPortal = ref('');

const filteredPosts = computed(() => {
    if (selectedPortal.value) {
        return props.posts.filter(post => post.portal.id === selectedPortal.value);
    }
    return props.posts;
});
</script>
<template>

    <Head title="Início" />
    <header class="bg-white sticky top-0 z-50">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-8 mb-2">
            <h2 class="mb-1 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900">
                Portal Resumo
            </h2>
            <p class="font-light text-gray-500 sm:text-xl">Última notícias por estado.</p>
        </div>
        <select class="w-full p-2 mb-4 border border-gray-200 rounded-lg" v-model="selectedPortal">
            <option value="">Todos os portais</option>
            <option v-for="portal in portals" :key="portal.id" :value="portal.id">{{ portal.name }}</option>
        </select>
    </header>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-2">
        <div class="grid gap-8 lg:grid-cols-2">
            <PostCard v-for="post in filteredPosts" :key="post.id" :post="post" />
        </div>
    </div>
</template>
