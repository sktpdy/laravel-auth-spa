<template>
    <Card class="mb-2">
        <div class="flex flex-col gap-2 mb-4">
            <p class="heading-b">Verify Email!</p>
            <p class="text-gray-400">Your email needs to be verified first.</p>
        </div>
        <FormAction>
            <Link :href="route('verification.send')" method="POST">
                Resend Verification Email
            </Link>
        </FormAction>
    </Card>
    <p class="text-center hover-text-g text-sm font-bold">
        <Link :href="route('logout')" method="DELETE" as="button">
            Logout
        </Link>
    </p>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import FormAction from "@/Components/Form/FormAction.vue";
</script>

