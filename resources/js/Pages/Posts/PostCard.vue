<script setup>
const props = defineProps({
    post: Object
});
const formattedDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
};
</script>
<template>
    <article class="flex flex-col gap-1 p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:border-gray-700">
        <div class="flex justify-between items-center text-gray-500">
            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center rounded">
                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                    </path>
                </svg>
                {{ post.portal.name }}
            </span>
            <span class="text-sm">{{ formattedDate(post.created_at) }}</span>
        </div>
        <h2 class="text-xl font-bold tracking-tight text-gray-900">
            <a target="_blank" :href="post.url">
                {{ post.title }}
            </a>
        </h2>
        <p class="flex-1 font-light text-gray-500">{{ post.content }}</p>
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img class="w-7 h-7 rounded-full" src="/img/g1.png" alt="g1-img" />
            </div>
            <a target="_blank" :href="post.url"
                class="inline-flex items-center font-medium text-primary-600  hover:underline">
                Ler mais
                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </article>
</template>
