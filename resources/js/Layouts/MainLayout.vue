<template>
    <nav class="container md:w-5/6 mx-auto p-5">
        <div class="mt-4 mb-4 bg-gradient-to-r from-green-400 to-blue-500 p-1 rounded-full shadow-lg shadow-teal-300/30 md:shadow-2xl md:shadow-teal-300/30">
            <div class="flex items-center justify-between p-4 pl-8 pr-8 bg-gray-800 rounded-full">
                <Link :href="route('home')" class="text-3xl font-extrabold hover-text-g">&lt;/&gt;</Link>
                <span class="font-medium text-lg hover-text-g">
                    <Link v-if="user" href="#">{{ user.name }}</Link>
                    <Link v-else :href="route('login')">LOGIN</Link>
                </span>
            </div>
        </div>
    </nav>
    <main class="container mx-auto w-full">
        <slot></slot>
    </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import {computed} from "vue";

const user = computed(
    () => usePage().props.user
)
</script>
