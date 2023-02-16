<template>
    <Card>
        <form @submit.prevent="resetPasswordRequest">
            <FormField label="Email">
                <input v-model="form.email" class="input-d" id="email" type="email">
                <p v-if="form.errors.email" class="warn-sm">{{ form.errors.email }}</p>
            </FormField>
            <FormAction>Request Reset</FormAction>
        </form>
    </Card>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3'

import Card from "@/Components/Card.vue";
import FormField from "@/Components/Form/FormField.vue";
import FormAction from "@/Components/Form/FormAction.vue";

const form = useForm({
    email: null,
})
const resetPasswordRequest = () => form.post(route('password.request'))
</script>
