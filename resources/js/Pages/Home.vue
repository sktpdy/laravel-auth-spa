<template>
    <Card>
        <p class="text-xl font-medium mb-2">Dashboard</p>
        <p class="text-base mb-4 text-gray-300">
            👤Account Info 🔑Change Password <br>🏃🏼‍♂️Logout
        </p>
        <Link :href="route('dashboard')" as="button" class="btn-b">Visit</Link>
    </Card>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Card from '@/Components/Card.vue'
</script>
