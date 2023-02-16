<template>
    <Card>
        <p class="mb-2">
            <span class="heading-b">Welcome&nbsp;</span>
            <span class="heading-g">{{ user }}🎖️</span>
        </p>
        <div class="text-gray-400 flex flex-col gap-2">
            <p><b>Email:</b> {{ email }}</p>
            <form @submit.prevent="changePassword">
                <button type="submit" class="text-gray-400 font-bold hover-text-g">Change Password 🔑</button>
            </form>
        </div>
        <div class="flex justify-center mt-4">
            <Link :href="route('logout')" method="DELETE" as="button" class="btn-b">Logout</Link>
        </div>
    </Card>
</template>

<script setup>
import { Link, usePage, useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import Card from "@/Components/Card.vue";

const user = computed(
    () => usePage().props.user.name
)

const email = computed(
    () => usePage().props.email
)

const form = useForm({
    email: email,
})
const changePassword = () => form.post(route('password.change.send'))
</script>

