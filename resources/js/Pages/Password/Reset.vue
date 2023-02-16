<template>
    <Card>
        <form @submit.prevent="resetPassword">
            <FormField label="New Password">
                <input v-model="form.password" class="input-d" id="password" type="password">
                <p v-if="form.errors.password" class="warn-sm">{{ form.errors.password }}</p>
            </FormField>
            <FormField label="Confirm Password">
                <input v-model="form.password_confirmation" class="input-d" id="password_confirmation" type="password">
                <p v-if="form.errors.password_confirmation" class="warn-sm">{{ form.errors.password_confirmation }}</p>
            </FormField>
            <FormAction>Reset Password</FormAction>
        </form>
    </Card>
</template>

<script setup>
import {useForm, usePage } from '@inertiajs/vue3'
import {computed} from "vue";

import Card from "@/Components/Card.vue";
import FormField from "@/Components/Form/FormField.vue";
import FormAction from "@/Components/Form/FormAction.vue";

const email = computed(
    () => usePage().props.email
)
const token = computed(
    () => usePage().props.token
)

const form = useForm({
    email: email,
    password: null,
    password_confirmation: null,
    token: token,
})

const resetPassword = () => form.post(route('password.update'))
</script>
