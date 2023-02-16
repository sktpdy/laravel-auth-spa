<template>
    <Card>
        <form @submit.prevent="signup">
            <FormField label="Username">
                <input v-model="form.name" class="input-d" id="name" type="text">
                <p v-if="form.errors.name" class="warn-sm">{{ form.errors.name }}</p>
            </FormField>
            <FormField label="Email">
                <input v-model="form.email" class="input-d" id="email" type="email">
                <p v-if="form.errors.email" class="warn-sm">{{ form.errors.email }}</p>
            </FormField>
            <FormField label="Password">
                <input v-model="form.password" class="input-d" id="password" type="password">
                <p v-if="form.errors.password" class="warn-sm">{{ form.errors.password }}</p>
            </FormField>
            <FormField label="Confirm Password">
                <input v-model="form.password_confirmation" class="input-d" id="password_confirmation" type="password">
                <p v-if="form.errors.password_confirmation" class="warn-sm">{{ form.errors.password_confirmation }}</p>
            </FormField>
            <FormAction>Signup</FormAction>
        </form>
    </Card>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import FormField from "@/Components/Form/FormField.vue";
import FormAction from "@/Components/Form/FormAction.vue";
import Card from "@/Components/Card.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const signup = () => form.post(route('signup.store'))
</script>
