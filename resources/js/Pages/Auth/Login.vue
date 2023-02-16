<template>
    <Card class="mb-3">
        <form @submit.prevent="login">
            <FormField label="Email">
                <input v-model="form.email" class="input-d" id="email" type="email">
            </FormField>
            <FormField label="Password">
                <input v-model="form.password" class="input-d" id="password" type="password">
                <p v-if="form.errors.password" class="warn-sm">Invalid Credentials!</p>
                <p v-else-if="form.errors.email" class="warn-sm">Invalid Credentials!</p>
            </FormField>
            <div class="flex items-center justify-between pr-1">
                <button class="btn-b">Login</button>
                <p class="text-base font-medium">
                    <Link :href="route('password.request')" class="text-gray-400 hover-text-g">Forgot Password?</Link>
                </p>
            </div>
        </form>
    </Card>
    <p class="text-center hover-text-g text-sm font-bold">
        <Link :href="route('signup.create')">
            Don't have an account?
        </Link>
    </p>
</template>

<script setup>
import FormField from "@/Components/Form/FormField.vue";
import {Link, useForm} from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post(route('login'))
</script>

